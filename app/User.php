<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
     {
        return $this->belongsToMany('App\Role', 'users_roles');
     }
     public function isSimpleUser()
     {

         $roles = $this->roles->toArray();
         return !empty($roles);
     }

    public function hasRole($check)
    {
        return in_array($check, array_pluck($this->roles->toArray(), 'name'));
    }

    private function getIdInArray($array, $term)
     {
         foreach ($array as $key => $value) {
             if ($value == $term) {
                 return $key;
             }
         }

         throw new UnexpectedValueException;
     }

     public function makeUser($title)
     {
         $assigned_roles = array();

         $roles = array_pluck(Role::all()->toArray(), 'name');

         switch ($title) {
             case 'admin':
                 $assigned_roles[] = $this->getIdInArray($roles, 'edit_books');
                 $assigned_roles[] = $this->getIdInArray($roles, 'delete_books');
                 $assigned_roles[] = $this->getIdInArray($roles, 'create_books');
                 $assigned_roles[] = $this->getIdInArray($roles, 'list_books');
             case 'simpleUser':
                 $assigned_roles[] = $this->getIdInArray($roles, 'list_books');
                 break;
             default:
                 throw new \Exception("The user status entered does not exist");
         }

         $this->roles()->attach($assigned_roles);
     }
}
