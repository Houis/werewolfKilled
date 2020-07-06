$("#login_button").click(function(){
    let that = $(this);
    that.attr("disabled",true);

    try{
        var params = $("#login_form").serializeJSON();
        var form = new Form();

        form.submit('user/login',JSON.stringify(params),function(response){

            if(response.code != 0){
                alert(response.msg);
            }
            window.location.href = './homePage.html';
            localStorage.setItem('token',response.data);
        });
    }catch(err){
        alert(err.message);
    }finally {
        that.attr('disabled',false);
    }
});

/**
 * Created by dev_001 on 20/6/24.
 */
jQuery(document).bind("keyup",function(e){
    switch (event.keyCode){
        case 13:
            $("#login_button").click();
            break;
    }
});