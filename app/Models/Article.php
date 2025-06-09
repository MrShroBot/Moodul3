<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'body','price','material'];

    protected function snippet(): Attribute
    {
        return Attribute::get(function () {
            return explode("\n\n", $this->body)[0];
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function image(): Attribute
    {
        return Attribute::get(function (){
            return $this->images()->first();
        });
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function prices()
    {
        return $this->belongsToMany(Price::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }


    public function authHasLiked()
    {
        if(auth()->check()) {
            return $this->likes()->where('user_id', auth()->user()->id)->exists();
        }
        return false;
    }
}
