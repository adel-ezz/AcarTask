<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $table = 'comments';
    protected $fillable = [
        'id',
        'user_id',
        'comment',
        'article_id',
        'created_at',
        'updated_at',
    ];

    public function user_id(){
        return $this->belongsTo(User::class,"user_id");
    }
    public function user(){
        return $this->user_id();
    }
    public function article(){
        return $this->belongsTo(Article::class,"article_id");
    }
}
