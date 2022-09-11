<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Post;
class Community extends Model
{

    use HasFactory , SoftDeletes  , Sluggable;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'slug',
    ];


    public function topics(){

        return $this->belongsToMany(Topic::class);
    }

    public function posts(){

        return $this->hasMany(Post::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName(){
        return 'slug';
    }

    public function tags(){
        return $this->morphMany(Tag::class,'taggable');
    }
}
