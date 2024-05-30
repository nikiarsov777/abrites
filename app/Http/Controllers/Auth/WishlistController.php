<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use App\Services\WishlistService;
use Illuminate\Http\Request;

class WishlistController extends BaseController
{
    public function index(Request $request)
    {
        $order = $request->get('order', 'id');
        $wishlistService = new WishlistService();

        $whislists = $wishlistService->index($request, $order);

        $attr = [
            'title' => 'Users',
            'page' => 'auth.wishlists.list',
            'sub_page' => '',
            'wishlists' => $whislists
        ];


        return view('auth.dashboard', $attr);
    }

    public function show(Request $request, int $id)
    {
        //
    }

    public function create(Request $request)
    {
        $wishlistService = new WishlistService();
        if (!$wishlistService->create($request)) {
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
        $wishlistService = new WishlistService();
        $wishlistService->delete($request, $id);


        return redirect()->route('wishlist_index');
    }

    public function edit(Request $request, int $id)
    {
        $wishlistService = new WishlistService();

        $attr = [
            'title' => 'Wishlists',
            'page' => 'auth.wishlists.show',
            'sub_page' => '',
            'wishlist' => $wishlistService->show($request, $id)
        ];


        return view('auth.dashboard', $attr);
    }

    public function count()
    {
        $wishlistService = new WishlistService();

        return $wishlistService->count();
    }
}
