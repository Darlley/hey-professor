<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'draft'
    ]; 

    protected $casts = [
        'draft' => 'boolean',
    ];

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
