<?php

namespace App\Http\Controllers\Admin;
use App\User;
use Illuminate\Http\Request;
use Crypt;
use DB;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Input;
use Cookie;
use Redirect;
use Response;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public $rule = [
         'username' => 'required|min:4|max:16',
         'password' => 'required',
         'password' => ['required','min:4','max:20','regex:/^[a-zA-Z0-9!"#$%&\'()*+,-.\/:;<=>?^_`~{|}\]]+$/'],
        //  'passwdtwo' =>['required','min:8','max:20','same:passwd','regex:/^[a-zA-Z0-9!"#$%&\'()*+,-.\/:;<=>?^_`~{|}\]]+$/'],
     ];

     public $messages = [
         'username.required' => '用户名不能为空',
         'username.min' => '用户名最小4字符',
        //  'username.unique' => '用户名已存在',
        //  'name.required' => '姓名是必填项',
         'password.required' => '密码不能为空',
         'password.min' => '密码长度最小4字符',
         'password.max' =>'密码长度最大为20字符',
         'password.regex'=>'密码不能为特殊字符',
        //  'passwdtwo.required' => '确认密码是必填项',
        //  'passwdtwo.min' => '确认密码长度最小8字符',
        //  'passwdtwo.max' =>'确认密码长度最大为20字符',
        //  'passwdtwo.same' => '两次输入的密码必须相同',
        //  'passwdtwo.regex' =>'确认密码不能为特殊字符',

     ];
    public function login(Request $request,Response $reponse)
    {
        if ($request->isMethod('get')) {
          if(session('user')){
            return redirect()->action('Admin\IndexController@index');
          }else{
            return view('Admin.Login');
          }

        }
        if ($request->isMethod('post')) {
          // $user = Crypt::encrypt('root');
          // dd($user);exit;
          // // dd(Crypt::decrypt($user));exit;
          // $validator = $this->validate($request, [
          //   'username' => 'required|unique:User|max:255'
          //   // 'password' => 'required',
          // ]);
          $myrule = $this->rule;
          $validator = Validator::make(Input::all(),$myrule,$this->messages);
          if ($validator->fails()) {
             return Redirect::back()->withErrors($validator);
          }
          $user_info = DB::table('admin')->where('username',$request->input('username'))->first();
          if (!$user_info) {
              return Redirect::back()->withErrors('用户名不存在');
          }
          if (!(Crypt::decrypt($user_info->password) == $request->input('password'))) {
              return Redirect::back()->withErrors('密码错误');
          }else{
              $user_info = (array)$user_info;
              session(['user'=>$user_info]);
              return redirect()->action('Admin\IndexController@index');

          }
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login_out(Request $request)
    {
      session(['user'=>null]);
      return redirect()->action('Admin\IndexController@index');
    }

}
