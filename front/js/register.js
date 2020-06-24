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
            console.log(response);
        });
    }catch(err){

    }finally {
        that.attr('disabled',false);
    }

});