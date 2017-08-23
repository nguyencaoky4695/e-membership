<?php
/**
 * Created by PhpStorm.
 * User: ThangLe
 * Date: 7/7/2017
 * Time: 10:27 AM
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\HbbUser;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller{
    public function getLogin(){
        
        return view('admin.login');
    }
    public  function postLogin(Request $request){
        $data  = $request->all();

        $url = \App\connect::url().'/users/loginAdmin';
        $data_string = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
            'Content-Length: ' . strlen($data_string)));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POST, 1); // khai báo có dữ liệu POST được gửi đi
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string); //đưa dữ liệu vào CURL
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); //Nếu URL có dạng https thì khai báo thêm
        $result = curl_exec($ch);
        curl_close($ch);

        $mang_result=array();
        $mang_data=explode("\n",$result);

        $mang_cokie = trim(explode(":",$set_cokie['cokie']=$mang_data[5])[1]);
         Session::put('cokei',$mang_cokie);
       
        $kq['status']=$mang_data[9];
        $thongbao = json_decode($kq['status'], true);
        //dd($thongbao);
        if($thongbao['success'] == false)
        {   
            if(isset($thongbao['errorMessage'])){
                if($thongbao['errorMessage'] == 'Incorrect email.'){
                    dd('email');
                    return redirect()->back()->with(['flash_level'=>'danger','flash_message'=>'Email không đúng']);
                }
                if($thongbao['errorMessage'] == 'Incorrect password.'){
                    dd('pass');
                    return redirect()->back()->with(['flash_level'=>'danger','flash_message'=>'Password không đúng']);
                }
            }
            
        }
        elseif($thongbao['success'] == true && $thongbao['data']['role']==1){

            Session::put('login',$thongbao['data']);
            return redirect('/admin');
        }

        elseif($thongbao['success'] == true && $thongbao['data']['role']==0){

            return redirect()->back()->with(['flash_level'=>'danger','flash_message'=>'Bạn không có quyền đăng nhập']);
        }

        // dd(1234);
    }

    public function Logout(Request $request){
        $request->session()->flush();
        return redirect('/admin/log-in');
    }
}