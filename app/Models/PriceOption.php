<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PriceOption
 * @package App\Models
 * @version May 3, 2020, 3:44 pm UTC
 *
 * @property string $name
 * @property number $value
 * @property integer $menu_id
 */
class PriceOption extends Model
{
    use SoftDeletes;

    public $table = 'price_options';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'value',
        'menu_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'value' => 'double',
        'menu_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'value' => 'required',
        'menu_id' => 'required'
    ];

    
}
