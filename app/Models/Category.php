<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'categories';

    protected $fillable = [
        'name',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getImagePathAttribute()
    {
        $mediaItems = $this->getMedia("*");
        if (count($mediaItems) != 0) {
            return $mediaItems[0]->getUrl();
        }

        return 'https://picsum.photos/200/200';
    }
}
