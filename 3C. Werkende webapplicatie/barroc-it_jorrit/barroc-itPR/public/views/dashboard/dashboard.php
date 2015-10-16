<?php
require_once '../../header.php';
?>

<?php

// de query die gedaan moet worden
$sql = "SELECT * FROM tbl_customer";

// de query wordt opgeslagen
$q = $db->query($sql);

// de data wordt opgeslagen
$customers = $q->fetchAll();

?>
<form action="../../../app/controllers/authController.php" method="POST">
    <h2 class="text-center">Dashboard</h2>
    <a href="../customers/addcustomer.php" class="btn btn-primary">Add Customer</a>
    <input type="hidden" name="type" value="logout">
    <input type="submit" value="Logout" class="btn btn-primary" style="float: right;">
    
</form>


<ul class="list-group">
    <?php foreach($customers as $customer): ?>
        <li class="list-group-item">
            <a href="<?php echo HTTP . '/../public/views/customers/customerinfo.php?id=' . $customer['id']?>"><?= $customer['companyname'] ?></a>
            <a href="<?php echo HTTP . '/../public/views/customers/editcustomer.php?id=' . $customer['id']?>">edit</a>
            <form action="<?php echo HTTP . '/../app/controllers/customercontroller.php'?>" method="post">
                <input type="hidden" name="id" value="<?php echo $customer['id'] ?>">
            </form>
            <br />
        </li>
    <?php endforeach; ?>
</ul>
