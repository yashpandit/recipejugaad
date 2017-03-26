<?php
	
class Food
{
	//public $token='euPPD6XkMkmshVC1HyumHgh5doW5p1N6Zczjsn0sLC1WQbOXmF';// Private Token Of Markape
	public $token='d5855ab5152e80aacedef2372acfe596'; //Food 2fork
	public $response_type;
	//public $url='https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/recipes/search?diet=vegetarian&excludeIngredients=coconut&instructionsRequired=false&intolerances=egg%2C+gluten&limitLicense=false&number=10&offset=0&query=burger&type=main+course';
	public $url='http://food2fork.com/api/search';
 
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
	            'key:d5855ab5152e80aacedef2372acfe596'.$this->token.
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
	       // echo $result;
	        curl_close($ch);

	        return $result ? $result : false;
	        
	    }else{
    		return false;
	echo"sajkdad";
	    }        
    }

}

?>

