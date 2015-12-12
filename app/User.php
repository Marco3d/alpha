<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Hash;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, SoftDeletes ;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'username' ,'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    protected $dates = ['deleted_at'];

    

    //MUTATORS

    //encriptar las contraseñas

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    //dejar en minuscula el email

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = mb_strtolower($value, 'UTF-8');
    }

       // dejar en minuscula el username
     public function setUsernameAttribute($value)
     {
        $this->attributes['username'] = mb_strtolower($value, 'UTF-8');
     }


     //quitar espacios de los nombres

     public function setNameAttribute($value)
     {
        $name = trim($value);
        $name = preg_replace('/\s\s+/','',$name);
        $this->attributes['name'] = $name;
       
     }
}
