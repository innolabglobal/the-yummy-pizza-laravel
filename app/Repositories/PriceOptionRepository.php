<?php

namespace App\Repositories;

use App\Models\PriceOption;
use App\Repositories\BaseRepository;

/**
 * Class PriceOptionRepository
 * @package App\Repositories
 * @version May 3, 2020, 3:44 pm UTC
*/

class PriceOptionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'value',
        'menu_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PriceOption::class;
    }
}
