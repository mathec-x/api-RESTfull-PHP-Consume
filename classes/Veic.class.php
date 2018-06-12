<?php 

class Veic{
	
	public $method;

	  public function setMethod($val)
	  {
	      return $method = "http://".$_SERVER['HTTP_HOST']."/app/services/".$val."/veiculos/";
	  }
	 

	public function setContent(){

		return self::setMethod('get');
	}
	
	public function getContent(){
		
		$url = curl_init(self::setContent());
		curl_setopt($url, CURLOPT_CUSTOMREQUEST, "GET");    
	    curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
	    $getAll = curl_exec($url);
	    curl_close($url);
	    return json_decode($getAll, true);

	}

	public function getDelete(){

		return self::setMethod('delete');

	}
	public function setDelete($id){
		
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL,self::getdelete().'?id='.$id);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_exec ($ch);
		return curl_close ($ch);

	}

	public function getUpdate(){

		return self::setMethod('patch');

	}
	public function setUpdate($val,$id){
		
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL,self::getUpdate().'?id='.$id."&venda=".$val);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_exec ($ch);
		return curl_close ($ch);

	}

	public function updated($key){
		if ($key != NULL) {
			$updated = new DateTime($key);
			print $updated->format("d/m/Y H:i:s");
		} else {
			echo "Nunca Alterado";
		}
	}

	public function getCreateContent(){

		return self::setMethod('post');
	}

	public function createContent($marca,$desc,$ano){
		
		$data = array('marca'=> $marca,'obs'=>$desc,'ano'=>$ano);

		$query = '?'.http_build_query($data, '', '&');

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL,self::getCreateContent().$query);
		$server_output = curl_exec($ch);

		curl_close ($ch);

		if ($server_output == "1") {
	    	return die("salvo");
		} else { 
	    	return die("falha".$query);
		}
	}

	public function specVenda($val){
		if ($val == 0) {
			return print("");
		} else {
			return print("checked");
		}
	}


}

?>

