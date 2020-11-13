<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreOrderPost;
use App\Models\Foods;
use App\Models\Orders;

class OrderController extends Controller
{
    // Show home page
    public function home()
    {
        return view('order.home');
    }

    // Create Order name
    public function storeName(StoreOrderPost $request)
    {
        // Save order name to orders table
        $order = new Orders();
        $order->name = $request->name;
        $order->save();

        // Create order_id session
        $request->session()->put('order_id', $order['id']);
        
        // redirect to route /food-order
        return redirect('/food-order');
    }

    // Show menus
    public function foodOrder(Request $request)
    {
        // Get order_id
        $id = $request->session()->get('order_id');
        
        // check order id, if empty back to home page
        if(empty($id))
        {
            return redirect('/');
        }

        // Get all food/drink menus
        $foods = Foods::all();
        return view('order.food-menu', ['foods' => $foods]);
    }

    // Order some menu
    public function storeFood(Request $request)
    {
        // Get order where id like session order_id
        $foodOrder = Orders::find($request->session()->get('order_id'));

        // To save order foods
        $foodOrder->foods()->attach($request->food);

        return view('order.checkout', ['foodOrder' => $foodOrder->foods]);
    }

    public function deleteSession(Request $request)
    {
        echo $request->session()->get('order_id');

        // Destroy session
        $request->session()->flush();
    }
    

    
}
