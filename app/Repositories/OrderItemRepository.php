<?php

namespace App\Repositories;

use App\Models\OrderItem;
use App\Repositories\BaseRepository;

/**
 * Class OrderItemRepository
 * @package App\Repositories
 * @version May 4, 2020, 11:06 am UTC
*/

class OrderItemRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'order_id',
        'menu_id',
        'quantity',
        'price'
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
        return OrderItem::class;
    }
}
