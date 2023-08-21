<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Canton extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'province_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'province_id' => 'integer',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Make A Relation with Province.
     *
     * @return BelongsTo
     */
    public function province():BelongsTo
    {
        return $this->belongsTo(Province::class,'province_id','id');
    }

    /**
     * Make A Relation with Districts.
     *
     * @return HasMany
     */
    public function getDistricts():HasMany
    {
        return $this->hasMany(District::class,'canton_id','id');
    }
}
