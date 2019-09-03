<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rare extends Model
{
    public function comic() {
      return $this->hasOne('App\Comic');
    }
}
