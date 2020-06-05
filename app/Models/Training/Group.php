<?php

namespace App\Models\Training;

use App\Models\Athlete;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Group
 * @package App\Models\Training
 */
class Group extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'training_groups';

    /**
     * Fillable fields for an athlete.
     *
     *@var array
     */
    protected $fillable = ['name', 'color'];

    /**
     * @return BelongsTo
     */
    public function workout() {
        return $this->belongsTo(Workout::class, 'training_group_id');
    }

    /**
     * @return HasMany
     */
    public function athletes() {
        return $this->hasMany(Athlete::class);
    }
}
