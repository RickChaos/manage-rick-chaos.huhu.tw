/**
 * Created by Rick on 2015/10/15.
 */

function root_folder(){
    $('#function_block').css( "display", "none" );
    $('#folder_block').css( "display", "none" );
    $('#folder_block').css( "display", "block" );
    $('#folder_id').val('0');
    $('#folder_name').attr("readonly",true);
    $('#folder_sequence').attr("readonly",true);
    $('#folder_title').html("選單維護");
    $('#folder_name').val("選單維護");
    $('#folder_sequence').val("");
}

function load_folder(id,method) {
    $('#folder_method').val(method);
    $('#folder_id').val(id);
    $('#folder_name').removeAttr("readonly");
    $('#folder_sequence').removeAttr("readonly");
    $('#function_block').css( "display", "none" );
    $('#folder_block').css( "display", "none" );
    $('#folder_block').css( "display", "block" );
    $.ajax({
        type: "post",
        url: 'http://manage-rick-chaos.huhu.tw/maintain_menu/load_folder/'+id,
        success: function(json){
            $('#folder_title').html(json.Name);
            $('#folder_name').val(json.Name);
            $('#folder_sequence').val(json.Sequence);
        },
        error: function(){
            alert('Error while request..');
        }
    });
}
function load_function(id,method) {
    $('#function_method').val(method);
    $('#function_id').val(id);
    $('#function_block').css( "display", "none" );
    $('#folder_block').css( "display", "none" );
    $('#function_block').css( "display", "block" );
    $.ajax({
        type: "post",
        url: 'http://manage-rick-chaos.huhu.tw/maintain_menu/load_function/'+id,
        success: function(json){
            $('#function_title').html(json.Name);
            $('#function_name').val(json.Name);
            $('#function_url').val(json.Url);
            $('#function_sequence').val(json.Sequence);
        },
        error: function(){
            alert('Error while request..');
        }
    });
}