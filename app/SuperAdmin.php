<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuperAdmin extends Model
{
  protected $fillable = [
      'name', 'email'
  ];
}
