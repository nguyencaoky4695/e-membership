<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
class connect extends Model
{
    public static function url(){
     	return 'http://45.63.127.251:3001';
     }
     public static function getconnet()
	{
		$coke = Session::get('cokei');
		$opts = array(
			'http'=>array(
				'method'=>"GET",
				'header'=>"Cookie:$coke"
				)
			);
		
		$context = stream_context_create($opts);
		return $context;
	
	}

	 public static function postconnet()
	{
		$coke = Session::get('cokei');
		$opts = array(
			'http'=>array(
				'method'=>"POST",
				'header'=>"Cookie:$coke"
				)
			);
		$context = stream_context_create($opts);
		return $context;
	}

	public static function sendPostData ($url,$data) {
		
		// $data_string = json_encode($data);
    	$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: multipart/form-data'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_POST, 1); // khai báo có dữ liệu POST được gửi đi
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data); //đưa dữ liệu vào CURL
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); //Nếu URL có dạng https thì khai báo thêm
		// curl_setopt($ch, CURLOPT_INFILESIZE, $filesize);
		$result = curl_exec($ch);
		$thongbao = json_decode($result, true);
		curl_close($ch);

    	return $thongbao;
	}
}
