<?php
require_once '../../header.php';
if(empty($_SESSION['user'])) {
    header('location: ../auth/login.php ');
}
?>
<style>

</style>

<?php

// de query die gedaan moet worden
$sql = "SELECT * FROM tbl_customer WHERE archived_at = 0";

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
            <h2 class="text-center subhead tophead">Customer Info</h2>
        </div>
        <form action="../../../app/controllers/authController.php" method="POST">
            <input type="hidden" name="type" value="logout">
            <nav role="navigation" class="navbar navbar-default">

                <ul class="nav navbar-nav">
                    <li class="active"><a href="../dashboard/dashboard.php">Home</a></li>
                    <li><a href="../customers/archivedcustomer.php">Archived</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a><input type="submit" value="LOGOUT" style=" background:none!important; border:none;
                         padding:0!important;
                         font: inherit;
                         cursor: pointer;
                         margin-right: 10px;"></a></li>
                </ul>

            </nav>
        </form>

    </header>
        <div class="message">
            <?php
            if($messageBag->hasMsg()){
                echo $messageBag->show();
            }
            ?>

        </div>
    <div class="buttons">
        <a style="margin-bottom: 10px;" href="../customers/addcustomer.php" class="btn btn-primary">Add Customer</a>
    </div>
    <?php
    if(in_array("Sales",$_SESSION['user']) || in_array("Finance",$_SESSION['user']) || in_array("Admin",$_SESSION['user'])) { ?>
    <ul class="list-group">
        <? foreach($customers as $customer){
            if($customer['archived_at'] == 0) {
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
                              if($arrears > $limit || $customer['creditworthy'] == 0 ) {
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
                    <div class="buttons">
                        <a class="btn btn-primary" href="<?php echo  '../customers/editcustomer.php?id=' . $customer['id']?>" style="float: right;">edit</a>
                    </div>
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
        <? foreach($customers as $customer){
            if($customer['archived_at'] == 0) {
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
                    <b><a href="<?php echo  '../project/viewprojects.php?id=' . $customer['id']?>"
                          class="
               <?php
                          if(in_array("Development",$_SESSION['user'])) {
                              if($arrears > $limit || $customer['creditworthy'] == 0 ) {
                                  echo 'limit';
                              } else {
                                  echo 'nolimit';
                              }
                          } ?> st"><?= $customer['companyname'] ?></a></b>
                    <br />
                </li>
            <?php } } }
        ?>
        </ul>



</div>

