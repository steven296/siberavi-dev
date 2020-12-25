<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description'];

    protected $table = "categorias";

    public $timestamps = false;
    
    public function to_store($request)
    {
        return self::create($request->all());
    }

    public function to_update($request)
    {
        return self::update($request->all());
    }
}
