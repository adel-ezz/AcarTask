<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categories';
    protected $fillable = [
        'id',
        'admin_id',
        'title',
        'created_at',
        'updated_at',
    ];

    public function admin_id()
    {
        return $this->belongsTo(\App\Admin::class, 'id', 'admin_id');
    }
    public function articles()
    {
        return $this->hasMany(Article::class, 'id', 'cat_id');
    }



}
