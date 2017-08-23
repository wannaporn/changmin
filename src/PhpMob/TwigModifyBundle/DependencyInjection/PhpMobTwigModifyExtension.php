<?php

/*
 * This file is part of the PhpMob package.
 *
 * (c) Ishmael Doss <nukboon@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PhpMob\TwigModifyBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * @author Ishmael Doss <nukboon@gmail.com>
 */
class PhpMobTwigModifyExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function getAlias()
    {
        return 'phpmob_twig_modify';
    }

    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('phpmob_twig_modify.enabled', $config['enabled']);
        $container->setParameter(
            'phpmob_twig_modify.cache',
            $config['cache'] ?: $container->getParameter('kernel.cache_dir').'/modify'
        );

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        $definition = $container->getDefinition('phpmob_twig_modify.modifier');
        $definition->setArgument(0, new Reference($config['cache'] ?: 'phpmob_twig_modify.cache.local_file'));

        foreach ($config['modifiers'] as $key => $options) {
            $definition->addMethodCall('addType', [$key, $options]);
        }
    }
}
