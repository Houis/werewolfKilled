/**
 * Created by dev_001 on 20/6/24.
 */
$("#register_button").click(function(){
    let that = $(this);
    that.attr("disabled",true);
    try{
        var params = $("#register_form").serializeJSON();
        var form = new Form();

        form.submit('user/register',JSON.stringify(params),function(response){
            alert(response.msg);
            if(response.code == 0){
                window.location.href = './login.html';
            }
        });
    }catch(err){
        alert(err.message);
    }finally {
        that.attr('disabled',false);
    }

});

jQuery(document).bind("keyup",function(e){
    switch (event.keyCode){
        case 13:
            $("#register_button").click();
            break;
    }
});