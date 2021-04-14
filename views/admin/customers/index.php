<?php
use FruityThings\Model\Customer;
use FruityThings\Model\User;

$customers = Customer::findAll();
$numCustomers = count($customers);
$pageSize = 10;
$numPages = ceil($numCustomers / $pageSize);
?>
<table class="table" id="table-customers">
    <thead>
    <tr>
        <th>Email</th>
        <th>Name</th>
        <th>Address</th>
        <th>Phone</th>
        <th>UPDATE</th>
        <th>DELETE</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($customers as $customer) { ?>
        <tr class="d-none">
            <td><?= User::findById($customer->user_id)->email ?></td>
            <td><?= User::findById($customer->user_id)->name ?></td>
            <td><?= $customer->address ?></td>
            <td><?= $customer->phone ?></td>
            <td class="text-center"><a href="#">❓<a></td>
            <td class="text-center"><a href="#">❌</a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<nav id="nav-customers">
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