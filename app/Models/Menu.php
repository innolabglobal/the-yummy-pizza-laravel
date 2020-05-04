<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Menu
 * @package App\Models
 * @version May 3, 2020, 3:12 pm UTC
 *
 * @property \App\Models\PriceOption $priceOption
 * @property string $name
 * @property string $description
 * @property string $image
 */
class Menu extends Model
{
    use SoftDeletes;

    public $table = 'menus';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'description' => 'required',
        'image' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function priceOption()
    {
        return $this->hasMany(\App\Models\PriceOption::class);
    }
}
