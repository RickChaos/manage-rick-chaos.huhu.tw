$(function () {
    $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Expand this branch');
    $('.tree li.parent_li > input').on('click', function (e) {
        var children = $(this).parent('li.parent_li').find(' > ul > li');
        if (children.is(":visible")) {
            children.hide('fast');
            $(this).parent().children('span').attr('title', 'Expand this branch').children(' i').addClass('icon-folder-close').removeClass('icon-folder-open');
            $(this).find('i').addClass('icon-plus').removeClass('icon-minus');
            $(this).parent().find(':input').each(function(){
                $(this).prop('checked', false);
            });
            $(this).parent().find('li').each(function(){
                $(this).css('display', 'none');
            });
        } else {
            children.show('fast');
            $(this).parent().children('span').attr('title', 'Collapse this branch').children('i').addClass('icon-folder-open').removeClass('icon-folder-close');
            $(this).find('i').addClass('icon-minus').removeClass('icon-plus');

        }
        e.stopPropagation();
    });
    $('#root_plus').on('click', function (e) {
        var children = $(this).parent('li.parent_li').find(' > ul > li');
        if (children.is(":visible")) {
            children.hide('fast');
            $(this).parent().children('span').attr('title', 'Expand this branch').children(' i').addClass('icon-folder-close').removeClass('icon-folder-open');
            $(this).find('i').addClass('icon-plus').removeClass('icon-minus');
        } else {
            children.show('fast');
            $(this).parent().children('span').attr('title', 'Collapse this branch').children('i').addClass('icon-folder-open').removeClass('icon-folder-close');
            $(this).find('i').addClass('icon-minus').removeClass('icon-plus');
        }
        e.stopPropagation();
    });
    var children = $('.tree li.parent_li > span').parent('li.parent_li').find(' > ul > li');
    if (children.is(":visible")) {
        children.hide('fast');
        $(this).attr('title', 'Expand this branch').find(' > i').addClass('icon-folder-close').removeClass('icon-folder-open');
    }
});