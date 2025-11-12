<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'post_id',
        'user_id',
        'content',
    ];

    // RELAÇÕES

    // Um comentário pertence a um usuário
    function user(){
        return $this->belongsTo(User::class);
    }

    // Um comentário pertence a um post
    function post(){
        return $this->belongsTo(Post::class);
    }
}
