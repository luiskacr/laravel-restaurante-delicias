<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order',
        'product',
        'quantity',
        'price',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'order' => 'integer',
        'product' => 'integer',
        'quantity' => 'integer',
        'price' => 'float',
    ];

    /**
     * @return BelongsTo
     */
    public function getOrder():BelongsTo
    {
        return $this->belongsTo(Order::class,'order','id');
    }

    /**
     * @return BelongsTo
     */
    public function getProduct():BelongsTo
    {
        return $this->belongsTo(Product::class,'product','id');
    }

}
