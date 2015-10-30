function clean_all(){
    $("input[name='agree_id[]']").each(function() {
        $(this).prop('checked', false);
    });
    $("#root_plus").parent().find('li').each(function(){
        $(this).css('display', 'none');
    });
}

function checked_all(){
    $("input[name='agree_id[]']").each(function() {
        $(this).prop('checked', true);
    });
    $("#root_plus").parent().find('li').each(function(){
        $(this).css('display', 'block');
    });
}
