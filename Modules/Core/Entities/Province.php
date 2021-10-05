<?php

namespace Modules\Core\Entities;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = [
    	'name',
    	'city',
    	'district'
    ];
}
