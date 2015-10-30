$(function () {
    //設定checkbox的行為
    $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Expand this branch');
    $('.tree li.parent_li > input').on('click', function (e) {
        var children = $(this).parent('li.parent_li').find(' > ul > li');
        if (children.is(":visible")) {
            children.hide('fast');
            $(this).parent().children('span').attr('title', 'Expand this branch').children(' i').addClass('icon-folder-close').removeClass('icon-folder-open');

            $(this).parent().find(':input').each(function(){
                $(this).prop('checked', false);
            });
            $(this).parent().find('li').each(function(){
                $(this).css('display', 'none');
            });
        } else {
            children.show('fast');
            $(this).parent().children('span').attr('title', 'Collapse this branch').children('i').addClass('icon-folder-open').removeClass('icon-folder-close');


        }
        e.stopPropagation();
    });
    //設定ROOT的行為
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

    //展開有被選取的資料夾
    var has_checked = false;
    $("#root_plus").parent().find(':input').each(function(){
        if($(this).is(':checked')) {
            has_checked = true;
            $(this).parent('li.parent_li').css('display', 'block');
            children = $(this).parent('li.parent_li').find(' > ul > li');
            children.show('fast');
            $(this).parent().children('span').attr('title', 'Collapse this branch').children('i').addClass('icon-folder-open').removeClass('icon-folder-close');

        }else{
            children = $(this).parent('li.parent_li').find(' > ul > li');
            children.hide('fast');
            $(this).parent().children('span').attr('title', 'Expand this branch').children(' i').addClass('icon-folder-close').removeClass('icon-folder-open');
        }
    });
    //檢查有無選取的選單結點
    if(has_checked){
        var children = $('#root_plus').parent('li.parent_li').find(' > ul > li');
        children.show('fast');
        $(this).parent().children('span').attr('title', 'Collapse this branch').children('i').addClass('icon-folder-open').removeClass('icon-folder-close');
        $('#root_plus').find('i').addClass('icon-minus').removeClass('icon-plus');

    }else{
        var children = $('.tree li.parent_li > span').parent('li.parent_li').find(' > ul > li');
        if (children.is(":visible")) {
            children.hide('fast');
            $(this).attr('title', 'Expand this branch').find(' > i').addClass('icon-folder-close').removeClass('icon-folder-open');
            $('#root_plus').find('i').addClass('icon-plus').removeClass('icon-minus');
        }
    }
});