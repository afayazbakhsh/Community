<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Post;
use App\Models\Comment;
use Cviebrock\EloquentTaggable\Taggable;

class Post extends Model
{
    use HasFactory  ,   SoftDeletes, Taggable;
    protected $fillable = [
        'user_id',
        'community_id',
        'title',
        'post_text',
        'post_url',
        'post_image',
        'vote_id'
    ];

    public function comments(){
        return $this->hasMany(Comment::class)->latest();
    }

    public function community(){
        return $this->belongsTo(Community::class);
    }

}
