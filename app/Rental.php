<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $id_building
 * @property integer $id_loaner
 * @property string $day_start
 * @property string $day_over
 * @property string $created_at
 * @property string $updated_at
 * @property Building $building
 * @property User $user
 * @property Payment[] $payments
 */
class Rental extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['id_building', 'id_loaner', 'day_start', 'day_over', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function building()
    {
        return $this->belongsTo('App\Building', 'id_building');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'id_loaner');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function payments()
    // {
    //     return $this->hasMany('App\Payment', 'id_rental');
    // }
}
