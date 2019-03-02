<?php

namespace App\Model;

use App\Admin;
use Illuminate\Database\Eloquent\Model;


class Article extends Model
{

    protected $table = 'articles';
    protected $fillable = [
        'id',
        'admin_id',
        'cat_id',
        'title',
        'content',
        'created_at',
        'updated_at',
    ];
    public function cat_id(){
        return $this->belongsTo(Category::class,"cat_id");
    }
    public function admin_id(){
        return $this->belongsTo(Admin::class,"admin_id");
    }
    public function comments(){
        return $this->hasMany(Comment::class,"article_id");
    }

}
