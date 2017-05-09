<?php

namespace App\Http\Controllers;

use App\Order;
use App\Client;
use App\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			return response()->json(Order::all()->load('client', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
				$data = $request->all();

				//Saves the client
				$client = Client::find($data['client']['id']);
				if(is_null($client)){
					$client = new Client();
				}
				$client->id = $data['client']['id'];
				$client->name = $data['client']['name'];
				$client->save();

				//Saves the list of products
				$products_saved = [];
				foreach($data['products'] as $p){
					$product = Product::find($p['id']);
					if(is_null($product)){
						$product = new Product();
					}
					$product->id = $p['id'];
					$product->name = $p['name'];
					$product->save();
					$products_saved[] = $product;
				}

				//Saves the order itself
				//for this example every order is new to the database, there is no validation here
				//like it has for products and class_implements
				$order = new Order();
				$order->clients_id = $client->id;
				$order->save();

				$insertedOrder = Order::find($order->id);
				foreach($products_saved as $product_saved){ //saves every product from this order
					$insertedOrder->products()->attach($product_saved->id);
				}

				return response()->json(['status' => 'ok']);

				//TODO validate some insertion error and may return err and msg via JSON
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
