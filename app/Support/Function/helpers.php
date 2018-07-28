<?php

use HyperDown\Parser;

if( !function_exists('markdownToHtml') ){
	/**
	 * 将markdown语法转换为html
	 */
	function markdownToHtml($str)
	{
		$parser = new Parser;
		$html = $parser->makeHtml($str);
		return $html;
	}
}

if(!function_exists('http_request')){
    function http_request($url, $params, $method = 'GET', $headers = [])
    {
        $ci = curl_init();
        /* Curl settings */
        curl_setopt($ci, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($ci, CURLOPT_USERAGENT, 'Sae T OAuth2 v0.1');
        curl_setopt($ci, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ci, CURLOPT_TIMEOUT, 30);
        curl_setopt($ci, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ci, CURLOPT_ENCODING, "");
        curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, FALSE);

        if (version_compare(phpversion(), '5.4.0', '<')) {
            curl_setopt($ci, CURLOPT_SSL_VERIFYHOST, 1);
        } else {
            curl_setopt($ci, CURLOPT_SSL_VERIFYHOST, 2);
        }

        switch ($method) {
            case 'GET':
                curl_setopt($ci, CURLOPT_HTTPGET, true);
                break;
            case 'POST':
                curl_setopt($ci, CURLOPT_POST,true);
                if(!empty($params)){
                    curl_setopt($ci, CURLOPT_POSTFIELDS, $params);
                }
                break;
            case 'PUT':
                curl_setopt ($ci, CURLOPT_CUSTOMREQUEST, "PUT");
                if(!empty($params)){
                    curl_setopt($ci, CURLOPT_POSTFIELDS, $params);
                }
                break;
            case 'DELETE':
                curl_setopt ($ci, CURLOPT_CUSTOMREQUEST, "DELETE");
                if(!empty($params)){
                    curl_setopt($ci, CURLOPT_POSTFIELDS, $params);
                }
                break;
        }

        curl_setopt($ci, CURLOPT_URL, $url );
        if($headers){
            curl_setopt($ci, CURLOPT_HTTPHEADER, $headers );
        }
        curl_setopt($ci, CURLINFO_HEADER_OUT, TRUE );

        $response = [];
        $response[] = curl_exec($ci); // 返回值
        $response[] = curl_getinfo($ci, CURLINFO_HTTP_CODE); // 状态码
        curl_close ($ci);
        return $response;
    }
}
