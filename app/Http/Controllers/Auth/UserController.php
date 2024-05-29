<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function index(Request $request)
    {
        $userService = new UserService();
        
        $order = $request->get('order', 'id');

        $attr = [
            'title' => 'Users',
            'page' => 'auth.users.list',
            'users' => $userService->index($request, $order),
            'sub_page' => '',
        ];


        return view('auth.dashboard', $attr);
    }
    public function show(Request $request, int $id)
    {
        $userService = new UserService();
        $attr = [
            'title' => 'Users',
            'page' => 'auth.users.show',
            'user' => $userService->show($request, $id),
            'sub_page' => '',
        ];


        return view('auth.dashboard', $attr);
    }
    public function create(Request $request)
    {
    }
    public function update(Request $request, int $id)
    {
       $form = $request->get('form', 'config');

        $userService = new UserService();
        $userService->update($request, $id);
        return redirect()->route($form, $id)->with('success', 'User successfully updated!');
    }
    public function delete(Request $request, int $id)
    {
        $userService = new UserService();
        $userService->delete($request, $id);


        return redirect()->route('user_list');
    }

    public function config(Request $request)
    {
        $attr = [
            'title' => 'Config',
            'page' => 'auth.config',
            'sub_page' => 'auth.register',
            'user' => auth()->user()
        ];


        return view('auth.dashboard', $attr);
    }

    public function catalog()
    {
        $attr = [
            'title' => 'Catalog',
            'page' => 'auth.catalog',
            'sub_page' => ''
        ];
        return view('auth.dashboard', $attr);
    }
}
