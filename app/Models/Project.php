<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'type_id',
        'name',
        'description',
        'link',
        'slug'
    ];
    public function type() {
        return $this->belongsTo(Type::class);
    }


    public function tecnologies() {
        return $this->belongsToMany(Tecnology::class);
    }

    public function getUrlImag() {
        return $this->cover_image ? Storage::url($this->cover_image) : null;

    }
}
