<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'content',
        'menu_id',
        'price',
        'price_sale',
        'active',
        'thumb'
    ];

    public function menu(){
        return $this->hasOne(Menu::class,'id','menu_id');
    }

    public function scopeSearch($query){
        if ($key = request()->input('key-search')){
            $query = $query
                ->where('name','like', '%'.$key.'%');
        }

        return $query;

    }

}
