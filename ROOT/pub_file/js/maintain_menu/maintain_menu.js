/**
 * Created by Rick on 2015/10/15.
 */


function root_folder(){
    $('#folder_top_button').css( "display", "block" );
    $('#add_folder_button').css( "display", "block" );
    $('#del_folder_button').css( "display", "none" );

    $('#function_block').css( "display", "none" );
    $('#folder_block').css( "display", "none" );
    $('#folder_block').css( "display", "block" );

    $('#folder_bottom_button').css( "display", "none" );
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
    $('#folder_bottom_button').css( "display", "block" );
    $('#folder_top_button').css( "display", "block" );
    $('#del_folder_button').css( "display", "block" );
    $.ajax({
        type: "post",
        url: 'http://manage-rick-chaos.huhu.tw/maintain_menu/load_folder/'+id,
        success: function(json){
            $('#folder_title').html(json.Name);
            $('#folder_name').val(json.Name);
            $('#folder_sequence').val(json.Sequence);
            if(json.Node_Level=='2'){
                $('#add_folder_button').css( "display", "none" );
            }else{
                $('#add_folder_button').css( "display", "block" );
            }
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
    $('#function_top_button').css( "display", "block" );
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

function add_new_folder(){
    $('#folder_method').val('add');
    $('#folder_parent_id').val($('#folder_id').val());

    $('#folder_name').removeAttr("readonly");
    $('#folder_sequence').removeAttr("readonly");

    $('#folder_top_button').css( "display", "none" );
    $('#folder_bottom_button').css( "display", "block" );

    $('#folder_title').html("新增資料夾");
    $('#folder_name').val("");
    $('#folder_sequence').val("");

    $('#function_block').css( "display", "none" );
    $('#folder_block').css( "display", "none" );
    $('#folder_block').css( "display", "block" );
}

function add_new_function(){
    $('#function_method').val('add');
    $('#function_parent_id').val($('#folder_id').val());

    $('#function_top_button').css( "display", "none" );

    $('#function_title').html("新增功能");
    $('#function_name').val("");
    $('#function_url').val("");
    $('#function_sequence').val("");

    $('#function_block').css( "display", "none" );
    $('#folder_block').css( "display", "none" );
    $('#function_block').css( "display", "block" );
}

function delete_folder_node(){
    if(confirm("你確定要刪除此資料夾嗎?")){
        $.ajax({
            method: "POST",
            url: 'http://manage-rick-chaos.huhu.tw/maintain_menu/del_folder',
            data: {folder_id:$("#folder_id").val()},
            success: function(json){
                if(json.result=='success'){
                    alert("刪除成功！");
                    window.location="http://manage-rick-chaos.huhu.tw/maintain_menu/default";
                }else{
                    alert("刪除失敗！"+json.message);
                }
            },
            error: function(){
                alert('Error while request..');
            }
        });
    }

}
function delete_function_node(){
    if(confirm("你確定要刪除此功能嗎?")){
        $.ajax({
            method: "POST",
            url: 'http://manage-rick-chaos.huhu.tw/maintain_menu/del_function',
            data: {function_id:$("#function_id").val()},
            success: function(json){
                if(json.result=='success'){
                    alert("刪除成功！");
                    window.location="http://manage-rick-chaos.huhu.tw/maintain_menu/default";
                }else{
                    alert("刪除失敗！"+json.message);
                }
            },
            error: function(){
                alert('Error while request..');
            }
        });
    }
}
function folder_save(){
    if($("#folder_method").val()=='modify'){
        folder_modify();
    }
    if($("#folder_method").val()=='add'){
        folder_add();
    }
}
function folder_add(){
    if($("#folder_name").val() == null || $("#folder_name").val().trim()==''){
        alert("名稱不得空白！");
        $("#folder_name").onfocus();
        return;
    }
    if($("#folder_sequence").val() == null || $("#folder_sequence").val().trim()==''){
        $("#folder_sequence").val("2");
    }
    if(isNaN($("#folder_sequence").val())){
        alert("排序只能輸入數字！");
        return;
    }
    $.ajax({
        method: "POST",
        url: 'http://manage-rick-chaos.huhu.tw/maintain_menu/add_folder',
        data: {folder_parent_id:$("#folder_parent_id").val(), folder_name: $("#folder_name").val(), folder_sequence: $("#folder_sequence").val() },
        success: function(json){
            if(json.result=='success'){
                alert("新增成功！");
                window.location="http://manage-rick-chaos.huhu.tw/maintain_menu/default";
            }else{
                alert("新增失敗！");
            }
        },
        error: function(){
            alert('Error while request..');
        }
    });
}
function folder_modify(){
    if($("#folder_name").val() == null || $("#folder_name").val().trim()==''){
        alert("名稱不得空白！");
        $("#folder_name").onfocus();
        return;
    }
    if($("#folder_sequence").val() == null || $("#folder_sequence").val().trim()==''){
        $("#folder_sequence").val("2");
    }
    if(isNaN($("#folder_sequence").val())){
        alert("排序只能輸入數字！");
        return;
    }
    $.ajax({
        method: "POST",
        url: 'http://manage-rick-chaos.huhu.tw/maintain_menu/modify_folder',
        data: {folder_id:$("#folder_id").val(), folder_name: $("#folder_name").val(), folder_sequence: $("#folder_sequence").val() },
        success: function(json){
            if(json.result=='success'){
                alert("修改成功！");
                window.location="http://manage-rick-chaos.huhu.tw/maintain_menu/default";
            }else{
                alert("修改失敗！");
            }
        },
        error: function(){
            alert('Error while request..');
        }
    });
}

function function_save(){
    if($("#function_method").val()=='modify'){
        function_modify();
    }
    if($("#function_method").val()=='add'){
        function_add();
    }
}

function function_add(){
    if($("#function_name").val() == null || $("#function_name").val().trim()==''){
        alert("名稱不得空白！");
        $("#folder_name").onfocus();
        return;
    }
    if($("#function_url").val() == null || $("#function_url").val().trim()==''){
        alert("功能連結不得空白！");
        $("#function_url").onfocus();
        return;
    }
    if($("#function_sequence").val() == null || $("#function_sequence").val().trim()==''){
        $("#function_sequence").val("2");
    }
    if(isNaN($("#function_sequence").val())){
        alert("排序只能輸入數字！");
        return;
    }
    $.ajax({
        method: "POST",
        url: 'http://manage-rick-chaos.huhu.tw/maintain_menu/add_function',
        data: {function_parent_id:$("#function_parent_id").val(), function_name: $("#function_name").val(), function_url: $("#function_url").val(),function_sequence: $("#function_sequence").val() },
        success: function(json){
            if(json.result=='success'){
                alert("新增成功！");
                window.location="http://manage-rick-chaos.huhu.tw/maintain_menu/default";
            }else{
                alert("新增失敗！");
            }
        },
        error: function(){
            alert('Error while request..');
        }
    });
}

function function_modify(){
    if($("#function_name").val() == null || $("#function_name").val().trim()==''){
        alert("名稱不得空白！");
        $("#folder_name").onfocus();
        return;
    }
    if($("#function_url").val() == null || $("#function_url").val().trim()==''){
        alert("功能連結不得空白！");
        $("#function_url").onfocus();
        return;
    }
    if($("#function_sequence").val() == null || $("#function_sequence").val().trim()==''){
        $("#function_sequence").val("2");
    }
    if(isNaN($("#function_sequence").val())){
        alert("排序只能輸入數字！");
        return;
    }
    $.ajax({
        method: "POST",
        url: 'http://manage-rick-chaos.huhu.tw/maintain_menu/modify_function',
        data: {function_id:$("#function_id").val(), function_name: $("#function_name").val(), function_url: $("#function_url").val(),function_sequence: $("#function_sequence").val() },
        success: function(json){
            if(json.result=='success'){
                alert("修改成功！");
                window.location="http://manage-rick-chaos.huhu.tw/maintain_menu/default";
            }else{
                alert("修改失敗！");
            }
        },
        error: function(){
            alert('Error while request..');
        }
    });
}