/* انتخاب و مرتب‌سازی تصاویر دیگر پرامپت (متاباکس ai_prompt) */
jQuery(function ($) {
    'use strict';

    var MAX = 8;
    var $input = $('#ep_gallery');
    var $list = $('#ep_gallery_list');
    var frame;

    function sync() {
        var ids = $list.children('li').map(function () { return $(this).data('id'); }).get();
        $input.val(ids.join(','));
    }

    if ($.fn.sortable) { $list.sortable({ update: sync }); }

    $list.on('click', 'button', function () {
        $(this).closest('li').remove();
        sync();
    });

    $('#ep_gallery_add').on('click', function (e) {
        e.preventDefault();

        if (frame) {
            frame.open();
            return;
        }

        frame = wp.media({
            title: 'انتخاب تصاویر پرامپت',
            button: { text: 'افزودن به پرامپت' },
            library: { type: 'image' },
            multiple: 'add'
        });

        frame.on('select', function () {
            frame.state().get('selection').each(function (att) {
                var data = att.toJSON();
                if ($list.children('li').length >= MAX) { return; }
                if ($list.children('li[data-id="' + data.id + '"]').length) { return; }

                var src = (data.sizes && data.sizes.thumbnail) ? data.sizes.thumbnail.url : data.url;
                var $li = $('<li>').attr('data-id', data.id).data('id', data.id)
                    .append($('<img>').attr('src', src).attr('alt', ''))
                    .append($('<button type="button" aria-label="حذف تصویر">&times;</button>'));
                $list.append($li);
            });
            sync();
        });

        frame.open();
    });
});
