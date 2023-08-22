<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'birthday',
        'email',
        'place',
        'clean',
        'waitress',
        'recommendation',
        'socialMedia',
        'comments',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'birthday' => 'date',
        'place' => 'integer',
        'clean' => 'integer',
        'waitress' => 'integer',
        'recommendation' => 'boolean',
        'socialMedia'=> 'array',
    ];

}
