<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Order;

class CartController extends Controller
{
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    //api
    public function addToCart(Request $request)
    {
        $data = $request->except('_token');

        $validators = Validator::make($data, [
            'product_id'    => 'required',
            'user_id'       => 'required',
            'quantity'      => 'required|integer|min:1',
            'total'         => 'required|integer',
            'size'          => 'required',
            'is_checkout'   => 'required'
        ]);

        if($validators->fails()){
            return response()->json([
                'success'   => false,
                'data'      => [],
                'message'   => $validators->errors()->all()
            ], 400);
        }

        $store = $this->order->create($data);

        if($store) {
            return response()->json([
                'success'   => true,
                'data'      => $store,
                'message'   => 'Successfully add to cart'
            ], 200);
        }

        return response()->json([
            'success'   => false,
            'data'      => [],
            'message'   => 'Failed add to cart'
        ], 400);
    }
}
