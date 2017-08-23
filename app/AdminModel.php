<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    public function Getlistuser() {
		
		$url = \App\connect::url().'/card/types';
		$string = file_get_contents($url, false, \App\connect::getconnet()); 
		$result = json_decode($string, true);
		return $result;
	
	}
}
