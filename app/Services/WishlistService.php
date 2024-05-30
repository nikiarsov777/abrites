<?php

namespace App\Services;

use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class WishlistService extends BaseService
{
    public function index(Request $request, string $order = 'id'): Paginator
    {
        return Wishlist::where('user_id', auth()->user()->id)->orderBy($order)->simplePaginate(2);;
    }

    public function show(Request $request, int $id): Wishlist
    {
        return Wishlist::where('user_id', auth()->user()->id)->where('id', $id)->firstOrFail();
    }

    public function create(Request $request)
    {
        try {
            $publishedAt = $request->get('latest_release_published_at');
            $publishedAt = Carbon::parse($publishedAt)->format('d/m/Y : H:i:s');
            $wishlist = new Wishlist();
            $wishlist->user_id = auth()->user()->id;
            $wishlist->name = $request->get('name', 'Empty');
            $wishlist->description = $request->get('description', 'description');
            $wishlist->language = $request->get('language', 'language');
            $wishlist->platform = $request->get('platform', 'php');
            $wishlist->latest_release_number = $request->get('latest_release_number', 1);
            $wishlist->latest_download_url = $request->get('latest_download_url', 'test.io');
            $wishlist->latest_release_published_at = $publishedAt;
            $wishlist->rank = $request->get('rank', 0);
            $wishlist->stars = $request->get('stars', 0);

            $wishlist->save();

            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(Request $request, int $id)
    {
        //
    }


    public function delete(Request $request, int $id)
    {
        Wishlist::findOrFail($id)->delete();
    }

    public function count(): int
    {
        $wishlistCount = Wishlist::where('user_id', auth()->user()->id)->count();

        return $wishlistCount;
    }
}
