<?php
use FruityThings\Model\Order;

$orders = Order::findAll();
$numOrders = count($orders);
$pageSize = 10;
$numPages = ceil($numOrders / $pageSize);
?>
<table class="table" id="table-orders">
    <thead>
    <tr>
        <th>Id</th>
        <th>Date</th>
        <th>Payment Method</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($orders as $order) { ?>
        <tr class="d-none">
            <td><?= $order->id ?></td>
            <td><?= $order->date ?></td>
            <td><?= $order->payment_method ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<nav id="nav-orders">
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