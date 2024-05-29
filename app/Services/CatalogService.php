<?php

namespace App\Services;

use Illuminate\Http\Request;


class CatalogService extends BaseService
{
    public function index(Request $request, string $order = 'id')
    {
        $params = $request->only('sort', 'q', 'per_page');

        $libApiCall = $this->call('/search', $params, 0);

        return $libApiCall;
    }

    public function show(Request $request, int $id)
    {
        //
    }

    public function create(Request $request, bool $verified=false)
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
