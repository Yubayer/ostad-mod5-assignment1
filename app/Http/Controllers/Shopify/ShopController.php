<?php

namespace App\Http\Controllers\Shopify;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index() {
        return view('shop.index');
    }
}