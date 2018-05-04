<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Store;
use App\Notifications\ResetPassword;

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


    // chama a tabela store
    public function Store()
    {
       return $this->hasMany(Store::class);
    }


    // VALIDAÇÃO DA SENHA
    public function rulesPassword()
    {
        return [
            'password' => 'required|string|min:6|confirmed',
        ];
    }

    // METODO DE ATUALIZAR A SENHA
    public function updatePassword($newPassword)
    {
        $newPassword = bcrypt($newPassword);

        return $this->update([
            'password' => $newPassword,
        ]);
    }

     // notificação para envio de email
    public function sendPasswordResetNotification($token)
    {
          // Não esquece: use App\Notifications\ResetPassword;
          $this->notify(new ResetPassword($token));
    }
}
