<?php
require_once '../config.php';

use FruityThings\Model\Cart;
use FruityThings\Model\Order;
use FruityThings\Model\OrderProduct;

try {
    $rules = [
        "customer_id" => "present",
        "date" => "present",
        "payment_method" => "present",
    ];

    $request->validate($rules);

    if (!$request->is_valid()) {
        throw new Exception("Please complete the form correctly.");
    }

    $customer_id = $request->input("customer_id");
    $date = $request->input("date");
    $payment_method = $request->input("payment_method");

    $order = new Order();
    $order->customer_id = $customer_id;
    $order->date = $date;
    $order->payment_method = $payment_method;
    $order->save();

    $cart = Cart::get($request);

    foreach ($cart->items as $item) {
        $orderProduct = new OrderProduct();
        $orderProduct->order_id = $order->id;
        $orderProduct->product_id = $item->product->id;
        $orderProduct->save();
    }

    $request->session()->set("flash_message", "Success! Your order has been made.");
    $request->session()->set("flash_message_class", "alert-info");

    $cart->empty();
    unset($_SESSION['cart']);
    $request->redirect("/views/customer/home.php");

} catch(Exception $ex) {

    $request->session()->set("flash_message", $ex->getMessage());
    $request->session()->set("flash_message_class", "alert-warning");
    $request->session()->set("flash_data", $request->all());
    $request->session()->set("flash_errors", $request->errors());
    $request->redirect("/views/cart-checkout.php");

}
?>