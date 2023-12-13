<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model // nimaga ko'plikka bu ?
// bilmasdan shunoqa berib qoyibman to'g'irla xay
{
    use HasFactory;
    
   protected $fillable = ['user_id', 'category_id', 'title','photo','short_content', 'content',];


   public function user(){
    return $this->belongsTo(User::class);
   }
   public function comments(){
    return $this->hasMany(Comment::class);
   }

   public function category(){
    return $this->belongsTo(Category::class);
   }

   public function tags(){
    return $this->belongsToMany(Tag::class);
   }

}
