$(function () {
    var calendar = new Calendar();
    calendar.handle_popover();
    calendar.handel_sortable();
    calendar.re_sortable();
    calendar.add_card();
});

function Calendar() {
    var pointer = this;
    var item = ' .item';
    var data_url = $('#base_url').val();
    var data_content = $('#horizontalDiv');
    var btn_dismiss = $('[data-dismiss=modal]');

    this.handel_sortable = function () {
        var curent_col = '';
        var received = false;
        $(".column").sortable({
            connectWith: ".column",
            handle: ".item",
//        cancel: ".item-toggle",
            placeholder: "item-placeholder ui-corner-all",
            start: function () {//case drag item 
                var col_id = $(this).attr('id');
                curent_col = col_id;
                received = false;
            },
            stop: function () {// case drag and drop item on one column
                // case when drag and drop on diffrent column then both event execute
                // so when receive event executed , stop event no work
                if (!received) {
                    var col_id = $(this).attr('id');
                    pointer.re_sortable('#' + col_id);
                    pointer.save_card($(this));
                }
            },
            receive: function () {// case drop item
                var col_id = $(this).attr('id');
                pointer.re_sortable('#' + col_id);
                pointer.re_sortable('#' + curent_col);
                pointer.save_card($(this));
                received = true;
            }
        });

        //handle when move item
        $(".item")
                .addClass("ui-widget ui-widget-content ui-helper-clearfix ui-corner-all")
                .find(".item")
                .addClass("ui-widget-header ui-corner-all");
    };
    this.handle_popover = function () {
        data_content.popover({
            selector: '.item',
            trigger: 'hover',
            animation: true,
            placement: 'auto right',
        });

        data_content.on('mousedown', '.item', function () {
//             hide popover when link is clicked
            $(this).popover('hide');
        });
    };

    this.re_sortable = function (col_id) {
        $(col_id + item + ' span').each(function (stt) {
            $(this).html(stt + 1);
        });
    };

    this.getItem = function () {
        var arr_list = {};
        var obj_list = $('.list');
        obj_list.each(function (column) {
            column++;
            var list = '[data-list=' + column + ']';
            var arr_item = {};
            $(list + item).each(function (item) {
                arr_item[item + 1] = $(this).attr('data-content');
            });
            arr_list[column] = arr_item;
        });
        return arr_list;
    };

    this.save_card = function (obj) {
        var list_item = pointer.getItem();
        var id = $('#id').val();
        var key = $('#key').val();
        var data = {
            'list_item': list_item,
            'id': id,
            'key': key
        };
        $.ajax({
            type: "POST",
            url: data_url,
            dataType: "json",
            data: data,
            success: function (results) {
                if (results !== false) {
                    if (results.action === 'save') {
                        $('#id').val(results.id);
                        $('#key').val(results.key);
                    }
                } else {
                    var col_id = obj.attr('id');
                    $('#status-area').flash_message({
                        text: 'Failed!',
                        how: 'append',
                        col_id: col_id
                    });
                }
            }

        });

    };

    this.add_card = function () {
        data_content.on('click', '[data-button=save-card]', function () {
            var create = false;
            var column = $(this).attr('data-column');
            var data_id = $(this).attr('data-id');
            if (data_id === '')
                create = true;
            var id = data_id === '' ? column : data_id;
            var info_card = pointer.getCardInfo($(this));

            //create new card
            if (create) {
                var random_id = pointer.randomID();
                pointer.generate_card(random_id, info_card, $(this));
                pointer.generate_modal_card(random_id, info_card, $(this));
                pointer.clearInfoCard(id);
            } else {
                // Update card
                pointer.updateCard($(this));
            }
        });
        btn_dismiss.click(function () {
            var create = false;
            var data_id = $(this).attr('data-id');
            var column = $(this).attr('data-column');
            if (data_id === '')
                create = true;
            var id = data_id === '' ? column : data_id;
            if (create)
                pointer.clearInfoCard(id);
        });
    };

    this.getCardInfo = function (obj) {
        var column = obj.attr('data-column');
        var info = $('#card-modal-' + column).find('textarea').val();
        return info === '' ? false : info;
    };

    this.clearInfoCard = function (id) {
        $('#card-modal-' + id).on('hidden.bs.modal', function () {
            $(this).find("textarea").val('');
        });
    };

    this.generate_card = function (id, info_card, obj) {
        var column = obj.attr('data-column');
        var column_Id = '#sortable' + column;
        var objCardTemplate = $('[data-card-template]').clone();
        objCardTemplate.addClass('data-template');
        objCardTemplate.removeClass('hidden');
        objCardTemplate.removeAttr('data-card-template');
        objCardTemplate.attr('data-target', '#card-modal-' + id);
        objCardTemplate.find('[data-content]').attr('data-content', info_card);
        objCardTemplate.find('[data-card]').attr('data-card', id);
        var html = objCardTemplate.wrap('<div>').parent().html();
        $(column_Id).append(html);
        $('#card-modal-' + column).modal('hide');

        pointer.re_sortable(column_Id);
        pointer.save_card(obj);
    };

    this.updateCard = function (obj) {
        var id = obj.attr('data-id');
        var modal = $('#card-modal-' + id);
        var info = modal.find('textarea').val();
        var card = $('[data-card=' + id + ']');
        card.attr('data-content', info);
        $('#card-modal-' + id).modal('hide');
        pointer.save_card(obj);
    };

    this.generate_modal_card = function (id, info_card, obj) {
        var column = obj.attr('data-column');
        var column_Id = '#sortable' + column;
        var objModalCardTemplate = $('[data-modal-card-template]').clone();
        objModalCardTemplate.removeAttr('data-modal-card-template');
        objModalCardTemplate.addClass('data-modal-template');
        objModalCardTemplate.attr('id', 'card-modal-' + id);
        objModalCardTemplate.find('[data-button=save-card]').attr('data-id', id);
        objModalCardTemplate.find('.button-cancel').attr('data-id', id);
        objModalCardTemplate.find('textarea').html(info_card);
        var html = objModalCardTemplate.wrap('<div>').parent().html();
        $(column_Id).after(html);
    };

    this.randomID = function () {
        return Math.floor((Math.random() * 1000) + 1);
    };
    (function ($) {
        $.fn.flash_message = function (options) {

            options = $.extend({
                text: 'Done',
                time: 1000,
                how: 'before',
                class_name: ''
            }, options);

            return $(this).each(function () {
                if ($(this).parent().find('.flash_message').get(0))
                    return;

                var message = $('<span />', {
                    'class': 'flash_message ' + options.class_name,
                    text: options.text
                }).hide().fadeIn('fast');
                $('#' + options.col_id)[options.how](message);

                message.delay(options.time).fadeOut('normal', function () {
                    $(this).remove();
                });

            });
        };
    })(jQuery);
}

