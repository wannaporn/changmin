<?php

/*
 * This file is part of the Phpmob package.
 *
 * (c) Ishmael Doss <nukboon@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Phpmob\CmsBundle\Model;

use Sylius\Component\Resource\Model\TimestampableTrait;
use Sylius\Component\Resource\Model\ToggleableTrait;
use Sylius\Component\Resource\Model\TranslatableTrait;

/**
 * @author Ishmael Doss <nukboon@gmail.com>
 *
 * @method PageTranslation getTranslation($local = null)
 */
class Page implements PageInterface
{
    use ToggleableTrait;
    use TimestampableTrait;
    use TranslatableTrait {
        __construct as private initializeTranslationsCollection;
    }

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $slug;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $body;

    /**
     * @var string
     */
    protected $metaDescription;

    /**
     * @var string
     */
    protected $metaKeywords;

    /**
     * @var string
     */
    protected $template;

    /**
     * @var string
     */
    protected $script;

    /**
     * @var string
     */
    protected $style;

    public function __construct()
    {
        $this->initializeTranslationsCollection();
    }

    /**
     * {@inheritdoc}
     */
    protected function createTranslation()
    {
        return new PageTranslation();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getSlug()
    {
        return $this->getTranslation()->getSlug();
    }

    /**
     * {@inheritdoc}
     */
    public function setSlug($slug = null)
    {
        $this->getTranslation()->setSlug($slug);
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle()
    {
        return $this->getTranslation()->getTitle();
    }

    /**
     * {@inheritdoc}
     */
    public function setTitle($title)
    {
        $this->getTranslation()->setTitle($title);
    }

    /**
     * {@inheritdoc}
     */
    public function getBody()
    {
        return $this->getTranslation()->getBody();
    }

    /**
     * {@inheritdoc}
     */
    public function setBody($body)
    {
        $this->getTranslation()->setBody($body);
    }

    /**
     * {@inheritdoc}
     */
    public function getMetaDescription()
    {
        return $this->getTranslation()->getMetaDescription();
    }

    /**
     * {@inheritdoc}
     */
    public function setMetaDescription($metaDescription)
    {
        $this->getTranslation()->setMetaDescription($metaDescription);
    }

    /**
     * {@inheritdoc}
     */
    public function getMetaKeywords()
    {
        return $this->getTranslation()->getMetaKeywords();
    }

    /**
     * {@inheritdoc}
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->getTranslation()->setMetaKeywords($metaKeywords);
    }

    /**
     * {@inheritdoc}
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * {@inheritdoc}
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }

    /**
     * {@inheritdoc}
     */
    public function getScript()
    {
        return $this->script;
    }

    /**
     * {@inheritdoc}
     */
    public function setScript($script)
    {
        $this->script = $script;
    }

    /**
     * {@inheritdoc}
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * {@inheritdoc}
     */
    public function setStyle($style)
    {
        $this->style = $style;
    }
}
