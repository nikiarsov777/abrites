<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use App\Services\WishlistService;
use Illuminate\Http\Request;

class WishlistController extends BaseController
{
    public function index(Request $request)
    {
        $wishlistService = new WishlistService();

        return $wishlistService->index($request);
    }
    public function show(Request $request, int $id)
    {
        //
    }
    public function create(Request $request)
    {
        //
    }
    public function update(Request $request, int $id)
    {
        //
    }
    public function delete(Request $request, int $id)
    {
        //
    }
}
