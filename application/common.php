<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: Vincenzo <cx6230@163.com>
// +----------------------------------------------------------------------

include_once __DIR__.'/api_error.php';

// 应用公共文件

if(!function_exists('api_success')){
    /**
     * @param int  $code
     * @param bool $data
     * 接口请求结果
     */
    function api_result(Int $code,$data = false){
        $api_error = api_error_msg();
        $result = array(
            'code'=>$code,
            'msg'=>$api_error[$code]
        );

        if($data)
            $result['data'] = $data;

        echo json_encode($result);die;
    }
}

if(!function_exists('api_check_params')){
    /**
     * @param array $params
     * @param array $check_list
     * @param bool $check_null
     * @return bool
     * 检查参数
     */
    function api_check_params(Array $params,Array $check_list,Bool $check_null = false){

        //接收参数格式不对
        if (!is_array($params)) {
            return api_result(1003, "格式错误");
        }

        //缺少参数
        $array_diff = array_diff($check_list, array_keys($params));
        if (!empty($array_diff)) {
            $msg = "缺少参数" . implode(" | ", $array_diff);
            return api_result(1003, $msg);
        }

        //必要参数为null值
		foreach ($check_list as $ne) {
            if (!isset($params[$ne])) {
                return $ne;
            }
            if ($check_null && !$params[$ne]) {
                return api_result(1003);
            }
        }

		return false;
    }
}

if (!function_exists('encrypt')) {
    /**
     * @param $data
     * @param $key
     * @return string
     * 加密
     */
    function encrypt($data, $key = '') {
        $key = md5($key);
        $x = 0;
        $len = strlen($data);
        $l = strlen($key);
        $char = '';
        $str = '';
        for ($i = 0; $i < $len; $i++) {
            if ($x == $l) {
                $x = 0;
            }
            $char .= $key{$x};
            $x++;
        }
        for ($i = 0; $i < $len; $i++) {
            $str .= chr(ord($data{$i}) + (ord($char{$i})) % 256);
        }
        return base64_encode($str);
    }
}


if (!function_exists('decrypt')) {
    /**
     * @param $data
     * @param $key
     * @return string
     * 解密
     */
    function decrypt($data, $key = '') {
        $key = md5($key);
        $x = 0;
        $data = base64_decode($data);
        $len = strlen($data);
        $l = strlen($key);
        $char = '';
        $str = '';
        for ($i = 0; $i < $len; $i++) {
            if ($x == $l) {
                $x = 0;
            }
            $char .= substr($key, $x, 1);
            $x++;
        }
        for ($i = 0; $i < $len; $i++) {
            if (ord(substr($data, $i, 1)) < ord(substr($char, $i, 1))) {
                $str .= chr((ord(substr($data, $i, 1)) + 256) - ord(substr($char, $i, 1)));
            } else {
                $str .= chr(ord(substr($data, $i, 1)) - ord(substr($char, $i, 1)));
            }
        }
        return $str;
    }
}


if (!function_exists('uuid')) {
    /**
     * @param string $prefix
     * @return string
     * 生成UUID
     */
    function uuid ($prefix = "") {
        $str = md5(uniqid(mt_rand(), true));
        $uuid = substr($str, 0, 8) . '-';
        $uuid .= substr($str, 8, 4) . '-';
        $uuid .= substr($str, 12, 4) . '-';
        $uuid .= substr($str, 16, 4) . '-';
        $uuid .= substr($str, 20, 12);
        return $prefix . $uuid;
    }
}

if(!function_exists('debug')){
    /**
     * @param array $params
     * 调试输出
     */
    function debug($params=[]){
        echo "<pre>";
        print_r($params);
        die;
    }
}

if(!function_exists('get_client_ip')){
    /**
     * @return string
     * 获取客户端id
     */
    function get_client_ip()
    {
        if (isset($_SERVER["HTTP_CLIENT_IP"]) && $_SERVER["HTTP_CLIENT_IP"] && strcasecmp($_SERVER["HTTP_CLIENT_IP"], "unknown")) {
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        } else {
            if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]) && $_SERVER["HTTP_X_FORWARDED_FOR"] && strcasecmp($_SERVER["HTTP_X_FORWARDED_FOR"], "unknown")) {
                $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
            } else {
                if (isset($_SERVER["REMOTE_ADDR"]) && $_SERVER["REMOTE_ADDR"] && strcasecmp($_SERVER["REMOTE_ADDR"], "unknown")) {
                    $ip = $_SERVER["REMOTE_ADDR"];
                } else {
                    if (isset ($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'],
                            "unknown")
                    ) {
                        $ip = $_SERVER['REMOTE_ADDR'];
                    } else {
                        $ip = "unknown";
                    }
                }
            }
        }
        return $ip;
    }
}