<?php


namespace App\Services\Impl\Auth;


use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class AuthServiceImpl implements AuthService
{

    public function registerAdmin(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'confirmed'],
        ]);

        return User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password)
        ]);
    }

    public function resetPassword(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        if (Hash::check($request->oldPassword, $user->password))
        {
            if ($request->newPassword == $request->confirmNewPassword)
            {
                $user->password = Hash::make($request->newPassword);

                return $user;
            }
        }
    }

    public function getAll()
    {
        return User::paginate(10);
    }

    public function get($id)
    {
        return User::findOrFail($id);
    }

    public function editAdminUser(Request $request, $id)
    {
        $admin = User::findOrFail($id);


        if($request->password == $request->confirmPassword) {

            $admin->fill($request->only([
                'name',
                'email',
            ]));

            $admin->password = Hash::make($request->password);

            return $admin->save();
        }

        throw new \Exception('пароли не совподают');
    }


    public function delete($id)
    {
        $admin = User::findOrFail($id);

        $admin->delete();
    }
}
