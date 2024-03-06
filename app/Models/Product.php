<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'stock',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImagePathsAttribute()
    {
        $mediaItems = $this->getMedia("*");
        $images = [];

        if (count($mediaItems) != 0) {
            foreach ($mediaItems as $mediaItem) {
                array_push($images, $mediaItem->getUrl());
            }
        } else {
            array_push($images, 'https://picsum.photos/200/200');
            array_push($images, 'https://picsum.photos/200/200');
        }

        return $images;
    }
}
