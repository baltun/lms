<?php

namespace App\Repositories;

use App\Models\lessons;
use App\Repositories\BaseRepository;

/**
 * Class lessonsRepository
 * @package App\Repositories
 * @version May 28, 2021, 11:37 am UTC
*/

class lessonsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'type_id'
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
        return lessons::class;
    }
}
