<?php require_once '../../header.php';?>
<?php

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

$sql = "SELECT * FROM tbl_invoice_items WHERE invoice_id = :id";
$q = $db->prepare($sql);
$q->bindParam(':id', $invoicesid);
$q->execute();

$items = $q->fetch();

$projectid = $_GET['projectid'];
$sql = "SELECT * FROM tbl_projects WHERE id = :id";
$q = $db->prepare($sql);
$q->bindParam(':id', $projectid);
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
            <h2 class="text-center subhead tophead">Edit Invoice</h2>
        </div>
        <form action="../../../app/controllers/authController.php" method="POST">
            <input type="hidden" name="type" value="logout">
            <nav role="navigation" class="navbar navbar-default">

                <ul class="nav navbar-nav">
                    <li><a href="../dashboard/dashboard.php">Home</a></li>
                    <li><a href="../customers/customerinfo.php?id=<?= $customer['id'] ?>">Customer Info</a></li>
                    <li class="active"><a href="../project/viewprojects.php?id=<?= $customer['id'] ?>">Projects</a></li>
                    <?php if(in_array("Sales",$_SESSION['user']) || in_array("Admin",$_SESSION['user'])) { ?>  <li><a href="../sales/appointments.php?id=<?= $customer['id'] ?>">Appointments</a></li> <?php } ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a><input type="submit" value="LOGOUT" class="logout"></a></li>
                </ul>

            </nav>
        </form>

    </header>
    <div class="container-content">

        <form action="<? echo '../../../app/controllers/invoiceController.php'?>"  method="POST">
            <div class="message">
                <?php
                if($messageBag->hasMsg()){
                    echo $messageBag->show();
                }
                ?>
            </div>
            <h2 class="text-center">Edit invoice</h2>
            <input type="hidden" name="type" value="edit">
            <input type="hidden" name="customerid" value="<?= $customer['id'] ?>" />
            <input type="hidden" name="id" value="<?= $invoice['projects_id'] ?>" />


            <div class="grid" style="color: black">
                <div class="col-6">
                    <div class="form-group">
                        <label for="contact_name" class="col-4">Contact firstname:</label>
                        <input type="text" name="contact_name" value="<?= $customer['contact_name']?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="contact_lastname" class="col-4">Contact lastname:</label>
                        <input type="text" name="contact_lastname" value="<?= $customer['contact_lastname']?>"readonly>
                    </div>

                    <div class="form-group">
                        <label for="companyname" class="col-4">Company name:</label>
                        <input type="text" name="companyname" value="<?= $customer['companyname']?>"readonly>
                    </div>

                    <div class="form-group">
                        <label for="first_adress" class="col-4">address:</label>
                        <input type="text" name="first_adress" value="<?= $customer['first_adress']?>"readonly>
                    </div>

                    <div class="form-group">
                        <label for="first_zipcode" class="col-4">Zipcode:</label>
                        <input type="text" name="first_zipcode" value="<?= $customer['first_zipcode']?>"readonly>
                    </div>

                    <div class="form-group">
                        <label for="first_city" class="col-4">City*:</label>
                        <input type="text" name="first_city" value="<?= $customer['first_city']?>"readonly>
                    </div>

                    <div class="form-group">
                        <label for="first_housenumber" class="col-4">housenumber:</label>
                        <input type="text" name="first_housenumber" value="<?= $customer['first_housenumber']?>"readonly>
                    </div>

                    <div class="form-group">
                        <label for="first_telephonenumber" class="col-4">Tel 1:</label>
                        <input type="text" name="first_telephonenumber" value="<?= $customer['first_telephonenumber']?>"readonly>
                    </div>

                    <div class="form-group">
                        <label for="second_telephonenumber" class="col-4">Tel 2:</label>
                        <input type="text" name="second_telephonenumber" value="<?= $customer['second_telephonenumber']?>"readonly>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-4">Email:</label>
                        <input type="email" name="email" value="<?= $customer['email']?>"readonly>
                    </div>

                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="projectname" class="col-4">Projectname:</label>
                        <input type="text" name="projectname" value="<?= $project['projectname']?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="project_start_date" class="col-4">Project start date:</label>
                        <input type="date" name="project_start_date" value="<?= date('Y-m-d',$project['start_date'])?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="project_end_date" class="col-4">Project end date:</label>
                        <input type="date" name="project_end_date" value="<?= date('Y-m-d',$project['end_date'])?>"readonly>
                    </div>

                </div><!--end col-6--->

                <div class="col-6">
                    <div class="form-group">
                        <label for="date_of_invoice" class="col-4">today date:*</label>
                        <input type="date" name="date_of_invoice" value="<?= date('Y-m-d',$invoice['date_of_invoice'])?>">
                    </div>

                    <div class="form-group">
                        <label for="end_invoice_date" class="col-4">Expiration date:*</label>
                        <input type="date" name="end_invoice_date" value="<?= date('Y-m-d',$invoice['end_invoice_date'])?>">
                    </div>

                    <div class="form-group">
                        <label for="invoicenumber" class="col-4">Invoice number:*</label>
                        <input type="number" name="invoicenumber" value="<?= $invoice['id']?>"readonly>
                    </div>

                    <div class="form-group">
                        <label for="paid" class="col-4">Paid:*</label>
                        <input type="text" name="paid" value="<?if($invoice['paid'] == 1){ echo'Yes';}else{echo'No';}?>">
                    </div>

                </div><!--end col-6--->
            </div><!--end grid--->
            <table style="color: black" class="table table-bordered">
                <thead>
                <tr>
                    <th>
                        <h4>Item / activity</h4>
                    </th>
                    <th>
                        <h4>Description</h4>
                    </th>
                    <th>
                        <h4>Amount</h4>
                    </th>
                    <th>
                        <h4>Price</h4>
                    </th>
                </tr>
                </thead>
                <tbody id="test">
                <tr>
                    <td><input placeholder="Item / activity name" type="text" name="item1" value="<?= $item1['item'] ?>"></td>
                    <td><textarea  name="description1" placeholder="description of item / activity"><?= $item1['description'] ?> </textarea></td>
                    <td class="text-right"><input placeholder="amount of items / hours" type="text" name="amount1" value="<?= $item1['amount'] ?>"></td>
                    <td class="text-right"><input placeholder="price of the item / activity" type="text" name="price1" value="<?= $item1['price'] ?>"></td>
                </tr>
                <tr>
                    <td><input placeholder="Item / activity name" type="text" name="item2" value="<?= $item2['item'] ?>"></td>
                    <td><textarea  name="description2" placeholder="description of item / activity"><?= $item2['description'] ?> </textarea></td>
                    <td class="text-right"><input placeholder="amount of items / hours" type="text" name="amount2" value="<?= $item2['amount'] ?>"></td>
                    <td class="text-right"><input placeholder="price of the item / activity" type="text" name="price2" value="<?= $item2['price'] ?>"></td>
                </tr>
                <tr>
                    <td><input placeholder="Item / activity name" type="text" name="item3" value="<?= $item3['item'] ?>"></td>
                    <td><textarea  name="description3" placeholder="description of item / activity"><?= $item3['description'] ?> </textarea></td>
                    <td class="text-right"><input placeholder="amount of items / hours" type="text" name="amount3" value="<?= $item3['amount'] ?>"></td>
                    <td class="text-right"><input placeholder="price of the item / activity" type="text" name="price3" value="<?= $item3['price'] ?>"></td>
                </tr>
                <tr>
                    <td><input placeholder="Item / activity name" type="text" name="item4" value="<?= $item4['item'] ?>"></td>
                    <td><textarea  name="description4" placeholder="description of item / activity"><?= $item4['description'] ?> </textarea></td>
                    <td class="text-right"><input placeholder="amount of items / hours" type="text" name="amount4" value="<?= $item4['amount'] ?>"></td>
                    <td class="text-right"><input placeholder="price of the item / activity" type="text" name="price4" value="<?= $item4['price'] ?>"></td>
                </tr>
                <tr>
                    <td><input placeholder="Item / activity name" type="text" name="item5" value="<?= $item5['item'] ?>"></td>
                    <td><textarea  name="description5" placeholder="description of item / activity"><?= $item5['description'] ?> </textarea></td>
                    <td class="text-right"><input placeholder="amount of items / hours" type="text" name="amount5" value="<?= $item5['amount'] ?>"></td>
                    <td class="text-right"><input placeholder="price of the item / activity" type="text" name="price5" value="<?= $item5['price'] ?>"></td>
                </tr>
                <tr>
                    <td><input placeholder="Item / activity name" type="text" name="item6" value="<?= $item6['item'] ?>"></td>
                    <td><textarea  name="description6" placeholder="description of item / activity"><?= $item6['description'] ?> </textarea></td>
                    <td class="text-right"><input placeholder="amount of items / hours" type="text" name="amount6" value="<?= $item6['amount'] ?>"></td>
                    <td class="text-right"><input placeholder="price of the item / activity" type="text" name="price6" value="<?= $item6['price'] ?>"></td>
                </tr>
                <tr>
                    <td><input placeholder="Item / activity name" type="text" name="item7" value="<?= $item7['item'] ?>"></td>
                    <td><textarea  name="description7" placeholder="description of item / activity"><?= $item7['description'] ?> </textarea></td>
                    <td class="text-right"><input placeholder="amount of items / hours" type="text" name="amount7" value="<?= $item7['amount'] ?>"></td>
                    <td class="text-right"><input placeholder="price of the item / activity" type="text" name="price7" value="<?= $item7['price'] ?>"></td>
                </tr>
                <tr>
                    <td><input placeholder="Item / activity name" type="text" name="item8" value="<?= $item8['item'] ?>"></td>
                    <td><textarea  name="description8" placeholder="description of item / activity"><?= $item8['description'] ?> </textarea></td>
                    <td class="text-right"><input placeholder="amount of items / hours" type="text" name="amount8" value="<?= $item8['amount'] ?>"></td>
                    <td class="text-right"><input placeholder="price of the item / activity" type="text" name="price8" value="<?= $item8['price'] ?>"></td>
                </tr>
                <tr>
                    <td><input placeholder="Item / activity name" type="text" name="item9" value="<?= $item9['item'] ?>"></td>
                    <td><textarea  name="description9" placeholder="description of item / activity"><?= $item9['description'] ?> </textarea></td>
                    <td class="text-right"><input placeholder="amount of items / hours" type="text" name="amount9" value="<?= $item9['amount'] ?>"></td>
                    <td class="text-right"><input placeholder="price of the item / activity" type="text" name="price9" value="<?= $item9['price'] ?>"></td>
                </tr>
                <tr>
                    <td><input placeholder="Item / activity name" type="text" name="item10" value="<?= $item10['item'] ?>"></td>
                    <td><textarea  name="description10" placeholder="description of item / activity"><?= $item10['description'] ?> </textarea></td>
                    <td class="text-right"><input placeholder="amount of items / hours" type="text" name="amount10" value="<?= $item10['amount'] ?>"></td>
                    <td class="text-right"><input placeholder="price of the item / activity" type="text" name="price10" value="<?= $item10['price'] ?>"></td>
                </tr>
                </tbody>
            </table>
                <p>* You must fill these fields in</p>
            </div><!--end grid--->
            <div class="buttons">
                <input class="btn btn-primary" type="submit" value="Submit">
                <a class="btn btn-primary" onclick="goBack()">Back</a>
            </div>
        </form>



    </div><!--end container-content-->
</div><!--end container--->



<?php require_once __DIR__ . '/../../footer.php';?>



