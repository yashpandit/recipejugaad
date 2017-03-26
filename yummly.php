<?php
	
class Yummly
{
	public $token2='8c0104dd667d7e3e37d08ec793a046c5'; //Yummly
	public $appid='32b240cc';//yummly app id
	//public $attribution=';
	public $response_type;
	public $url='http://api.yummly.com/v1/api/recipes?';
 
    private $verify_ssl   = false;
	function __construct($token, $response_type="json")
    {
        $this->token = $token;
        $this->response_type = $response_type;
	}

   
    public function call_url($url){
        return $this->sendRequest($url);
    }

    public function sendRequest($url, $timeout=100){
    	if (function_exists('curl_init') && function_exists('curl_setopt')){
    		$headers = array(
	            'Cache-Control: no-cache',
	            '_app_id:32b240cc'.$this->appid,
	            '_app_key:8c0104dd667d7e3e37d08ec793a046c5'.$this->token2.
	            'Accept:application/json'
	            );
	        $ch = curl_init($url);
	        curl_setopt($ch, CURLOPT_URL, $url);
	        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
	        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $this->verify_ssl);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	        $result = curl_exec($ch);
	        //echo $result;
	        curl_close($ch);

	        return $result ? $result : false;
	        
	    }else{
    		return false;
	    }        
    }

}

?>

