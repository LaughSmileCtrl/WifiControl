<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foods;
use App\Http\Resources\Food as FoodResource;

class FoodApiController extends Controller
{
    public function getMenu($type)
    {
        return FoodResource::collection(Foods::where('type', $type)->get());

    }

    public function foodDetail($id)
    {
        return FoodResource::collection(Foods::where('id', $id)->get());
    }

    public function storeMenu(Request $request)
    {
       $food = new Foods();
       $food->name = $request->name;
       $food->type = $request->type;
       $food->price = $request->price;
       $food->save;

       return response()->json([
           "message" => "succes",
           "data" => $food,
       ]);
    }
}
