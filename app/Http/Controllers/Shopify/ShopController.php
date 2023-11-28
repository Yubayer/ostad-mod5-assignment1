<?php

namespace App\Http\Controllers\Shopify;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request) {
        $shopAccess = $request->user();
        $response = $shopAccess->api()->rest('GET', '/admin/api/2023-10/shop.json');
        $shop = $response['body']['shop'];
        return view('shop.index', compact('shop'));
    }
}
