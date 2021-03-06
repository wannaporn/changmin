$.fn.spinner = function (type, side) {
    var $el = $(this);
    var method = 'left' === side ? 'prepend' : 'append';

    if ('remove' === type) {
        $el.removeClass('spinning');
        $el.find('.submit-spinner').remove();

        return this;
    }

    $el.addClass('spinning');
    $el[method](
        '<div class="submit-spinner">\n' +
        '  <div class="bounce1"></div>\n' +
        '  <div class="bounce2"></div>\n' +
        '  <div class="bounce3"></div>\n' +
        '</div>'
    );

    return this;
};
