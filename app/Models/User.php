<?php

namespace CMS\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements TableInterface
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

    public function getTableHeaders()
    {
        return ['Cód', 'Nome', 'E-mail'];
    }

    public function getValueForHeader($header)
    {
        switch ($header){
            case 'Cód':
                return $this->id;
            case 'Nome':
                return $this->name;
            case 'E-mail':
                return $this->email;

        }
    }
}
