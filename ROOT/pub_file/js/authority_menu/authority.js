/**
 * Created by Rick on 2015/10/28.
 */

$(document).ready( function() {
    $.ajax({
        type: "post",
        url: 'http://manage-rick-chaos.huhu.tw/authority_menu/all_unit',
        success: function(json){
          json;
        },
        error: function(){
            alert('Error while request..');
        }
    });
});