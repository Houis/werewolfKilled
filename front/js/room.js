/**
 * Created by dev_001 on 20/6/28.
 */
$(document).ready(function(){
    let joinType = Common.getQueryVariable('room_id');
    if(!joinType){
        alert('缺少参数');
        return false;
    }

    window.game = new Game();


});