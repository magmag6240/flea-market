<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Stripe\Stripe;
use Stripe\Charge;

class StripePaymentsController extends Controller
{
    public function store($item_id)
    {
        $item_data = Item::where('id', $item_id)->first();
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $charge = Charge::create(array(
            'amount' => $item_data->price,
            'currency' => 'jpy',
            'source' => request()->stripeToken,
        ));
        return view('mypage');
    }
}
