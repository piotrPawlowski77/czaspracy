<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public static $roles = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'surname',
        'phone'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //user moze miec 1 lub wiele dat w grafiku
    public function works()
    {
        return $this->hasMany('App\Models\Work');
    }

    //kazdy user ma 1 role admin lub client
    public function role()
    {
        return $this->hasOne('App\Models\Role');
    }

    public function hasRole(array $roles)
    {
        foreach ($roles as $role)
        {
            //jesli w tab statycznej $roles istnieje rola jak w tab metody hasRole w BG. self to odwolanie do zm statycznej
            if(isset(self::$roles[$role]))
            {
                //jesli rola istnieje - przewrwij skrypt
                if(self::$roles[$role])
                    return true;
            }
            else
            {
                //jesli rola nie jest ustawiona w tab statycznej - zapisz role do zm statycznej => potrzebna relacja role()
                self::$roles[$role] = $this->role()->where('role_name', $role)->exists();

                //jesli rola istnieje - przewrwij skrypt
                if(self::$roles[$role])
                    return true;
            }
        }

        return false;
    }

}
