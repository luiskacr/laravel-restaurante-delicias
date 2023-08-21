<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'client',
        'date',
        'payment_type',
        'cart_name',
        'cart_number',
        'cart_expiration',
        'subTotal',
        'taxes',
        'total',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'client' => 'integer',
        'date' => 'date',
        'payment_type' => 'integer',
        'subTotal' => 'float',
        'taxes' => 'float',
        'total' => 'float',
    ];

    /**
     * @return BelongsTo
     */
    public function getCliente():BelongsTo
    {
        return $this->belongsTo(Client::class,'client','id');
    }

    /**
     * @return BelongsTo
     */
    public function getPaymentType():BelongsTo
    {
        return $this->belongsTo(PaymentType::class,'payment_type','id');
    }


}
