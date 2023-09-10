<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class HomeCategories extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['cat_name', 'slug'];
    public $table = 'home_categories';
    protected $guarded = [];
}
