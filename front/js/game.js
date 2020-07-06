/**
 * Created by dev_001 on 20/6/28.
 */
;(function(window){
    function createChatBox(data){

        var html = `<div class="media" style="padding-top: 1rem;">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="img/profile_photo.jpg" alt="..." >
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">${data['identity']}</h4>
                            <p class="media-body">${data['talk']}</p>
                        </div>
                    </div>`;

        return html;
    };

    function onOpen(data){
        var html = `<div class="hint"><p>成功与服务器建立链接</p></div>`;
        $(".container-fluid").append(html);
    }

    window.gameMsg = {
        createChatBox:createChatBox,
    };
})(window);
class Game{
    constructor() {

        this.protocol = 'ws://';
        this.address = '192.168.10.62';
        this.port = '8282';
        this.clientId = 'aaaa';
        this.connect();
    }

    /**
     * 连接
     * @returns {boolean}
     */
    connect(){
        if (!("WebSocket" in window)){
            alert('你的浏览器并不支持WebSocket,请更换浏览器');
            window.close();
            return false;
        }
        this.ws = new WebSocket(this.protocol+this.address+':'+this.port);
        this.ws.onopen = this.onOpen;
        this.ws.onmessage = this.onMessage;
        this.ws.onclose = this.onClose;

    }



    /**
     * 建立链接
     */
    onOpen(evt){
        console.log(evt);
        var html = `<div class="hint"><p>成功与服务器建立链接</p></div>`;
        $(".container-fluid").append(html);
    }


    /**
     * 接收数据
     * @param evt
     * @returns {boolean}
     */
    onMessage(evt){
        console.log(evt)
        let result = evt.data;
        result = JSON.parse(result);

        if(result.code != 0){
            alert(result.msg);
            return false;
        }

        let data = result.data;
        switch (data.type){
            //建立链接
            case 'connect':
                window.clientId = data.client_id;
                break;
        }



    }

    /**
     * 断开连接
     */
    onClose(){
        var html = `<div class="hint"><p>链接已断开</p></div>`;
        $(".container-fluid").append(html);
    }

}