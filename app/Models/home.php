<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Home extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'subtitle', 'img'];

    protected static function boot()
    {
        parent::boot();
        static::updating(function ($model) {
            if ($model->isDirty('img') && ($model->getOriginal('img') !== null)) {
                $oldImages = explode(',', $model->getOriginal('img'));
                foreach ($oldImages as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
        });
    }

    public function getImagesAttribute()
    {
        return explode(',', $this->img);
    }

    public function getSubtitleAttribute($value)
    {
        return strip_tags($value);
    }
}
