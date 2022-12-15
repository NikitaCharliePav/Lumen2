<?php

namespace App\Models;

use APP\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    use HasFactory, UuidTrait;

    protected $fillable = [
        'id', 'user_id', 'ordered_at'
    ];

    /**
     * Связь один к многим с моделью OrderProduct таблицы order_products
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function OrderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

}
