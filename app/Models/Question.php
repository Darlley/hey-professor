<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question'
    ];

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function likes(): Attribute
    {
        return new Attribute(get: fn() => $this->votes()->sum('like'));
    }
    
    public function unlikes(): Attribute
    {
        return new Attribute(get: fn() => $this->votes()->sum('unlike'));
    }
}
