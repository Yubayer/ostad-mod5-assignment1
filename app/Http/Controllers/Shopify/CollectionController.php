<?php

namespace App\Http\Controllers\Shopify;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class CollectionController extends Controller
{
    public function index(Request $request) {
        $shopAccess = $request->user();

        $query = <<<QUERY
            query {
                collections(first: 30) {
                edges {
                    node {
                    id
                    title
                    handle
                    updatedAt
                    productsCount
                    sortOrder
                    }
                }
                }
            }
            QUERY;

        $response = $shopAccess->api()->graph($query);
        $collections = $response['body']['data']['collections']['edges'];
        
        return view('collection.index', compact('collections'));
    }

    public function create() {
        return view('collection.create');
    }

    public function store(Request $request) {
        $shop = $request->user();
        $query = <<<QUERY
                mutation createCollection {
                    collectionCreate(input: {descriptionHtml: "$request->description", title: "$request->title"}) {
                    collection {
                        descriptionHtml
                        title
                    }
                    }
                }
            QUERY;

            $response = $shop->api()->graph($query);
            $collection = $response['body']['data'];
            // dd($collection);
            
            // return Redirect::away(URL::shopifyRoute('collection.index'));
            $redirectUrl = getRedirectRoute('collection.index');
            return redirect($redirectUrl);
    }

    public function delete(Request $request) {
        $shop = $request->user();
        $query = <<<QUERY
                mutation MyMutation {
                    collectionDelete(input: {id: "$request->id"}) {
                    deletedCollectionId
                    userErrors {
                        field
                        message
                    }
                    }
                }
            QUERY;

            $response = $shop->api()->graph($query);
            $collection = $response['body']['data'];
            // dd($collection);

            $redirectUrl = getRedirectRoute('collection.index');
            return redirect($redirectUrl);
    }

    public function edit(Request $request, $id) {
        $shop = $request->user();

        $findCollection = $shop->api()->rest('GET', '/admin/api/2023-10/collections/'.$id.'.json');
        $collection = $findCollection['body']['collection'];

        return view('collection.edit', compact('collection'));
    }

    public function update(Request $request) {
        $shop = $request->user();
        $query = <<<QUERY
                mutation MyMutation {
                    collectionUpdate(input: {title: "$request->title", descriptionHtml: "$request->description", id: "$request->id"}) 
                    {
                        collection {
                            descriptionHtml
                            title
                        }
                    }
                }
            QUERY;

            $response = $shop->api()->graph($query);
            $collection = $response['body']['data'];
            // dd($collection);

            $redirectUrl = getRedirectRoute('collection.index');
            return redirect($redirectUrl);
        dd($gid);
    }
}
