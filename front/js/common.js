/**
 * Created by dev_001 on 20/6/28.
 */
;(function (window) {
    /**
     * 获取url参数
     * @param variable
     * @returns {*}
     */
    function getQueryVariable(variable)
    {
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for (var i=0;i<vars.length;i++) {
            var pair = vars[i].split("=");
            if(pair[0] == variable){return pair[1];}
        }
        return(false);
    }

    window.Common = {
        getQueryVariable:getQueryVariable
    }
})(window);