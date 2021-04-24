<?php require_once '../config.php'; ?>
<?php

if ($request->is_logged_in()) {
    $role = $request->session()->get("role");
    if($role !== "customer") {
        $request->redirect("/views/".$role."/home.php");
    }
}

use FruityThings\Model\Cart;

try {

    $cart = Cart::get($request);

    $cart->empty();
    unset($_SESSION['cart']);

    $request->session()->set("flash_message", "Cart cleared.");
    $request->session()->set("flash_message_class", "alert-info");

    $request->redirect("views/cart-view.php");

    } catch (Exception $ex) {
    $request->session()->set("flash_message", $ex->getMessage());
    $request->session()->set("flash_message_class", "alert-warning");

    $request->redirect("/");
}
?>