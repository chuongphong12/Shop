<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\PostEditRequest;
use App\User;
use Hash;
use Auth;
use Redirect;
use Request;
class UserController extends Controller
{
    public function getAdd(){
    	return view ('admin.users.add');
    }
    public function postAdd(UserRequest $request){
    	$user = new User();
    	$user->full_name = $request->txtName;
    	$user->email = $request->txtEmail;
        $user->address = $request->txtAddress;
        $user->phone = $request->txtPhone;
    	$user->password = Hash::make($request->txtPass); 
    	$user->level = $request->rdoLevel;
    	$user->status = 1;
    	$user->remember_token = $request->_token;
    	$user->save();

    	return redirect()->route('admin.users.getList')->with(['flash_message'=>'Thành viên được thêm mới thành công !']);
    }
    public function getList(){
    	$user = User::select('id','full_name','level','status','created_at')->orderBy('id','DESC')->get()->toArray();
    	return view('admin.users.list',compact('user'));
    }
    public function getEdit($id){
    	$user = User::find($id);
        if ((Auth::user()->id != 1) && ($id ==1 || $user['level'] ==1 && Auth::user()->id != $id)) {
        	return redirect()->route('admin.users.getList')->with(['flash_message'=>'Bạn không có quyền truy cập user này.']);
        }
        return view('admin.users.edit',compact('user','user_details','id'));
    }
    public function postEdit($id ,PostEditRequest $request){
    	$user = User::find($id);
    	if (Request::input('txtPass')) {
    		$user->password =Hash::make($request->txtPass);
    	}
    
    	if (Request::input('rdoLevel')) {
    		$user->level =Request::input('rdoLevel');
    	}
		if (Request::input('rdoStatus')) {
    		$user->status =Request::input('rdoStatus');
    	}
		$user->remember_token =Request::input('_token');
		$user->save();
		
		return redirect()->route('admin.users.getList')->with(['flash_message'=>'Đã sửa thành công ! ']);
    }
    public function getLogin(){
    	return view('admin.pages.login');
    }
    public function postLogin(LoginRequest $request){
    	$login = array(
    		'email' => $request->email,
    		'password' => $request->password,
    		'level' => 1
    	);
    	if (Auth::attempt($login)) {
    		return redirect()->route('admin.pages.tables');
    	}
    	else{
    		return Redirect::back()->withErrors(['Đăng nhập không thành công', 'Kiểm tra lại username hoặc password .']);
    	}
    }
    public function getLogout(){
    	if (Auth::logout()) {
    		return redirect()->route('admin.pages.getLogin');
    	}
    }
    public function getDelete($id){
    	$user_current = Auth::user()->id;
    	$user = User::find($id);
    	if (($id == 1 )|| ($user_current !=1 && $user['level']==1)) {
    		return redirect()->route('admin.users.getList')->with(['flash_message'=>'Bạn không thể xóa user này  .']);
    	}
    	else{
	        $user->delete($id);
    		return redirect()->route('admin.users.getList')->with(['flash_message'=>'Đã xóa thành công ! ']);
    	}
    }
    public function getDetail($id){
    	$data = User::findOrFail($id)->toArray();
        return view('admin.users.details',compact('data','id'));
    }
}
