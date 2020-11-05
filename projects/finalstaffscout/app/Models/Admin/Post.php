<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $appends = ["image_url", "date_formatted", "excerpt"];
    /**
     * return the image url to be displayed on react templates
     */
    public function getImageUrlAttribute()
    {
        return $this->image != "" ? url("uploads/" . $this->image) : "";
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }
    public function getDateFormattedAttribute()
    {
        return \Carbon\Carbon::parse($this->created_at)->format('F d, Y');
    }
    public function getExcerptAttribute()
    {
        return substr(strip_tags($this->content), 0, 100);
    }
}
