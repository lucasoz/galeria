<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use DB;
use Laracasts\Flash\Flash;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'email', 'password','nickname', 'type'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public static function obtenerUsuarios(){
        return DB::table('users')->paginate(3);
    }

    public static function almacenarUsuario($request){
        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->save();
        Flash::success("Se ha registrado ".$user->name. " de forma exitosa");
    }

    public static function actualizarUsuario($request,$id){
        $user = User::find($id);
        //también se puede usar $user->fill($request->all());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->nickname = $request->nickname;
        $user->avatar = $request->avatar;
        $user->type = $request->type;
        $user->save();
        Flash::warning('El usuario '.$user->name.' ha sido editado con exito!');
    }

    public static function borrar($id){
        $user = User::find($id);
        $user->delete();
        Flash::error('El usuario '.$user->name.' se borro de forma exitosa');
    }
}

