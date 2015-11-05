<?php require_once '../../header.php';?>
<?php
$item1tot = 0;
$item2tot = 0;
$item3tot = 0;
$item4tot = 0;
$item5tot = 0;
$item6tot = 0;
$item7tot = 0;
$item8tot = 0;
$item9tot = 0;
$item10tot = 0;

$customerid = $_GET['customerid'];
$sql = "SELECT * FROM tbl_customer WHERE id = :id";
$q = $db->prepare($sql);
$q->bindParam(':id', $customerid);
$q->execute();

$customer = $q->fetch();

$invoicesid = $_GET['id'];
$sql = "SELECT * FROM tbl_invoices WHERE id = :id";
$q = $db->prepare($sql);
$q->bindParam(':id', $invoicesid);
$q->execute();

$invoice = $q->fetch();



$project = $_GET['projectid'];
$sql = "SELECT * FROM tbl_projects WHERE id = :id";
$q = $db->prepare($sql);
$q->bindParam(':id', $project);
$q->execute();

$project = $q->fetch();

$sql = "SELECT * FROM tbl_invoice_items WHERE invoice_id = :id AND id = 1";
            $q = $db->prepare($sql);
            $q->bindParam(':id', $invoicesid);
            $q->execute();

            $item1 = $q->fetch();

$sql = "SELECT * FROM tbl_invoice_items WHERE invoice_id = :id AND id = 2";
$q = $db->prepare($sql);
$q->bindParam(':id', $invoicesid);
$q->execute();

$item2 = $q->fetch();

$sql = "SELECT * FROM tbl_invoice_items WHERE invoice_id = :id AND id = 3";
$q = $db->prepare($sql);
$q->bindParam(':id', $invoicesid);
$q->execute();

$item3 = $q->fetch();

$sql = "SELECT * FROM tbl_invoice_items WHERE invoice_id = :id AND id = 4";
$q = $db->prepare($sql);
$q->bindParam(':id', $invoicesid);
$q->execute();

$item4 = $q->fetch();

$sql = "SELECT * FROM tbl_invoice_items WHERE invoice_id = :id AND id = 5";
$q = $db->prepare($sql);
$q->bindParam(':id', $invoicesid);
$q->execute();

$item5 = $q->fetch();

$sql = "SELECT * FROM tbl_invoice_items WHERE invoice_id = :id AND id = 6";
$q = $db->prepare($sql);
$q->bindParam(':id', $invoicesid);
$q->execute();

$item6 = $q->fetch();

$sql = "SELECT * FROM tbl_invoice_items WHERE invoice_id = :id AND id = 7";
$q = $db->prepare($sql);
$q->bindParam(':id', $invoicesid);
$q->execute();

$item7 = $q->fetch();

$sql = "SELECT * FROM tbl_invoice_items WHERE invoice_id = :id AND id = 8";
$q = $db->prepare($sql);
$q->bindParam(':id', $invoicesid);
$q->execute();

$item8 = $q->fetch();

$sql = "SELECT * FROM tbl_invoice_items WHERE invoice_id = :id AND id = 9";
$q = $db->prepare($sql);
$q->bindParam(':id', $invoicesid);
$q->execute();

$item9 = $q->fetch();

$sql = "SELECT * FROM tbl_invoice_items WHERE invoice_id = :id AND id = 10";
$q = $db->prepare($sql);
$q->bindParam(':id', $invoicesid);
$q->execute();

$item10 = $q->fetch();
?>


