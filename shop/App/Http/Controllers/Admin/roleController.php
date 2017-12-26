<?php

namespace App\Http\Controllers\Admin;
use Input;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Model\Admin\role;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Illuminate\Http\Response;
class roleController extends Controller
{

    public $rule = [
        'role_name' => 'require',
        'role_description' => 'require',
        'status' => 'require',
    ];

    public $messages = [
        'role_name.require' => '角色名称是必填项',
        'role_description.require' => '角色描述是必填项',
        'status.require' => '角色状态是必填项',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function role_list()
    {
        $role = new role;
        $role = $role->role_select();
        return view('Admin.role_list',['data'=>$role]);
    }

    public function role_delete(Request $request)
    {
        $roel_id = $request->input('role_id');
        $role = new role;
        $data =$role->roel_select($roel_id);


        if ($data !== false) {
          return response()->json(['status' => 1,'msg'=>'删除成功']);
        }else{
          return response()->json(['status' => 0,'msg'=>'删除失败']);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function role_add(Request $request)
    {
        if ($request->isMethod('get')) {
          return view('Admin.role_add');
        }
        if ($request->isMethod('post')) {
          $role = new role;
          $is_save = $role->role_save($request->all());
          if ($is_save === false) {
            return Redirect::back()-withErrors('插入失败');
          }else{
            return redirect()->action('Admin\roleController@role_list')->with('status','插入成功');
          }
        }

    }

    /**
     * 角色修改
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function role_edit(Request $request,$role_id)
    {
        // get方法获取数据
        if ($request->isMethod('get')) {
            $role = new role;
            $data = $role->role_select($role_id);
            return view('Admin.role_edit',['data'=>$data]);
        }
        if($request->isMethod('post')){
            $role = new role;
            $data = $role->role_save($request->all(),$role_id);
            if ($data === false ) {

                return Redirect::back()->withError('修改失败');
            }else{

                return redirect()->action('Admin\roleController@role_list')->with('status','修改成功');
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
