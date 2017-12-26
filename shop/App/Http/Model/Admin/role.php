<?php

namespace App\Http\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use DB;
class role extends Model
{
    /**
     * 角色添加保存
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function role_save($data,$role_id = ''){
      unset($data['_token']);
      if ($role_id) {
          return DB::table('role')->where('role_id',$role_id)->update($data);
      }else{
        return DB::table('role')->insert($data);
      }

    }
    public function role_select($role_id = ''){
      if ($role_id) {
        return DB::table('role')->where('role_id',$role_id)->get();
      }{
        return DB::table('role')->get();
      }

    }
    public function roel_select($role_id){
        return DB::table('role')->whereIN('role_id',[$role_id])->delete();
    }

}
