<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Order
 * @package App\Models
 * @version May 4, 2020, 9:44 am UTC
 *
 * @property \App\Models\User $user
 * @property string $order_number
 * @property integer $user_id
 * @property string $status
 * @property number $grand_total
 * @property integer $item_count
 * @property boolean $payment_status
 * @property string $payment_method
 * @property string $first_name
 * @property string $last_name
 * @property string $address
 * @property string $city
 * @property string $country
 * @property string $post_code
 * @property string $phone_number
 * @property string $notes
 */
class Order extends Model
{
    use SoftDeletes;

    public $table = 'orders';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'order_number',
        'user_id',
        'status',
        'grand_total',
        'item_count',
        'payment_status',
        'payment_method',
        'first_name',
        'last_name',
        'address',
        'city',
        'country',
        'post_code',
        'phone_number',
        'notes'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'order_number' => 'string',
        'user_id' => 'integer',
        'status' => 'string',
        'grand_total' => 'float',
        'item_count' => 'integer',
        'payment_status' => 'boolean',
        'payment_method' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'address' => 'string',
        'city' => 'string',
        'country' => 'string',
        'post_code' => 'string',
        'phone_number' => 'string',
        'notes' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'order_number' => 'required',
        'status' => 'required',
        'grand_total' => 'required',
        'item_count' => 'required',
        'payment_status' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'address' => 'required',
        'city' => 'required',
        'country' => 'required',
        'post_code' => 'required',
        'phone_number' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