<div class="container">
    <header>
        <div class="top-img">
            <img src="../../assets/img/jumbotron_small.jpg" alt="barroc-it image" class="barroc-img">
            <h1 class="barroc-title">BARROC IT. </h1>
            <h2 class="text-center subhead tophead">Invoice</h2>
        </div>
    </header>



    <div class="row">
        <div class="col-xs-6 text-right">
            <h1><small>Invoice #<?= $invoicesid ?></small></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>From: Barroc-IT</h4>
                </div>
                <div class="panel-body">
                    <p>
                        Address: &nbsp; &nbsp; &nbsp; Terheijdenseweg 350 <br>
                        Zipcode: &nbsp; &nbsp; &nbsp; 4826AA Breda <br>
                        Telephone: &nbsp; 076-5733444 <br>
                        Email: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; info@barroc-it.com <br>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xs-5 col-xs-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>To : <?= $customer['companyname'] ?></h4>
                </div>
                <div class="panel-body">
                    <p>
                        Address: &nbsp; &nbsp; &nbsp; <?= $customer['first_adress'] . ' ' . $customer['first_housenumber']  ?><br>
                        Zipcode: &nbsp; &nbsp; &nbsp; <?= $customer['first_zipcode'] . ' ' . $customer['first_city'] ?> <br>
                        Telephone: &nbsp; <?= $customer['first_telephonenumber'] ?><br>
                        Email: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?= $customer['email'] ?> <br>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- / end client details section -->
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>
                <h4>Service</h4>
            </th>
            <th>
                <h4>Description</h4>
            </th>
            <th>
                <h4>Hrs/Qty</h4>
            </th>
            <th>
                <h4>Rate/Price</h4>
            </th>
            <th>
                <h4>Sub Total</h4>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php if(!empty($item1['item'])) { ?>
        <tr>
            <td><?= $item1['item'] ?></td>
            <td><?= $item1['description'] ?></td>
            <td class="text-right"><?= $item1['amount'] ?></td>
            <td class="text-right"><?= $item1['price'] ?></td>
            <td class="text-right"><?= $item1tot = $item1['price'] * $item1['amount'] ?></td>
        </tr>
        <?php } if(!empty($item2['item'])) { ?>
        <tr>
            <td><?= $item2['item'] ?></td>
            <td><?= $item2['description'] ?></td>
            <td class="text-right"><?= $item2['amount'] ?></td>
            <td class="text-right"><?= $item2['price'] ?></td>
            <td class="text-right"><?= $item2tot = $item2['price'] * $item2['amount'] ?></td>
        </tr>
        <?php } if(!empty($item3['item'])) { ?>
        <tr>
            <td><?= $item3['item'] ?></td>
            <td><?= $item3['description'] ?></td>
            <td class="text-right"><?= $item3['amount'] ?></td>
            <td class="text-right"><?= $item3['price'] ?></td>
            <td class="text-right"><?= $item3tot = $item3['price'] * $item3['amount'] ?></td>
        </tr>
        <?php } if(!empty($item4['item'])) { ?>
        <tr>
            <td><?= $item4['item'] ?></td>
            <td><?= $item4['description'] ?></td>
            <td class="text-right"><?= $item4['amount'] ?></td>
            <td class="text-right"><?= $item4['price'] ?></td>
            <td class="text-right"><?= $item4tot = $item4['price'] * $item4['amount'] ?></td>
        </tr>
        <?php } if(!empty($item5['item'])) { ?>
        <tr>
            <td><?= $item5['item'] ?></td>
            <td><?= $item5['description'] ?></td>
            <td class="text-right"><?= $item5['amount'] ?></td>
            <td class="text-right"><?= $item5['price'] ?></td>
            <td class="text-right"><?= $item5tot = $item5['price'] * $item5['amount'] ?></td>
        </tr>
        <?php } if(!empty($item6['item'])) { ?>
        <tr>
            <td><?= $item6['item'] ?></td>
            <td><?= $item6['description'] ?></td>
            <td class="text-right"><?= $item6['amount'] ?></td>
            <td class="text-right"><?= $item6['price'] ?></td>
            <td class="text-right"><?= $item6tot = $item6['price'] * $item6['amount'] ?></td>
        </tr>
        <?php } if(!empty($item7['item'])) { ?>
        <tr>
            <td><?= $item7['item'] ?></td>
            <td><?= $item7['description'] ?></td>
            <td class="text-right"><?= $item7['amount'] ?></td>
            <td class="text-right"><?= $item7['price'] ?></td>
            <td class="text-right"><?= $item7tot = $item7['price'] * $item7['amount'] ?></td>
        </tr>
        <?php } if(!empty($item8['item'])) { ?>
        <tr>
            <td><?= $item8['item'] ?></td>
            <td><?= $item8['description'] ?></td>
            <td class="text-right"><?= $item8['amount'] ?></td>
            <td class="text-right"><?= $item8['price'] ?></td>
            <td class="text-right"><?= $item8tot = $item8['price'] * $item8['amount'] ?></td>
        </tr>
        <?php } if(!empty($item9['item'])) { ?>
        <tr>
            <td><?= $item9['item'] ?></td>
            <td><?= $item9['description'] ?></td>
            <td class="text-right"><?= $item9['amount'] ?></td>
            <td class="text-right"><?= $item9['price'] ?></td>
            <td class="text-right"><?= $item9tot = $item9['price'] * $item9['amount'] ?></td>
        </tr>
        <?php } if(!empty($item10['item'])) { ?>
        <tr>
            <td><?= $item10['item'] ?></td>
            <td><?= $item10['description'] ?></td>
            <td class="text-right"><?= $item10['amount'] ?></td>
            <td class="text-right"><?= $item10['price'] ?></td>
            <td class="text-right"><?= $item10tot = $item10['price'] * $item2['amount'] ?></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <div class="row text-right">
        <div class="col-xs-2 col-xs-offset-8">
            <p>
                <strong>
                    Sub Total : <br>
                    TAX 21% : <br>
                    Total : <br>
                </strong>
            </p>
        </div>
        <div class="col-xs-2">
            <strong>
                <?= $subtot = $item1tot + $item2tot + $item3tot + $item4tot + $item5tot + $item6tot
                    + $item7tot + $item8tot + $item9tot + $item10tot?> <br>
                <?= $subtot * 0.21 ?> <br>
                <?= $subtot * 1.21 ?> <br>
            </strong>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-5">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4>Bank details</h4>
                </div>
                <div class="panel-body">
                    <p>Name: Barroc-IT</p>
                    <p>Bank Name: Rabobank</p>
                    <p>SWIFT : RABONL2U </p>
                    <p>Account Number : 56788659</p>
                    <p>IBAN : NL60 RABO 5884 7897</p>
                    <p>Description : <?= $customer['companyname'] . ' invoice#' . $invoicesid . ' payment' ?></p>
                </div>
            </div>
        </div>
        <div class="col-xs-7">
            <div class="span7">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4>Contact Details</h4>
                    </div>
                    <div class="panel-body">
                        <p>
                            Email : info@barroc-it.com  <br><br>
                            Telephone : 076-5733444 <br> <br>
                        </p>
                        <h4>Payment should be made by Bank Transfer</h4>
                    </div>
                </div>
            </div>
            <div class="buttons">
                <a class="btn btn-primary" href="javascript:window.print()">Print</a>
            </div>
        </div>
    </div>
</div>