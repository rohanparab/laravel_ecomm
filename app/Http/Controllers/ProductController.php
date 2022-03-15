<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Models\products;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return products::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'title' => 'required',
        //     // 'description' => '',
        //     'price' => 'required',
        //     // 'category' => '',
        //     'discountprice' => 'required',
        //     // 'instock' => '',
        //     // 'priority' => '',
        //     // 'quantity' => '',
        //     'img' => 'required|mimes:jpg,jpeg,bmp,png|max:4096',
        // ]);

        $validator = Validator::make($request->all(), [ // <---
            'title' => 'required',
            'price' => 'required',
            'discountprice' => 'required',
            'img' => 'required|mimes:jpg,jpeg,bmp,png|max:4096'
        ]);

        if ($validator->fails()) {
            return "validation fails";
        }

        // $request->validate([
        //     'title' => 'required',
        //     'price' => 'required',
        //     'discountprice' => 'required',
        //     'img' => 'required|mimes:jpg,jpeg,bmp,png|max:4096'
        // ]);


        $imgFile = $request->file('img')->store('product_img');

        // $request->offsetSet('img', $imgFile);
        // $request["img"]  = $imgFile;

        $products = new products([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'category' => $request->get('category'),
            'discountprice' => $request->get('discountprice'),
            'instock' => $request->get('instock'),
            'priority' => $request->get('priority'),
            'quantity' => $request->get('quantity'),
            'img' => $imgFile
        ]);

        $products->save();

        return $products;
        // return products::create($request->all());
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
