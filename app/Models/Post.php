<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Image;
use App\Models\Artist;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];

    // public function comments()
    // {
    //     return $this->hasMany(Comment::class);
    // }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    
    public function image()
    {
        return $this->hasOne(Image::class);
    }

    public function imageArtist()
    {
        return $this->hasOneThrough(Artist::class, Image::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    
    public function latestComment()
    {
        return $this->hasOne(Comment::class, 'commentable_id', 'id')->latestOfMany();
    }
}
