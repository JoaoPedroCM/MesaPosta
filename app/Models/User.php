<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'tipo_usuario'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // RELAÇÕES

    // Um usuário pode ter muitos posts
    public function posts(){
        return $this->hasMany(Post::class);
    }
    
    // Um usuário pode ter muitos comentários
    public function comentarios()
    { 
        return $this->hasMany(Comment::class); 
    }

    // Um usuário pode curtir muitos comentários
    public function postsCurtidos()
    {
        // Retorna os posts que o usuário curtiu.
        return $this->belongsToMany(Post::class, 'likes', 'user_id', 'post_id')->withTimestamps();
    }

    // Um usuário pode favoritar muitos posts
    public function postsFavoritados(){
        // Retorna os posts que o usuário favoritou.
        return $this->belongsToMany(Post::class, 'favorites', 'user_id', 'post_id')->withTimestamps(); // Inclui as colunas created_at/updated_at da tabela pivô
    }
}
