<?php
require_once '../../header.php';
?>
<style>
    .limit {
        color: red;
        pointer-events: none;
    }
    .nolimit {
        color: black;
        pointer-events: auto;
    }

    .nobkr {
        color: #ed9c28;
    }
</style>

<?php

// de query die gedaan moet worden
$sql = "SELECT * FROM tbl_customer";

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
    <h2 class="text-center subhead">Dashboard</h2>
    <a href="../customers/addcustomer.php" class="btn btn-primary">Add Customer</a>
    <input type="hidden" name="type" value="logout">
    <input type="submit" value="Logout" class="btn btn-primary" style="float: right;">
    
</form>
<?php
if(in_array("Sales",$_SESSION['user']) || in_array("Finance",$_SESSION['user']) || in_array("Admin",$_SESSION['user'])) { ?>
<ul class="list-group">
    <? foreach($customers as $customer){
        $arrears = 0;
        $limit = 0;
        $id = $customer['id'];
        $sql = "SELECT *
                FROM tbl_projects
                WHERE customer_id = :id";
        $q = $db->prepare($sql);
        $q->BindParam(':id', $id);
        $q->execute();
        $projects = $q->fetchAll(PDO::FETCH_ASSOC);



            foreach($projects as $project) {
                $arrears = 0;
                $limit = 0;
                $projectid = $project['id'];
                $sql = "SELECT *
                FROM tbl_invoices
                WHERE projects_id = :id";
                $q = $db->prepare($sql);
                $q->BindParam(':id', $projectid);
                $q->execute();
                $invoices = $q->fetchAll(PDO::FETCH_ASSOC);
                $limit = $project['limiten'];
                foreach($invoices as $invoice) {

                    if($invoice['paid'] == 0) {

                        $arrears = $arrears + $invoice['total_price'];

                    }
                }
            }
    ?>
    <li class="list-group-item">
    <a href="<?php echo  '../customers/customerinfo.php?id=' . $customer['id']?>"
       class="
       <?php
       if(!in_array("Finance",$_SESSION['user'])) {
           if($arrears > $limit) {
               echo 'limit';
           } else {
               echo 'nolimit';
           } } else if(in_array("Finance",$_SESSION['user'])) {
                if($customer['bkrcheck'] == 0) {
                    echo 'nobkr';
                }
       } ?>"><?= $customer['companyname'] ?></a>
    <a href="<?php echo  '../customers/editcustomer.php?id=' . $customer['id']?>">edit</a>
        <form action="<?php echo  '../../../app/controllers/customercontroller.php'?>" method="post">
            <input type="hidden" name="id" value="<?php echo $customer['id'] ?>">
        </form>
        <br />
    </li>
           <?php }
            ?>


            >
    <?

    } ?>
</ul>
    <?php
    if(in_array("Development",$_SESSION['user'])) {
?>
<ul class="list-group">
    <?php foreach($customers as $customer): ?>
        <li class="list-group-item">
            <a href="<?php echo  '../project/viewprojects.php?id=' . $customer['id']?>"><?= $customer['companyname'] ?></a>
            <form action="<?php echo  '../../../app/controllers/projectController.php'?>" method="post">
                <input type="hidden" name="id" value="<?php echo $customer['id'] ?>">
            </form>
            <br />
        </li>
    <?php endforeach; ?>
</ul>
<?php } ?>

