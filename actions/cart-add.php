<?php require_once '../config.php'; ?>
<?php

if ($request->is_logged_in()) {
    $role = $request->session()->get("role");
    if($role !== "customer") {
        $request->redirect("/views/".$role."/home.php");
    }
}

use FruityThings\Model\Cart;
use FruityThings\Model\Product;

try {
    $rules = [
        "id" => "present|integer"
    ];

    $request->validate($rules);
    if (!$request->is_valid()){
        throw new Exception("Something went wrong! (Validation request failed)");
    }

    $id = intval($request->input("id"));

    $product = Product::findById($id);
    if ($product === null){
        throw new Exception("Something went wrong! (Product null)");
    }

    $cart = Cart::get($request);
    $cart->add($product, 1);

    $request->session()->set("flash_message", "A copy of '".$product->title."' was added to your cart.");
    $request->session()->set("flash_message_class", "alert-info");

    $request->redirect("views/cart-view.php");

    } catch (Exception $ex) {
    $request->session()->set("flash_message", $ex->getMessage());
    $request->session()->set("flash_message_class", "alert-warning");

    $request->redirect("/");
}
?>