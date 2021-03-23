<?php

namespace App\Models;
use App\Models\product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public  $table='category';

    public function product(){
        return $this->hasMany(product::class,'category_id','id');
    }
}
