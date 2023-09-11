<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Scriptwriter extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name', 'slug'];
    public $table = 'scriptwriters';
    protected $guarded = [];
}
