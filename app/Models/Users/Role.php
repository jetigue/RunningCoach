<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_roles';

    /**
     * Fillable fields for a Track Venue
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->slug = str_slug($model->name);
        });
    }

    /**
     * Get a string path for the season.
     *
     * @return string
     */
    public function path()
    {
        return '/user-roles/' . $this->id;
    }
}
