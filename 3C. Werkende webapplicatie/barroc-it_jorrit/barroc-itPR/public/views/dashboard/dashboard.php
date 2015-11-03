<?php
require_once '../../header.php';
if(empty($_SESSION['user'])) {
    header('location: ../auth/login.php ');
}
?>
<style>
    .limit {
        color: red;
        pointer-events: none;
    }
    .limitF {
        color: red;
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
<div class="container">
    <header>
        <div class="top-img">
            <img src="../../assets/img/jumbotron_small.jpg" alt="barroc-it image" class="barroc-img">
            <h1 class="barroc-title">BARROC IT. </h1>
            <h2 class="text-center subhead tophead">Dashboard</h2>
        </div>

        <nav role="navigation" class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->

            <!-- Collection of nav links and other content for toggling -->
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="../dashboard/dashboard.php">Home</a></li>

                </ul>

            </div>
        </nav>

    </header>
    <form action="../../../app/controllers/authController.php" method="POST">
        <div class="message">
            <?php
            if($messageBag->hasMsg()){
                echo $messageBag->show();
            }
            ?>
        </div>

        <a href="../customers/addcustomer.php" class="btn btn-primary" style="margin-left: 10px;">Add Customer</a>
        <input type="hidden" name="type" value="logout">
        <input type="submit" value="Logout" class="btn btn-primary" style="float: right; margin-right: 10px;">

    </form>
    <?php
    if(in_array("Sales",$_SESSION['user']) || in_array("Finance",$_SESSION['user']) || in_array("Admin",$_SESSION['user'])) { ?>
    <ul class="list-group">
        <? foreach($customers as $customer){
            if($customer['archived_at'] == null) {
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
            <b><a href="<?php echo  '../customers/customerinfo.php?id=' . $customer['id']?>"
               class="
               <?php
               if(! in_array("Finance",$_SESSION['user']) || in_array("Admin",$_SESSION['user'])) {
                   if($arrears > $limit) {
                       echo 'limit';
                   } else {
                       echo 'nolimit';
                   } } else if(in_array("Finance",$_SESSION['user']) || in_array("Admin",$_SESSION['user'])) {
                        if($customer['bkrcheck'] == 0) {
                            if($arrears > $limit) {
                            echo 'limitF';
                            } else {
                                echo 'nobkr';
                            }
                        } else {
                            echo 'nolimit';
                        }
               } ?> st"><?= $customer['companyname'] ?></a></b>
            <a class="btn btn-primary" href="<?php echo  '../customers/editcustomer.php?id=' . $customer['id']?>" style="float: right;">edit</a>
                <form action="<?php echo  '../../../app/controllers/customercontroller.php'?>" method="post">
                    <input type="hidden" name="id" value="<?php echo $customer['id'] ?>">
                </form>
                <br />
            </li>
               <?php } }
                ?>



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
</div>

