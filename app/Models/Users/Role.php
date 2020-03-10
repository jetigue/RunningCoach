<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Role extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_roles';

    /**
     * Fillable fields for a User Role.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

//    /**
//     * @return string
//     */
//    public function getRouteKeyName()
//    {
//        return 'slug';
//    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->slug = Str::slug($model->name);
        });
    }

    /**
     * Get a string path for the season.
     *
     * @return string
     */
    public function path()
    {
        return '/user-roles/'.$this->id;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class, 'user_role_id');
    }
}
