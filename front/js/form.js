/**
 * Created by dev_001 on 20/6/24.
 */
class Form{
    constructor() {
        this.base_url = 'http://www.vincenzo.com/thinkphp/public/index/';
    }

    /**
     * 提交请求
     * @param url       接口地址
     * @param params    请求参数
     * @param success_callback  成功回调
     * @param error_callback    失败回调
     */
    submit(url,params,success_callback,error_callback){
        $.ajax({
           url:this.base_url+url,
            type:"post",
            data:{
                params:params,
                token:localStorage.getItem('token')
            },
            dataType:'json',
            success:success_callback,
            error:error_callback
        });
    }

    /**
     * 验证表单
     * @param form_obj
     */
    validForm(form_obj){
        //TODO
    }


}