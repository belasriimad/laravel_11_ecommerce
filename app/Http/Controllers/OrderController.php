<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use ErrorException;
use App\Models\Order;
use App\Models\Photo;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;

class OrderController extends Controller
{
    public function payByStripe(Photo $photo)
    {
        //provide the stripe key
        Stripe::setApiKey(env('STRIPE_KEY'));

        //add photo to session
        session()->put('photo', $photo);

        try {
            $checkout_session = Session::create([
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'Laravel Stock Images'
                        ],
                        'unit_amount' => $photo->price * 100,
                    ],
                    'quantity' => 1
                ]],
                'mode' => 'payment',
                'success_url' => 'http://127.0.0.1:8000/pay/success'
            ]);
            return redirect($checkout_session->url);
        } catch (ErrorException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function success()
    {
        $photo = session()->get('photo');
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'total' => $photo->price
        ]);
        $photo->orders()->sync($order);
        session()->remove('photo');
        return redirect()->route('photos.show', $photo->id)->with([
            'success' => 'Payment placed successfully'
        ]);
    }
}
