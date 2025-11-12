<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'image_cover',
        'preparation_time',
        'ingredients',
        'preparation_instructions'
    ];

    // RELAÇÕES

    // Um post pertence a um usuário
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Um post tem muitos comentários
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    // Muitos posts são favoritados por muitos usuários
    public function favorites(){ 
        return $this->belongsToMany(User::class, 'favorites', 'post_id', 'user_id')->withTimestamps(); 
    }
}
