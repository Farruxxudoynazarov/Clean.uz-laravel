<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'post_id',
        'user_id',
    ];
    
    public function post(){
        return $this->BelongsTo(Post::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
