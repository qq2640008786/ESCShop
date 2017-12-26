<?php

namespace App\Http\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use DB;
class index extends Model
{
    function getinfo($id){
        return DB::table('admin')->where('id',$id)->first();
    }
    function root_save($id,$data){
        unset($data['_token']);
        return DB::table('admin')->where('id',$id)->update($data);
    }
}
