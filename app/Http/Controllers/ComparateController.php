<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ComparateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $checklist = collect($request->input('checklist'))->pluck('name');
        $products = Product::whereIn('name', $checklist)
        ->get()
        ->groupBy('supermarket_id')
        ->map(function ($item, $key) {
            return $item->mapToGroups(function ($item, $key) {
                return ['products' => $item];
            });
        })
        ->map(function ($item, $key) use ($checklist) {
            $item->put('doesntHave', $checklist->diff( $item->get('products')->pluck('name')->toArray() ));
            $item->put('doesntHaveCount', count($checklist->diff( $item->get('products')->pluck('name')->toArray()) ));
            $item->put('total', $item->get('products')->sum('price'));
            $item->put('supermarket', $item->get('products')->get('0')->supermarket);
            return $item;
        })
        ->sortBy('total'); // doesntHaveCount, total

        return response()->json([
            'products' => $products->values()->all()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
