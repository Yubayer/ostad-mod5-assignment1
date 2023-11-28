<?php

namespace App\Http\Controllers\Shopify;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index() {
        return view('collection.index');
    }

    public function create() {
        return view('collection.create');
    }

    public function store(Request $request) {
        return view('collection.index');
    }
}
