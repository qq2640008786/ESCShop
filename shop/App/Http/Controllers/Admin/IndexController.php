<?php

namespace App\Http\Controllers\Admin;
use App\Http\Model\Admin\index;
use Illuminate\Http\Request;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Illuminate\Http\Response;
use Cookie;
use Validator;
use Input;
class IndexController extends Controller
{


  public $rule = [
      'nickname' => 'required|:species',
      'email' => 'required',
      'nickname' => ['required','min:2','max:20'],
  ];

  public $messages = [
      'nickname.required' => '昵称是必填项',
      'email.required' => '邮箱是必填项',
      'nickname.min' => '昵称长度最小2字符',
      'nickname.max' =>'昵称长度最大为20字符'

  ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,Response $reponse)
    {
        if (!session('user')) {
            return redirect()->action('Admin\LoginController@login');
        }
        return view('Admin.Index')->with(session('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Admin(Request $request)
    {
        if($request->isMethod('get')){
            $ip = ($_SERVER['REMOTE_ADDR']);
            $id = session('user')['id'];
            $index = new index;
            $data = $index->getinfo($id);
            return view('Admin.root',['data'=>$data,'ip'=>$ip]);
        }
        if($request->isMethod('post')){
          // dd(Input::all());
            $id = $request->input('id');
            $index = new index;
            $myrule = $this->rule;
            $validator = Validator::make(Input::all(),$myrule,$this->messages);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $is_save = $index->root_save($id,Input::all());
            if ($is_save === false) {
                return Redirect::back()->withErrors('提交个人信息失败');
            }else {
                  return redirect()->action('Admin\IndexController@index')->with('status', '提交个人信息成功');
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
