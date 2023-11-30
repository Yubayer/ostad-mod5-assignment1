<?php

namespace App\Http\Controllers\Shopify;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use URL;

class ProductController extends Controller
{
    public function index(Request $request) {
        $shop = $request->user();
        $response = $shop->api()->rest('GET', '/admin/api/2023-10/products.json');
        $products =  $response['body']['products'];
        return view('product.index', compact('products'));
    }

    public function create(Request $request) {
        return view('product.create');
    }

    public function store(Request $request) {
        $shop = $request->user();

        $query = <<<QUERY
            mutation createProduct {
                productCreate(input: {title: "$request->title", descriptionHtml: "$request->description"}) {
                    product {
                        id
                        title
                        descriptionHtml
                    }
                }
            }
        QUERY;

        $response = $shop->api()->graph($query);
        $product = $response['body']['data']['productCreate']['product'];

        return redirect(getRedirectRoute('product.index'));
    }

    public function edit(Request $request, $id) {
        $shop = $request->user();
        $response = $shop->api()->rest('GET', '/admin/api/2023-10/products/'.$id.'.json');
        $product =  $response['body']['product'];
        return view('product.edit', compact('product'));
    }

    public function update(Request $request) {
        $shop = $request->user();

        $query = <<<QUERY
            mutation updateProduct {
                productUpdate(input: {id: "$request->id", title: "$request->title", descriptionHtml: "$request->description"}) {
                    product {
                        id
                        title
                        descriptionHtml
                    }
                }
            }
        QUERY;

        $response = $shop->api()->graph($query);
        // $product = $response['body']['data']['productUpdate']['product'];

        return redirect(getRedirectRoute('product.index'));
    }

    public function delete(Request $request) {
        $shop = $request->user();

        $query = <<<QUERY
            mutation deleteProduct {
                productDelete(input: {id: "$request->id"}) {
                    deletedProductId
                }
            }
        QUERY;

        $response = $shop->api()->graph($query);
        // $product = $response['body']['data']['productUpdate']['product'];

        return redirect(getRedirectRoute('product.index'));
    }
}
