<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DeliverablePostCode
 * @package App\Models
 * @version May 7, 2020, 3:20 am UTC
 *
 * @property string $post_code
 * @property boolean $status
 * @property number $delivery_fees
 */
class DeliverablePostCode extends Model
{
    use SoftDeletes;

    public $table = 'deliverable_post_codes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'post_code',
        'status',
        'delivery_fees'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'post_code' => 'string',
        'status' => 'boolean',
        'delivery_fees' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'post_code' => 'required',
        'status' => 'required',
        'delivery_fees' => 'required'
    ];

    
}
