<?php

namespace App\Repositories;

use App\Models\Address;
use App\Repositories\BaseRepository;

/**
 * Class AddressRepository
 * @package App\Repositories
 * @version May 6, 2020, 7:08 am UTC
*/

class AddressRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'first_name',
        'last_name',
        'address',
        'city',
        'post_code',
        'phone_number',
        'user_id'
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
        return Address::class;
    }
}
