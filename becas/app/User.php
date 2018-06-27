<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        'document_type_codigo', 'codigo', 'expedition_date', 'name', 'first_surname', 'last_surname', 'file', 'birth_date', 'email', 'user', 'gender', 'stratum', 'family_nucleus', 'civil_status', 'neigborhood_id', 'population_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*UNO a MUCHOS*/
    public function posts(){
        /*Una USUARIO tiene muchas POST*/
        return $this->hasMany(post::class);
    }
}
