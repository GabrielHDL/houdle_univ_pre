<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relación uno a uno
    public function description()
    {
        return $this->hasOne(Description::class);
    }

    // Relación uno a muchos inversa
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }

    // Relación muchos a muchos
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    // Relación uno a uno polimorfica
    public function resource()
    {
        return $this->morphOne(Resource::class, 'resourceable');
    }

    // Relación uno a muchos polimorfica
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function reactions()
    {
        return $this->morphMany(Reaction::class, 'reactionable');
    }
}
