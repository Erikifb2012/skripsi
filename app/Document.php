<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table="documents";
    protected $fillable = [
        'name_doc',
    ];
    /*public static function valid() {
    return array(
      'name_doc' => 'required');
  }
    // public static function valid($id=''){
    // 	return array('name_doc' =>'required');
    // }
*/}
