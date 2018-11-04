<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $fillable = ['user_id', 'category_id', 'photo_id', 'title', 'content'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

    public function photoPlaceholder(){
        return "http://placehold.it/400x200";
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

}
