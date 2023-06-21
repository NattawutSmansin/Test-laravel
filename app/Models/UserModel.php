<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasOne;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'username',
        'password',
        'first_name',
        'last_name',
        'position_id',
        'last_login_at',
    ];


    public function CheckUserSignIn($username=null)
    {
        $tbl_user = UserModel::select('username', 'password')->where('username', $username)->first();

        return $tbl_user;
    }

    public function UpdateFeildLastSingIn($username=null, $list_arr=null)
    {
        $tbl_user = UserModel::where('username', $username);

        $tbl_user->update($list_arr);

        return $tbl_user;
    }

    public function GetDataUser($user_id=null)
    {
        if($user_id !== null) {
            $tbl_user = UserModel::with('ORMPosition')->where('id', $user_id)->first();
        } else {
            $tbl_user = UserModel::with('ORMPosition')->get();
        }
        return $tbl_user;
    }

    public function UpdateDataUser($user_id=null, $list_arr)
    {

        $tbl_user = UserModel::where('id', $user_id);

        $tbl_user->update($list_arr);

        return $tbl_user;
    }

    public function DeleteDataUser($user_id=null)
    {

        $tbl_user = UserModel::where('id', $user_id);

        $tbl_user->delete();

        return $tbl_user;
    }

    public function ORMPosition()
    {
        return $this->hasOne(PositionModel::class, 'id','position_id');
    }

}
