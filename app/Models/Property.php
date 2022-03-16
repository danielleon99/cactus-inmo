<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'purpose_status',
    ];

     public function Shores(){

    return $this->hasMany(Shore::class);
  }
}
