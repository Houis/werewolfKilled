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
     * @param callback  成功回调
     */
    submit(url,params,callback){
        $.ajax({
           url:this.base_url+url,
            type:"post",
            data:{
                params:params,
                token:localStorage.getItem('token')
            },
            dataType:'json',
            success:callback,
            error:function(){
               alert('请求失败');
            }
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