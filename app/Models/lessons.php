<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class lessons
 * @package App\Models
 * @version May 28, 2021, 11:37 am UTC
 *
 * @property string $name
 * @property integer $parent_id
 * @property integer $type_id
 */
class lessons extends Model
{
    use SoftDeletes;

    public $table = 'lessons';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'parent_id',
        'type_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'parent_id' => 'integer',
        'type_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'type_id' => 'required'
    ];

    
}
