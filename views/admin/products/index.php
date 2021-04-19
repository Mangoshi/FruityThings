<?php
use FruityThings\Model\Product;
use FruityThings\Model\Genre;

$products = Product::findAll();
$numProducts = count($products);
$pageSize = 10;
$numPages = ceil($numProducts / $pageSize);
?>
<table class="table" id="table-products">
    <thead>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Price</th>
        <th>Category</th>
        <th>UPDATE</th>
        <th>DELETE</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $product) { ?>
        <tr class="d-none">
            <td><?= $product->id ?></td>
            <td><?= $product->title ?></td>
            <td><?= $product->price ?></td>
            <td><?= Genre::findById($product->genre_id)->name ?></td>
            <td class="text-center"><a href="<?= APP_URL ?>/views/admin/product-update-form.php?id=<?=$product->id?>">❓<a></td>
            <td class="text-center"><a href="<?= APP_URL ?>/actions/product-delete.php?id=<?=$product->id?>">❌</a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<ul class="pagination justify-content-center" style="font-size: 1.5rem">
    <li><a href="<?= APP_URL ?>views/admin/product-create-form.php">Add Product</a></li>
</ul>
<nav id="nav-products">
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <a class="page-link" href="#" data-page="previous">
                &laquo;
            </a>
        </li>
        <?php for ($i = 0; $i < $numPages; $i++) { ?>
            <li class="page-item">
                <a class="page-link" href="#" data-page="<?= $i + 1 ?>">
                    <?= $i + 1 ?>
                </a>
            </li>
        <?php } ?>
        <li class="page-item">
            <a class="page-link" href="#" data-page="next">
                &raquo;
            </a>
        </li>
    </ul>
</nav>