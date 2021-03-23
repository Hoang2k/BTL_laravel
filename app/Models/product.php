<?php

namespace App\Models;
use App\Models\category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    public $table='products';
    public $timestamps = false;
    public function Category(){
        return $this->belongsTo(category::class,'id');
    }
}
