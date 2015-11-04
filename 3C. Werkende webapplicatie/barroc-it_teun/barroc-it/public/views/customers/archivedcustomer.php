<?php
require_once '../../header.php';
?>

<?php

// de query die gedaan moet worden
$sql = "SELECT * FROM tbl_customer WHERE archived_at != 0";

// de query wordt opgeslagen
$q = $db->query($sql);

// de data wordt opgeslagen
$customers = $q->fetchAll();

?>
<form action="../../../app/controllers/authController.php" method="POST">
    <div class="message">
        <?php
        if($messageBag->hasMsg()){
            echo $messageBag->show();
        }
        ?>
    </div>
    <h2 class="text-center">Dashboard</h2>
    <a href="../customers/addcustomer.php" class="btn btn-primary">Add Customer</a>
    <input type="hidden" name="type" value="logout">
    <input type="submit" value="Logout" class="btn btn-primary" style="float: right;">

</form>


<ul class="list-group">
    <?php foreach($customers as $customer): ?>
        <li class="list-group-item">
            <a href="<?php echo  '../customers/customerinfo.php?id=' . $customer['id']?>"><?= $customer['companyname'] ?></a>
            <?php
            if(in_array("Sales",$_SESSION['user']) || in_array("Finance",$_SESSION['user']) || in_array("Admin",$_SESSION['user'])) { ?>
                <a href="<?php echo  '../customers/editcustomer.php?id=' . $customer['id']?>">edit</a>
                <?php
            }
            ?>

            <form action="<?php echo  '../../../app/controllers/customercontroller.php'?>" method="post">
                <input type="hidden" name="id" value="<?php echo $customer['id'] ?>">
            </form>

            <form action="<?php echo '../../../app/controllers/customercontroller.php'?>" METHOD="POST">
                <input type="hidden" name="type" value="dearchive">
                <input type="hidden" name="id" value="<?= $customer['id'] ?>"/>
                <input type="submit" value="Dearchive">
            </form>
            <br />
        </li>
    <?php endforeach; ?>
</ul>
