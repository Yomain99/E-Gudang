<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $id_rental
 * @property string $day_payment
 * @property integer $salary
 * @property string $approvement
 * @property string $created_at
 * @property string $updated_at
 * @property Rental $rental
 */
class Payment extends Model
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
    protected $fillable = ['id_rental', 'day_payment', 'salary', 'approvement', 'created_at', 'updated_at', 'bukti_tf'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function building()
    {
        return $this->belongsTo('App\Building', 'id_building');
    }
    // public function rental()
    // {
    //     return $this->belongsTo('App\Rental', 'id_rental');
    // }
}
