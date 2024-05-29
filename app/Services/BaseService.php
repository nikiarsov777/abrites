<?php

namespace App\Services;

use Illuminate\Http\Request;

abstract class BaseService
{
    public function index(Request $request)
    {
    }
    public function show(Request $request, int $id)
    {
    }
    public function create(Request $request)
    {
    }
    public function update(Request $request, int $id)
    {
    }
    public function delete(Request $request, int $id)
    {
    }

    protected function call(string $path = '', array $params, int $post = 0)
    {
        $url = env('LIBRARIESIO_URL') . '/api' . $path . '?';
        $url .= 'api_key=' . env('LIBRARIESIO_API_KEY') . '&';
        $strData = '';
        if (!empty($params)) {
            if (!$post) {
                $url .= http_build_query($params);
            } else {
                $strData .= http_build_query($params);
            }
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, $post);

        if (!empty($params) && $post) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $strData);
        }
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        $response = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($response, true);

        return $response;
    }
}
