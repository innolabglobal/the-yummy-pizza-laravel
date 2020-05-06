<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Address
 * @package App\Models
 * @version May 6, 2020, 7:08 am UTC
 *
 * @property \App\Models\User $user
 * @property string $first_name
 * @property string $last_name
 * @property string $address
 * @property string $city
 * @property string $post_code
 * @property string $phone_number
 * @property integer $user_id
 */
class Address extends Model
{
    use SoftDeletes;

    public $table = 'addresses';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'first_name',
        'last_name',
        'address',
        'city',
        'post_code',
        'phone_number',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'first_name' => 'string',
        'last_name' => 'string',
        'address' => 'string',
        'city' => 'string',
        'post_code' => 'string',
        'phone_number' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'address' => 'required',
        'city' => 'required',
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
