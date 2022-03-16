<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shore extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'date',
    ];

    public function user(){

    return $this->belongsTo(Property::class);

  }
}
