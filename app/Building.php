<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $id_owner
 * @property string $name_building
 * @property string $address_building
 * @property integer $cost
 * @property int $capacity
 * @property string $description
 * @property string $files
 * @property boolean $submission
 * @property boolean $verif
 * @property boolean $edit
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property Rental[] $rentals
 */
class Building extends Model
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
    // protected $fillable = ['id_owner', 'name_building', 'address_building', 'cost', 'capacity', 'description', 'files', 'submission', 'verif', 'edit', 'created_at', 'updated_at'];
    protected $guarded = [];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'id_owner');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
}
