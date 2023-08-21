<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Client extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'address1',
        'address2',
        'district',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'district' => 'integer',
    ];


    /**
     * This make a Canton relations
     *
     * @return BelongsTo
     */
    public function getDistrict():BelongsTo
    {
        return $this->belongsTo(District::class,'district','id');
    }
}
