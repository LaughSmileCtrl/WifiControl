<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreOrderPost;
use App\Models\Foods;
use App\Models\Orders;
use ArrayObject;

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
        $foods = Foods::where('is_available', true)->get();
        return view('order.food-menu', ['foods' => $foods]);
    }

    // Order some menu
    public function storeFood(Request $request)
    {
        // Get order where id like session order_id
        $foodOrder = Orders::find($request->session()->get('order_id'));

        // Copy food request
        $foodsRequest = new ArrayObject($request->foods);

        // Check Availabelity of food ->> not finish
        $foodsId = array_keys($request->foods);

        $foods = Foods::whereIn('id', $foodsId)->get();

        foreach($foods as $food)
        {
            if($food->stock >= $foodsRequest[$food->id]['total'] && $food->is_available == TRUE)
            {
                $food->stock = $food->stock - $foodsRequest[$food->id]['total'];
                $food->save();
                $foodsReady[$food->id] = $foodsRequest[$food->id];
            }
            else if ($food->stock == NULL && $food->is_available == TRUE) 
            {
                $foodsReady[$food->id] = $foodsRequest[$food->id];
            }
        }

        // To save order foods
        $foodOrder->foods()->attach($foodsReady);

        return view('order.checkout', ['foodOrder' => $foodOrder->foods]);
    }

    public function deleteSession(Request $request)
    {
        echo $request->session()->get('order_id');

        // Destroy session
        $request->session()->flush();
    }
    

    
}
