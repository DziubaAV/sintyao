<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Catalog extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    public $fillable=['name','type','body','parent_id'];
    public function videos() {

        return $this->hasMany(Video::class);
    }

   
}