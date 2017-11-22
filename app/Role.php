<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 */
class Role extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany('User', 'users_roles');
    }

}
