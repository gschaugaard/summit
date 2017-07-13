<?php
class Parse{ 
	public $input;

	public function parse(){
		if(preg_match('/([a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+)/i', $this->input, $m)){
			$email = $m[1];
			$this->input = str_replace($email, '', $this->input);
		}
		if(preg_match('/((\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4})/', $this->input, $m)){
			$phone = $m[1];
			$this->input = str_replace($phone, '', $this->input);
		}

		if(preg_match('/((([R].+)|\d+).+\d{5})/i', $this->input, $m)){
			$address = $m[1];
			$this->input = str_replace($address, '', $this->input);
		}

		$name = $this->input;

		$return = array(
			'name' => trim($name),
			'email' => trim($email),
			'phone' => trim($phone),
			'address' => trim($address)
		);
		return $return;
	}

}
?>