<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Serie extends Model
{
  use SoftDeletes;

  protected $dates = ['deleted_at'];
  protected $fillable = ['name'];

  public function comics() {
    return $this->hasMany('App\Comic');
  }

  public function category() {
    return $this->belongsTo('App\Category');
  }
}
