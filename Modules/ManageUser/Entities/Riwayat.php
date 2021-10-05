<?php

namespace Modules\ManageUser\Entities;

use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'activity_log';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'log_name',
        'description',
        'subject_type',
        'subject_id',
        'causer_type',
        'causer_id',
        'properties',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'properties' => 'array',
    ];

    /**
     * Get the relationship for the model.
     */
    public function users()
    {
        return $this->belongsTo('Modules\ManageUser\Entities\User', 'causer_id');
    }
}
