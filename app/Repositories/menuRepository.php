<?php

namespace App\Repositories;

use App\Models\menu;
use App\Repositories\BaseRepository;

/**
 * Class menuRepository
 * @package App\Repositories
 * @version May 3, 2020, 3:12 pm UTC
*/

class menuRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'image'
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
        return menu::class;
    }
}
