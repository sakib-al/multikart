<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Model\Role;
use App\Model\RoleUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function __construct(User $user, Role $roles, RoleUser $user_role)
    {
        $this->role = $roles;
        $this->role_user = $user_role;
    }

    public function index()
    {
        $user = User::select('users.*','roles.name as role_name')->join('role_user', 'role_user.user_id','users.id')->join('roles', 'roles.id','role_user.role_id')->get();
        return view('back-end.user.index')->withUser($user);
    }

    public function create()
    {
        $roles   =  $this->role->getRoleCombo();
        return view('back-end.user.create')->withRole($roles);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try{
            $user        = new User;
            $user_role   = new RoleUser;
            $user->name  = $request->user_name;
            $user->email = $request->user_email;

            if (!empty($request->input('user_pass'))){
                $user->password = Hash::make($request->user_pass);
            }
            $user->user_status  = $request->user_status;

            if ($request->file('images')) {

                $file_name = 'users' . date('dmY') . '_' . uniqid() . '.' . $request->file('images')[0]->getClientOriginalExtension();
                $user->user_image = $file_name;
                $request->file('images')[0]->move(public_path() . '/images/users', $file_name);
            }
            $user->save();

            $user_role->user_id = $user->id;
            $user_role->role_id = $request->user_roles;
            $user_role->save();

        }catch (\Exception $e) {
            DB::rollback();
            echo '<pre>';
            echo '======================<br>';
            print_r($e->getMessage());
            echo '<br>======================';
            exit();
        }

        DB::commit();

        Toastr::success('User Create Succesfully', 'Create', ["positionClass" => "toast-top-right"]);
        return redirect()->route('user.index');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $image  = public_path(). '/images/users/'. $user->user_image;

        if(file_exists($image) && $user->user_image)
        {

            unlink($image);
            $user->delete();
            Toastr::error('User Delete Succesfully', 'Delete', ["positionClass" => "toast-top-right"]);
            return redirect()->route('user.index');
        }
        else{

            $user->delete();
            return redirect()->route('user.index');
        }

        Toastr::error('User Delete Succesfully', 'Delete', ["positionClass" => "toast-top-right"]);
        return redirect()->route('user.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $user_role = RoleUser::join('roles', 'roles.id','role_user.role_id')->where('role_user.user_id', $id)->first();
        $roles   =  $this->role->getRoleCombo();
        return view('back-end.user.edit')->withUser($user)->withRole($roles)->withRolesid($user_role);

    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try{

            $user = User::find($id);
            $user->name = $request->user_name;
            $user->email = $request->user_email;
            $user->user_status = $request->user_status;
            if (!empty($request->input('user_pass'))){
                $user->password = Hash::make($request->user_pass);
            }


            if ($request->file('images')) {

                $file_name = 'users' . date('dmY') . '_' . uniqid() . '.' . $request->file('images')[0]->getClientOriginalExtension();
                $user->user_image = $file_name;
                $request->file('images')[0]->move(public_path() . '/images/users', $file_name);
            }

            $user->save();


            $user_role = RoleUser::where('role_user.user_id', $id)->first();
            $user_role->role_id = $request->user_roles;
            $user_role->save();

        } catch (\Exception $e) {
            DB::rollback();
            echo '<pre>';
            echo '======================<br>';
            print_r($e->getMessage());
            echo '<br>======================';
            exit();
        }

        DB::commit();

        Toastr::success('User Update Succesfully', 'Update', ["positionClass" => "toast-top-right"]);
        return redirect()->route('user.index');
    }

}
