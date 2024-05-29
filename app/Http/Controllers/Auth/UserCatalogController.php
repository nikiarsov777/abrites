<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use App\Services\CatalogService;
use Illuminate\Http\Request;

class UserCatalogController extends BaseController
{
    public function index(Request $request)
    {
        $catalogService = new CatalogService();

        return $catalogService->index($request);
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
