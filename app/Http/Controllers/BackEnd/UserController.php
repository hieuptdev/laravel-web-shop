<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\{AddUserRequest,EditUserRequest};

class UserController extends Controller
{
    function getListUser()
    {
        $data['users'] = User::paginate(4);
        return view('backend.user.listuser', $data);
    }

    function getAddUser()
    {

        return view('backend.user.adduser');
    }

    function postAddUser(AddUserRequest $r)
    {
        $user = new User;
        $user->email = $r->email;
        $user->password = bcrypt($r->password);
        $user->full = $r->full;
        $user->address = $r->address;
        $user->phone = $r->phone;
        $user->level = $r->level;
        $user->save();
        return redirect('/admin/user')->with('thongbao', 'Đã thêm thành công!!')->with('status','success');
    }

    function getEditUser($idUser)
    {
        $data['users']=User::find($idUser);
        return view('backend.user.edituser',$data);
    }

    function postEditUser(EditUserRequest $r, $idUser)
    {
        
        $user = User::find($idUser);
        $user->email = $r->email;
        $user->password = $r->password;
        $user->full = $r->full;
        $user->address = $r->address;
        $user->phone = $r->phone;
        $user->level = $r->level;
        $user->save();
        return redirect('/admin/user')->with('thongbao', 'Đã sửa thành công!!')->with('status','success');
    }

    function delUser($idUser){
        User::destroy($idUser);
        return redirect('/admin/user')->with('thongbao', 'Đã xoá thành công!!')->with('status','danger');
    }
}
