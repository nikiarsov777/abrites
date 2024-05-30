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
        $wishlistService = new WishlistService();
        if (!$wishlistService->create($request)){
            return response()->json([
                'status' => 'Error',
                'code' => 400,
            ]);
        }

        return response()->json([
            'status' => 'OK',
            'code' => 200,
        ]);
    }
    public function update(Request $request, int $id)
    {
        //
    }
    public function delete(Request $request, int $id)
    {
        //
    }

    public function count()
    {
        $wishlistService = new WishlistService();

        return $wishlistService->count();
    }
}
