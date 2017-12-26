<?php

namespace App\Http\Model\Admin;

use Illuminate\Database\Eloquent\Model;

use DB;
class species extends Model
{
  public function species_save($data,$species_id = ''){
    foreach ($data as $key => $value) {
      unset($data['_token']);
    }
    if ($species_id) {
        return DB::table('species')->whereIn('species_id',[$species_id])->update($data);
    }else{
        return DB::table('species')->insert($data);
    }
  }
  public function species_select($species_id = ''){
    if ($species_id) {
        return DB::table('species')->where('species_id',$species_id)->get();
    }else{
      return DB::table('species')->get();
    }
  }
  public function species_del($species_id){
    // DB::connection()->enableQueryLog();
    return  DB::table('species')->whereIn('species_id',[$species_id])->delete();
      // $log = DB::getQueryLog();
      // dd($log);
  }
}
