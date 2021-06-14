<?php


namespace App\Http\Controllers;


use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends WebBaseController
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function index()
    {
        $admins = $this->authService->getAll();

        return view('auth.admin-users', ['admins' => $admins]);
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        $this->authService->registerAdmin($request);

        $this->added();

        return redirect()->route('admins');
    }

    public function edit($id)
    {
        $admin = $this->authService->get($id);

        return view('auth.edit-admin', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->authService->editAdminUser($request, $id);

            $this->edited();

            return redirect()->route('admins');
        } catch (\Exception $e) {
            return Redirect::back()->withErrors($e->getMessage());
        }
    }

    public function destroy($id)
    {
        $this->authService->delete($id);

        $this->deleted();

        return redirect()->route('admins');
    }
}
