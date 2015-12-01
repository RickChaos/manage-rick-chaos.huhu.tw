/**
 * Created by Rick on 2015/12/1.
 */

$(document).ready(function(){
    $("#addsave").on('click',function(){
        if($("#class_name").val()===null||$("#class_name").val()===''){
            alert("分類名稱欄位不得為空！");
            return ;
        }

        $("#class_form").submit();
    });

    $("#mdysave").on('click',function(){
        if($("#class_name").val()===null||$("#class_name").val()===''){
            alert("分類名稱欄位不得為空！");
            return ;
        }

        $("#class_form").submit();
    });

    $("#del").on('click',function(){
        if(confirm("即將執行刪除動作，確定要刪除?")){
            $("#classes_form").attr("action", "http://manage-rick-chaos.huhu.tw/classes/del");
            $("#classes_form").submit();

        }

    });
}) ;