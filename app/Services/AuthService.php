<?php


namespace App\Services;



use Illuminate\Http\Request;

interface AuthService
{
    public function registerAdmin(Request $request);
    public function resetPassword(Request $request);
    public function getAll();
    public function get($id);
    public function editAdminUser(Request $request,$id);
    public function delete($id);
}
