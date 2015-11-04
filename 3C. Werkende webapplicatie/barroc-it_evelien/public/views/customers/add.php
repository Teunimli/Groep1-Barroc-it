<?php require_once  '../../header.php'; ?>


<form class="col-md-4 col-md-push-4" action="../../../app/controllers/customercontroller.php" method="POST">
    <h1 class="text-center">Add Customer</h1>

    <input type="hidden" name="type" value="add"/>

    <div class="form-group">
        <label for="contact_name">Contact Name</label>
        <input type="text" name="contact_name" class="form-control">
    </div>

    <div class="form-group">
        <label for="contact_lastname">contact last name</label>
        <input type="text" name="contact_lastname" class="form-control">
    </div>

    <div class="form-group">
        <label for="companyname">company name</label>
        <input type="text" name="companyname" class="form-control">
    </div>

    <div class="form-group">
        <label for="first_adress">first adress</label>
        <input type="text" name="first_adress" class="form-control">
    </div>

    <div class="form-group">
        <label for="first_zipcode">first zipcode</label>
        <input type="text" name="first_zipcode" class="form-control">
    </div>

    <div class="form-group">
        <label for="first_city">first city</label>
        <input type="text" name="first_city" class="form-control">
    </div>

    <div class="form-group">
        <label for="first_housenumber">first house number</label>
        <input type="text" name="first_housenumber" class="form-control">
    </div>

    <div class="form-group">
        <label for="second_adress">second adress</label>
        <input type="text" name="second_adress" class="form-control">
    </div>

    <div class="form-group">
        <label for="second_zipcode">second zipcode</label>
        <input type="text" name="second_zipcode" class="form-control">
    </div>

    <div class="form-group">
        <label for="second_city">second city</label>
        <input type="text" name="second_city" class="form-control">
    </div>

    <div class="form-group">
        <label for="second_housenumber">second house number</label>
        <input type="text" name="second_housenumber" class="form-control">
    </div>

    <div class="form-group">
        <label for="contactperson">contactperson</label>
        <input type="text" name="contactperson" class="form-control">
    </div>

    <div class="form-group">
        <label for="initials">initials</label>
        <input type="text" name="initials" class="form-control">
    </div>

    <div class="form-group">
        <label for="first_telephonenumber">first telephonenumber</label>
        <input type="text" name="first_telephonenumber" class="form-control">
    </div>

    <div class="form-group">
        <label for="second_telephonenumber">second telephonenumber</label>
        <input type="text" name="second_telephonenumber" class="form-control">
    </div>

    <div class="form-group">
        <label for="fax">fax</label>
        <input type="text" name="fax" class="form-control">
    </div>

    <div class="form-group">
        <label for="email">email</label>
        <input type="email" name="email" class="form-control">
    </div>

    <div class="form-group">
        <label for="ledgeraccountnumber">ledgeraccountnumber</label>
        <input type="text" name="ledgeraccountnumber" class="form-control">
    </div>

    <div class="form-group">
        <label for="taxcode">taxcode</label>
        <input type="text" name="taxcode" class="form-control">
    </div>


    <input type="submit" value="Create" class=" btn-primary">
</form>

<?php require_once '../../footer.php'; ?>
