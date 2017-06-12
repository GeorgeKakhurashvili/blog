<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Comment;
use App\Tag;
class Post extends Model
{
  protected $fillable = [
      'title', 'body'
  ];
  public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function comments()
  {
    return $this->hasMany(Comment::class);
  }
  public static function archive()
  {
    return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
        ->groupBy('year','month')
        ->orderBy('created_at','DESC')
        ->get()
        ->toArray();
  }
  public function tags()
  {
    return $this->belongsToMany(Tag::class);
  }
}
