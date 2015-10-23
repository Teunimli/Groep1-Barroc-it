<?php require_once '../../header.php';?>
<?php
//
//$id = $_GET['id'];
//$sql = "";
//$q = $db->prepare($sql);
//$q->bindParam(':', $);
//$q->execute();
//
//$customer = $q->fetch();
//
?>
<div class="container">
    <header>


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
    <div class="container-content">

        <form action="" method="POST">
            <div class="message">
                <?php
                if($messageBag->hasMsg()){
                    echo $messageBag->show();
                }
                ?>
            </div>
            <h2 class="text-center subhead">Add invoice</h2>
            <input type="hidden" name="type" value="edit">
            <input type="hidden" name="id" value="<?= $customer['id'] ?>" />

            <div class="grid">
                <div class="col-6">
                    <div class="form-group">
                        <label for="contact_name" class="col-4">Contact firstname:</label>
                        <input type="text" name="contact_name" value="<?= $customer['contact_name']?>">
                    </div>

                    <div class="form-group">
                        <label for="contact_lastname" class="col-4">Contact lastname:</label>
                        <input type="text" name="contact_lastname" value="<?= $customer['contact_lastname']?>">
                    </div>

                    <div class="form-group">
                        <label for="companyname" class="col-4">Company name:</label>
                        <input type="text" name="companyname" value="<?= $customer['companyname']?>">
                    </div>

                    <div class="form-group">
                        <label for="first_adress" class="col-4">address:</label>
                        <input type="text" name="first_adress" value="<?= $customer['first_adress']?>">
                    </div>

                    <div class="form-group">
                        <label for="first_zipcode" class="col-4">Zipcode:</label>
                        <input type="text" name="first_zipcode" value="<?= $customer['first_zipcode']?>">
                    </div>

                    <div class="form-group">
                        <label for="first_city" class="col-4">City*:</label>
                        <input type="text" name="first_city" value="<?= $customer['first_city']?>">
                    </div>

                    <div class="form-group">
                        <label for="first_housenumber" class="col-4">housenumber:</label>
                        <input type="text" name="first_housenumber" value="<?= $customer['first_housenumber']?>">
                    </div>

                    <div class="form-group">
                        <label for="first_telephonenumber" class="col-4">Tel 1:</label>
                        <input type="text" name="first_telephonenumber" value="<?= $customer['first_telephonenumber']?>">
                    </div>

                    <div class="form-group">
                        <label for="second_telephonenumber" class="col-4">Tel 2:</label>
                        <input type="text" name="second_telephonenumber" value="<?= $customer['second_telephonenumber']?>">
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-4">Email:</label>
                        <input type="email" name="email" value="<?= $customer['email']?>">
                    </div>

                    <div class="form-group">
                        <label for="ledgeraccountnumber" class="col-4">Ledger account number:</label>
                        <input type="text" name="ledgeraccountnumber" value="<?= $customer['ledgeraccountnumber']?>">
                    </div>

                    <div class="form-group">
                        <label for="taxcode" class="col-4">Taxcode:</label>
                        <input type="text" name="taxcode" value="<?= $customer['taxcode']?>">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="todaydate" class="col-4">today date:</label>
                        <input type="date" name="todaydate">
                    </div>

                    <div class="form-group">
                        <label for="expirationdate" class="col-4">Expiration date:</label>
                        <input type="date" name="expirationdate">
                    </div>

                    <div class="form-group">
                        <label for="invoicenumber" class="col-4">Invoice number:</label>
                        <input type="number" name="invoicenumber">
                    </div>

                </div><!--end col-6--->
            </div><!--end grid--->
            <div class="grid">
                <div class="col-9">
                   <h2>Activities</h2>
                    <div class="form-group">
                        <textarea name="activities"></textarea>
                    </div>
                </div>
                <div class="col-3">
                    <h2>Price</h2>
                    <div class="form-group">
                        <input type="number" name="price">
                    </div>
                </div>
            </div><!--end grid--->
<input type="submit" value="Submit">
</form>
<a onclick="goBack()">Back</a>

</div><!--end container-content-->
</div><!--end container--->



<?php require_once __DIR__ . '/../../footer.php';?>



