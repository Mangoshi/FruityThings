<?php
require_once '../config.php';

use FruityThings\Http\FileUpload;
use FruityThings\Model\Image;
use FruityThings\Model\Product;

try {
    $rules = [
        "title" => "present|minlength:2|maxlength:50",
        "description" => "present|minlength:5|maxlength:512",
        "price" => "present|minlength:1|maxlength:32",
        "age_rating" => "present",
        "average_rating" => "present",
        "release_date" => "present",
        "developer" => "present|minlength:3|maxlength:40",
        "publisher" => "present|minlength:3|maxlength:40",
        "genre_id" => "present",
    ];

    $request->validate($rules);
    if ($request->is_valid()) {
        $file = new FileUpload("product_image");
        $file_path = $file->get();
        $image = new Image();
        $image->filename = $file_path;
        $image->save();

        $product = new Product();
        $product->title = $request->input("title");
        $product->description = $request->input("description");
        $product->price = $request->input("price");
        $product->age_rating = $request->input("age_rating");
        $product->average_rating = $request->input("average_rating");
        $product->release_date = $request->input("release_date");

        // Forcing checkbox to return values compatible with database depending on whether checked or not:
        $on_windows = isset($_POST['on_windows']) ? 1 : 0;
        $on_linux = isset($_POST['on_linux']) ? 1 : 0;
        $on_mac = isset($_POST['on_mac']) ? 1 : 0;

        $product->on_windows = $on_windows;
        $product->on_linux = $on_linux;
        $product->on_mac = $on_mac;
        $product->developer = $request->input("developer");
        $product->publisher = $request->input("publisher");
        $product->genre_id = $request->input("genre_id");
        $product->image_id = $image->id;
        $product->save();

        $request->session()->set("flash_message", "The product was successfully added to the database");
        $request->session()->set("flash_message_class", "alert-info");
        $request->session()->forget("flash_data");
        $request->session()->forget("flash_errors");

        $request->redirect("views/admin/home.php");
    } else {
        $request->session()->set("flash_data", $request->all());
        $request->session()->set("flash_errors", $request->errors());

        $request->redirect("views/admin/product-create.php");
    }
} catch (Exception $ex) {
    $request->session()->set("flash_message", $ex->getMessage());
    $request->session()->set("flash_message_class", "alert-warning");
    $request->session()->set("flash_data", $request->all());
    $request->session()->set("flash_errors", $request->errors());

    $request->redirect("views/admin/product-create.php");
}