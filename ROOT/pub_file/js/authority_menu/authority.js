/**
 * Created by Rick on 2015/10/28.
 */

$(document).ready( function() {
    $.ajax({
        type: "post",
        url: 'http://manage-rick-chaos.huhu.tw/authority_menu/all_unit',
        success: function(json){
          json;
            if(json != null){
                for(i = 0 ; i<json.length;i++){
                    if($("input[name$='query_unit']").val()==json[i].unit){
                        $("#unit_select").append($("<option></option>").attr("value", json[i].unit).attr("selected", "true").text( json[i].unit));
                    }else{
                        $("#unit_select").append($("<option></option>").attr("value", json[i].unit).text( json[i].unit));
                    }
                }
            }
        },
        error: function(){
            alert('Error while request..');
        }
    });
});