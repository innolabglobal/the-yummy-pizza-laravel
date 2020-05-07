<?php

namespace App\Repositories;

use App\Models\DeliverablePostCode;
use App\Repositories\BaseRepository;

/**
 * Class DeliverablePostCodeRepository
 * @package App\Repositories
 * @version May 7, 2020, 3:20 am UTC
*/

class DeliverablePostCodeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'post_code',
        'status',
        'delivery_fees'
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
        return DeliverablePostCode::class;
    }
}
