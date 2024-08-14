<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Servis extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'subtitle', 'img'];

    protected static function boot()
    {
        parent::boot();

        // Menghapus gambar lama saat gambar diubah
        static::updating(function ($model) {
            if ($model->isDirty('img') && $model->getOriginal('img') !== null) {
                Storage::disk('public')->delete($model->getOriginal('img'));
            }
        });

        // Menghapus gambar saat data dihapus
        static::deleting(function ($model) {
            if ($model->img) {
                Storage::disk('public')->delete($model->img);
            }
        });
    }

    // Mutator untuk menghapus tag HTML dari subtitle
    public function getSubtitleAttribute($value)
    {
        return strip_tags($value);
    }
}
