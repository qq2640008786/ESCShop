<?php
// 商品模型
namespace App\Http\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use DB;
class goods extends Model
{
    // 商品保存
    public function goods_save($data,$filePath){
      unset($data['goods_picture']);
      unset($data['_token']);
      unset($data['species_id']);
      $data['goods_picture'] =$filePath;
      return DB::table('goods')->insertGetId($data);
    }
    // 插入商品和种类的关联表
    public function goods_species($species_id, $goods_id){
      $data['species_id'] = $species_id;
      $data['goods_id'] = $goods_id;
      return DB::table('goodsSpecies')->insert($data);

    }
    // 商品查询
    public function goods_select(){
      return DB::table('goods')->leftjoin('goodsSpecies','goods.goods_id','=','goodsSpecies.goods_id')->leftjoin('species','goodsSpecies.species_id','=','species.species_id')->paginate(5);
    }

    public function goodsSpecies($goods_id){
      return DB::table('goods')->leftjoin('goodsSpecies','goods.goods_id','=','goodsSpecies.goods_id')->leftjoin('species','goodsSpecies.species_id','=','species.species_id')->where('goods.goods_id',$goods_id)->get();
    }
    public function goodsSpecies_edit($goods_id,$species_id){
        return DB::table('goodsSpecies')->where('goods_id',$goods_id)->update(['species_id'=>$species_id]);
    }
    public function goods_attributeSave($data){
      unset($data['_token']);
      $data['gid'] = $data['goods_id'];
      unset($data['goods_id']);
      return DB::table('goodsAttribute')->insert($data);
    }
    public function goods_edit($data,$filePath = '',$goods_id = ''){
        if (isset($data['_token'])) {
            unset($data['_token']);
        }
        if (isset($data['goods_picture'])) {
            unset($data['goods_picture']);
            $data['goods_picture'] =  $filePath;
        }
        if (isset($data['species_id'])) {
            unset($data['species_id']);
        }
        return DB::table('goods')->where('goods_id',$goods_id)->update($data);
    }
    // 查询文件路径
    public function file_select($goods_id){
        // dd($goods_id);
        // return DB::select('select goods_picture from s_goods where goods_id='.$goods_id);
        return DB::table('goods')->where('goods_id',$goods_id)->pluck('goods_picture');
    }
    // 删除商品列表
    public function goods_delete($goods_id){
        return DB::table('goods')->where('goods_id',$goods_id)->delete();
    }
    // 删除商品和种类的关联表
    public function goodsSpecies_delete($goods_id){
        return DB::table('goodsSpecies')->where('goods_id',$goods_id)->delete();
    }
}
