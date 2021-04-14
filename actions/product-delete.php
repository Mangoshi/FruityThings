<?php

require_once '../config.php';
use FruityThings\Model\Product;

try {
    $rules = [
        'id' => 'present|integer|min:1'
    ];
    $request->validate($rules);
    if (!$request->is_valid()) {
        throw new Exception("Illegal Request");
    }
    $id = $request->input('id');
    $product = Product::findById($id);
    if ($product === null) {
        throw new Exception("Illegal request parameter");
    }
    $product->delete();

    $request->session()->set("flash_message", "The product was successfully deleted from the database");
    $request->session()->set("flash_message_class", "alert-info");

    $request->redirect("views/admin/home.php");

} catch (Exception $ex) {
    $request->session()->set("flash_message", $ex->getMessage());
    $request->session()->set("flash_message_class", "alert-warning");

    $request->redirect("views/admin/home.php");
}


