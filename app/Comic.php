<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comic extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at', 'exit_date'];
    protected $fillable = ['name', 'serie_id'];   //aggiungere x tutti i campi che usano il fill durante l'update

    public function serie() {
      return $this->belongsTo('App\Serie');
    }

    public function rare() {
      return $this->belongsTo('App\Rare');
    }
}
