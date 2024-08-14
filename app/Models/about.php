<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class about extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'subtitle'];


    // Mutator untuk menghapus tag HTML dari subtitle
    public function getSubtitleAttribute($value)
    {
        return strip_tags($value);
    }

}
