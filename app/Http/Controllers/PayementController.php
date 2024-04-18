<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payement;
use App\Notifications\OrderPaidNotification;
use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;

class PayementController extends Controller
{
    static function pay($order, $back_url)
    {
        $payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => "USD", // MAD dosn't exist in mollie
                "value" => number_format($order->total_amount , 2, '.', '') // You must send the correct number of decimals, thus we enforce the use of number_format
            ],
            "description" => "Order #{$order->id}",
            "redirectUrl" => route('success'),
        ]);

        session()->put('paymentId', $payment->id);

        $payment = Mollie::api()->payments->get($payment->id);

        session()->put('orderId', $order->id);
        session()->put('back_url', $back_url);

        return redirect($payment->getCheckoutUrl(), 303);
    }

    public function success(Request $request)
    {
        $paymentId = session()->get('paymentId');
        session()->forget('paymentId');
        $back_url = session()->get('back_url');
        session()->forget('back_url');
        $payment = Mollie::api()->payments->get($paymentId);
        if ($payment->isPaid()) {
            $orderId = session()->get('orderId');
            session()->forget('orderId');
            $order = Order::find($orderId);

            $obj = new Payement();
            $obj->payment_id = $paymentId;
            $obj->description = $payment->description;
            $obj->amount = $payment->amount->value;
            $obj->currency = $payment->amount->currency;
            $obj->payment_status = "completed";
            $obj->payment_method = "Mollie";
            $obj->order_id = $orderId;
            $obj->save();

            $order->update(["status" => "paid"]);
            // descount order products quantities
            foreach ($order->products as $product) {
                $product->quantity -= $product->pivot->units;
                $product->save();
            }
            // notify the user
            $order->user->notify(new OrderPaidNotification($order));
            session()->forget('cart');
            return redirect($back_url)->with("success", "Your payement is done with success");
        } else {
            return redirect()->route('cancel');
        }
    }

    public function cancel()
    {
        echo "Payment is cancelled. !!!!!";
    }
}
