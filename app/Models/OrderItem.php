<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OrderItem
 * @package App\Models
 * @version May 4, 2020, 11:06 am UTC
 *
 * @property \App\Models\Menu $menu
 * @property \App\Models\Order $order
 * @property integer $order_id
 * @property integer $menu_id
 * @property integer $quantity
 * @property number $price
 */
class OrderItem extends Model
{
    use SoftDeletes;

    public $table = 'order_items';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'order_id',
        'menu_id',
        'quantity',
        'price'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'order_id' => 'integer',
        'menu_id' => 'integer',
        'quantity' => 'integer',
        'price' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'order_id' => 'required',
        'menu_id' => 'required',
        'quantity' => 'required',
        'price' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function menu()
    {
        return $this->belongsTo(\App\Models\Menu::class, 'menu_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class, 'order_id');
    }
}
