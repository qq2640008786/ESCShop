<?php

namespace App\Http\Controllers\Admin;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use Input;
use Storage;
use DB;
use \App\Http\Model\Admin\species;
use League\Flysystem\Filesystem;
// use Dropbox\Client as DropboxClient;
// use Illuminate\Support\ServiceProvider;
// use League\Flysystem\Dropbox\DropboxAdapter;
use \App\Http\Model\Admin\goods;
class goodsController extends Controller
{


      public $rule = [
          'goods_name' => 'required|unique:goods,goods_name',
          'goods_number' => 'required',
          'goods_description' => 'required',
          'goods_name'=>['required'],
      ];
      public $messages = [
        'goods_name.required' => '商品名称必填项',
        'goods_name.unique' => '商品名称已存在',
        'goods_number.required' => '商品单号是必填项',
        'goods_description.required' => '商品描述是必填项',

    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function goods_list(Request $request)
    {
        if ($request->isMethod('get')) {
            $goods  = new goods;
            $data = $goods->goods_select();
            // dd($data);
            return view('Admin.goods_list',['data'=>$data]);
        }
    }
    public function goods_delete(Request $request){
        $goods_id = $request->input('goods_id');
        $goods  = new goods;
        DB::beginTransaction();
        $is_delete = $goods->goods_delete($goods_id);
        if ($is_delete !== false) {
            $goodsSpecies = $goods->goodsSpecies_delete($goods_id);
            if ($goodsSpecies !== false) {
              DB::commit();
              return response()->json(['status'=>1,'msg'=>'删除成功']);
            }else{
              DB::rollback();
              return response()->json(['status'=>'0','msg'=>'删除失败']);
            }
        }else{
            DB::rollback();
            return response()->json(['status'=>'0','msg'=>'删除失败']);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function goods_add(Request $request)
    {
      if ($request->isMethod('get')) {
          $species = new species;
          $species = $species->species_select();

          return view('Admin.goods_add',['species'=>$species]);
      }

      if ($request->isMethod('post')) {
          $goods_picture = 'goods_picture';
          $myrule = $this->rule;
          $validator = Validator::make(Input::all(),$myrule,$this->messages);
          if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput(Input::get());
          }
        if(!$request->hasFile($goods_picture)){
          return Redirect::back()->withErrors('文件不存在');
        }
        $file = $request->file($goods_picture);
        //判断文件上传过程中是否出错
        if(!$file->isValid()){
          return Redirect::back()->withErrors('文件上传出错！');
        }
        $newFileName = md5(time().rand(0,10000)).'.'.$file->getClientOriginalExtension();
        $savePath = './'.$newFileName;
        $savePaths = '/uploads/'.$newFileName;
        $goods = new  goods;
        DB::beginTransaction();
        $goods_id = $goods->goods_save($request->all(),$savePaths);
        $is_goods_species = $goods->goods_species($request->input('species_id'),$goods_id);
        if ($goods_id && ($is_goods_species !== false)) {
            $bytes = Storage::disk('upload')->put(
                $savePath,
                file_get_contents($file->getRealPath())
            );
            if(!$bytes){
                DB::rollback();
                return Redirect::back()->withErrors('文件上传保存失败！');
            }else{
                DB::commit();
                return redirect()->action('Admin\goodsController@goods_list')->with('status','商品添加成功');
            }
        }else{
          DB::rollback();
          return Redirect::back()->withErrors('商品添加失败');
        }


          }
          // dd($request->all());



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function species_list(Request $request)
    {
        return view('Admin.species');
    }

    /**
     * 没有用
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function goods_attribute(Request $request,$goods_id,$species_id)
    {
        if ($request->isMethod('get')) {
            $goods = new goods;
            $data = $goods->goodsSpecies($goods_id);
            return view('Admin.goods_attribute',['data'=>$data]);
        }
        if ($request->isMethod('post')) {
          $data = $request->all();
          $validator = Validator::make($data, [
                'goods_type' => 'required',
                'goods_stock' => 'required',
            ],['goods_type.required'=>' 商品类型不能为空','goods_stock.required'=>' 商品库存不能为空']);

            if ($validator->fails()) {
                return redirect::back()->withErrors($validator);
            }
            $goods = new goods;
            $is_save = $goods->goods_attributeSave($data);
            if ($is_save !== false) {
                return redirect()->action('Admin\goodsController@goods_list')->with('status','添加商品属性成功!');
            }else{
                return redirect::back()->withErrors('添加商品属性失败!');
            }
        }
    }


    /**
     * 商品修改
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function goods_edit(Request $request, $goods_id)
    {
        if ($request->isMethod('get')) {
          $goods = new goods;
          $data = $goods->goodsSpecies($goods_id);
          $species = new species;
          $species = $species->species_select();
          return view('Admin.goods_edit',['data'=>$data,'species'=>$species]);
        }
        if ($request->isMethod('post')) {
            $goods_picture = 'goods_picture';
            $myrule = $this->rule;
            $validator = Validator::make(Input::all(),$myrule,$this->messages);
            if ($validator->fails()) {
              return Redirect::back()->withErrors($validator)->withInput(Input::get());
            }

            DB::beginTransaction();

            $goods = new goods;
            if (isset(Input::all()['goods_picture'])) {
                if (!$request->hasFile($goods_picture)) {
                    return Redirect::back()->withError('文件不存在');
                }

                $file = $request->file($goods_picture);
                if (!$file->isValid()) {
                    return Redirect::back()->withError('文件上传失败');
                }

                $files = $goods->file_select($goods_id);
                $newFileName = md5(time().rand(0,100000)).'.'.$file->getClientOriginalExtension();
                $savePath = './'.$newFileName;
                $savePaths = '/uploads/'.$newFileName;
                $goods_edit  = $goods->goods_edit($request->all(),$savePaths,$goods_id);
                $goodsSpecies = $goods->goodsSpecies_edit($goods_id,$request->input('species_id'));
                if (($goods_edit !== false) && ($goodsSpecies !== false)) {
                  $path = '/Users/qingyun/ECShop/ESCShop/shop/public';
                    if (file_exists($path.$files)) {

                      unlink($path.$files);
                      return Redirect::back()->withErrors('文件上传失败！');
                    }
                    $bytes = Storage::disk('upload')->put($savePath,file_get_contents($file->getRealPath()));
                    if((!$bytes) && (!$files)){
                        DB::rollback();
                        return Redirect::back()->withErrors('文件上传保存失败！');
                    }else{
                         DB::commit();
                         return redirect()->action('Admin\goodsController@goods_list')->with('status','商品修改成功');
                    }
                }else{
                    DB::rollback();
                    return Redirect::back()->withError('商品修改失败');
                }
            }else{
                $is_edit = $goods->goods_edit(Input::all(),$filePath = '',$goods_id);
                $goodsSpecies = $goods->goodsSpecies_edit($goods_id,$request->input('species_id'));
                if (($is_edit !== false) && ($goodsSpecies !== false)) {
                    DB::commit();
                    return redirect()->action('Admin\goodsController@goods_list')->with('status','商品修改成功');
                }else{
                    DB::rollback();
                    return Redirect::back()->withError('商品修改失败');
                }
            }
        }
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
