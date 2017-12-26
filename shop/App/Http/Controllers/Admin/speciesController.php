<?php

namespace App\Http\Controllers\Admin;
use Validator;
use Input;
use Redirect;
use \Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \App\Http\Model\Admin\species;
class speciesController extends Controller
{

  public $rule = [
      'species_name' => 'required|unique:users,species_name',
      'species_description' => 'required',
      'species_number' => 'required|:species',
      'species_name' => ['required','min:2','max:20'],
  ];

  public $messages = [
      'species_name.required' => '种类名称是必填项',
      // 'species_name.unique' => '种类名称已存在',
      'species_description.required' => '种类描述是必填项',
      'species_name.min' => '种类名称长度最小2字符',
      'species_name.max' =>'种类明称长度最大为20字符',
      'species_number.required' => '种类编号是必填项',
      // 'species_number.unique' => '种类编号已存在',
      // 'passwd.regex'=>'密码不能为特殊字符',
      // 'passwdtwo.required' => '确认密码是必填项',
      // 'passwdtwo.min' => '确认密码长度最小8字符',
      // 'passwdtwo.max' =>'确认密码长度最大为20字符',
      // 'passwdtwo.same' => '两次输入的密码必须相同',
      // 'passwdtwo.regex' =>'确认密码不能为特殊字符',

  ];
    /**
     * 种类管理列表
     *
     * @return \Illuminate\Http\Response
     */
    public function species_list()
    {
        $species = new species;
        $species_list = $species->species_select();
        return view('Admin.species_list',['species_list'=>$species_list]);
    }
    /**
     * 种类管理修改
     */
    public function species_edit(Request $request,$species_id){
        if ($request->isMethod('get')) {
          $species = new species;
          $species_list = $species->species_select($species_id);
          return view('Admin.species_edit',['species_list'=>$species_list]);
        }
        if ($request->isMethod('post')) {
          $myrule = $this->rule;
          $validator = Validator::make(Input::all(),$myrule,$this->messages);
          if ($validator->fails()) {
              return Redirect::back()->withErrors($validator);
          }
          $species = new species;
          $is_save = $species->species_save($request->all(),$request->input('species_id'));
          if ($is_save !== false) {
              return redirect()->action('Admin\speciesController@species_list')->with('status', '修改成功');
          }else{
            return Redirect::back()->withErrors('修改失败');
          }
        }

    }
    /**
     * 种类管理添加
     *
     * @return \Illuminate\Http\Response
     */
    public function species_add(Request $request)
    {
        if ($request->isMethod('get')) {
          return view('Admin.species_add');
        }
        if ($request->isMethod('post')) {

           $myrule = $this->rule;
           $validator = Validator::make(Input::all(),$myrule,$this->messages);
           if ($validator->fails()) {
               return Redirect::back()->withErrors($validator);
           }
           $species = new species;
           $is_save = $species->species_save($request->all());
           if (!$is_save) {
              return Redirect::back()->withErrors('插入失败');
           }else{
              return redirect()->action('Admin\speciesController@species_list')->with('status', '插入成功');
           }
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function species_delete(Request $request)
    {

        $species_id = $request->input('species_id');
        $species_id = rtrim($species_id,',');
        // dd($species_id);
        $species = new species;
        $is_del = $species->species_del($species_id);
        if ($is_del === false) {
            $data = ['msg'=>'删除失败','status'=>'0'];
            return response()->json($data);
        }else{
            $data = ['msg'=>'删除成功','status'=>'1'];
            return response()->json($data);
        }
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
