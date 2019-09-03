<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActionFigure extends Model
{
  use SoftDeletes;

  protected $dates = ['deleted_at'];

  protected $fillable = ['name', 'serie_id', 'price'];

  public function serie() {
    return $this->belongsTo('App\Serie');
  }
}
