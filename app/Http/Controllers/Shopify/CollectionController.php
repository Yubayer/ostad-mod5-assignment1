<?php

namespace App\Http\Controllers\Shopify;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $query = <<<QUERY
            mutation CollectionCreate($input: CollectionInput!) {
                collectionCreate(input: $input) {
                userErrors {
                    field
                    message
                }
                collection {
                    id
                    title
                    descriptionHtml
                    handle
                    sortOrder
                    ruleSet {
                    appliedDisjunctively
                    rules {
                        column
                        relation
                        condition
                    }
                    }
                }
                }
            }
            QUERY;

            $variables = [
                "input" => [
                    "title" => "Our entire shoe collection",
                    "descriptionHtml" => "View <b>every</b> shoe available in our store.",
                    "ruleSet" => [
                    "appliedDisjunctively" => false,
                    "rules" => [
                        "column" => "TITLE",
                        "relation" => "CONTAINS",
                        "condition" => "shoe",
                    ],
                    ],
                ],
            ];
        return view('collection.index');
    }
}
