<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function index(Request $request)
    {}
    public function show(Request $request, int $id){}
    public function create(Request $request){}
    public function update(Request $request, int $id){}
    public function delete(Request $request, int $id){}

    public function login(Request $request)
    {
        return view('login');
    }
}
