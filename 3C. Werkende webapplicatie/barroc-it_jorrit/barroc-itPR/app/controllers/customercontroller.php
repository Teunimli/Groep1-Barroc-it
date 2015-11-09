<?php
require_once '../init.php';

switch( $_POST['type'] ) {
    case 'add' :
        if(add($_POST['contact_name'],
            $_POST['contact_lastname'],
            $_POST['companyname'],
            $_POST['first_adress'],
            $_POST['first_zipcode'],
            $_POST['first_city'],
            $_POST['first_housenumber'],
            $_POST['second_adress'],
            $_POST['second_zipcode'],
            $_POST['second_city'],
            $_POST['second_housenumber'],
            $_POST['initials'],
            $_POST['first_telephonenumber'],
            $_POST['second_telephonenumber'],
            $_POST['fax'],
            $_POST['email'],
            $db )) {
            header('location: ../../public/views/dashboard/dashboard.php');
        } else {
            echo "<script> history.go(-1); </script>";
        }

        break;
    case 'edit' :
        if(edit($_POST['id'],
            $_POST['contact_name'],
            $_POST['contact_lastname'],
            $_POST['companyname'],
            $_POST['first_adress'],
            $_POST['first_zipcode'],
            $_POST['first_city'],
            $_POST['first_housenumber'],
            $_POST['second_adress'],
            $_POST['second_zipcode'],
            $_POST['second_city'],
            $_POST['second_housenumber'],
            $_POST['initials'],
            $_POST['first_telephonenumber'],
            $_POST['second_telephonenumber'],
            $_POST['fax'],
            $_POST['email'],
            $_POST['ledgeraccountnumber'],
            $_POST['taxcode'],
            $_POST['creditworthy'],
            $_POST['bkrcheck'],
            $_POST['open_project'],
            $db )) {
            header('location: ../../public/views/dashboard/dashboard.php');
        } else {
            echo "<script> history.go(-1); </script>";
        }
        break;
    case 'archive' :
        $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        if(archive($db, $_POST['id'])) {
            header('location: ../../public/views/dashboard/dashboard.php');
        } else {
            header('location: ../../public/views/dashboard/dashboard.php');
        }
        break;
    case 'dearchive':
        $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        if(dearchive($db, $_POST['id'])) {
            header('location: ../../public/views/dashboard/dashboard.php');
        }
        break;
}


function add($contact_name, $contact_lastname,
             $companyname,$first_adress,
             $first_zipcode,$first_city, $first_housenumber,
             $second_adress, $second_zipcode, $second_city,
             $second_housenumber, $initials,
             $first_telephonenumber, $second_telephonenumber,
             $fax, $email, $db) {

    global $messageBag;

    $created_at = time();
    $sql = "SELECT * FROM tbl_customer WHERE companyname = :companyname";
    $q = $db->prepare($sql);
    $q->bindParam(':companyname', $companyname);
    $q->execute();

    // kijkt of de rij al bestaat
    if ($q->rowCount() > 0) {
        $messageBag->add('w', 'Customer already excists');
        return false;

    } else if(
        empty($_POST['contact_name']) ||
        empty($_POST['contact_lastname']) ||
        empty($_POST['companyname']) ||
        empty($_POST['first_adress']) ||
        empty($_POST['first_zipcode']) ||
        empty($_POST['first_city']) ||
        empty($_POST['first_housenumber']) ||
        empty($_POST['initials']) ||
        empty($_POST['first_telephonenumber']) ||
        empty($_POST['email']) ) {


        $messageBag->add('w', 'One ore more fields are missing');
        return false;
    }


        $archive = 0;

        $sql = "INSERT INTO tbl_customer (contact_name, contact_lastname, companyname,
                                      first_adress, first_zipcode, first_city,
                                      first_housenumber, second_adress, second_zipcode,
                                      second_city, second_housenumber, initials,
                                      first_telephonenumber, second_telephonenumber, fax, email,
                                      created_at,archived_at )
                    VALUES (:contact_name, :contact_lastname, :companyname, :first_adress,
                            :first_zipcode, :first_city, :first_housenumber, :second_adress,
                            :second_zipcode, :second_city, :second_housenumber,
                            :initials, :first_telephonenumber, :second_telephonenumber, :fax, :email,
                            :created_at,:archived_at )";


        $q = $db->prepare($sql);
        $q->bindParam(':contact_name', $contact_name);
        $q->bindParam(':contact_lastname', $contact_lastname);
        $q->bindParam(':companyname', $companyname);
        $q->bindParam(':first_adress', $first_adress);
        $q->bindParam(':first_zipcode', $first_zipcode);
        $q->bindParam(':first_city', $first_city);
        $q->bindParam(':first_housenumber', $first_housenumber);
        $q->bindParam(':second_adress', $second_adress);
        $q->bindParam(':second_zipcode', $second_zipcode);
        $q->bindParam(':second_city', $second_city);
        $q->bindParam(':second_housenumber', $second_housenumber);
        $q->bindParam(':initials', $initials);
        $q->bindParam(':first_telephonenumber', $first_telephonenumber);
        $q->bindParam(':second_telephonenumber', $second_telephonenumber);
        $q->bindParam(':fax', $fax);
        $q->bindParam(':email', $email);
        $q->bindParam(':created_at', $created_at);
        $q->bindParam(':archived_at', $archive);
        $q->execute();
        $messageBag->add('s', 'customer is succesfully created');
        return true;
}

function edit ($id, $contact_name, $contact_lastname,
               $companyname,$first_adress,
               $first_zipcode,$first_city, $first_housenumber,
               $second_adress, $second_zipcode, $second_city,
               $second_housenumber, $initials,
               $first_telephonenumber, $second_telephonenumber,
               $fax, $email, $ledgeraccountnumber, $taxcode,
               $creditworthy, $bkrcheck, $open_project ,$db) {
    global $messageBag;

    $updated_at = time();
    if(
        empty($_POST['contact_name']) ||
        empty($_POST['contact_lastname']) ||
        empty($_POST['companyname']) ||
        empty($_POST['first_adress']) ||
        empty($_POST['first_zipcode']) ||
        empty($_POST['first_city']) ||
        empty($_POST['first_housenumber']) ||
        empty($_POST['initials']) ||
        empty($_POST['first_telephonenumber']) ||
        empty($_POST['email']) ) {


        $messageBag->add('w', 'One ore more fields are missing');
        return false;
    }
    if($creditworthy == 'Yes' || $creditworthy == 'yes') {
        $creditstatus = 1;
    } else if($creditworthy == 'No' || $creditworthy == 'no') {
        $creditstatus = 0;
    } else {
        $messageBag->add('w', 'Wrong input at "creditworthy"');
        return false;
    }
    if(in_array("Finance",$_SESSION['user']) || in_array("Admin",$_SESSION['user']))
    if($bkrcheck == 'Yes' || $bkrcheck == 'yes') {
        $bkrstatus = 1;
    } else if($bkrcheck == 'No' || $bkrcheck == 'no') {
        $bkrstatus = 0;
    } else {
        $messageBag->add('w', 'Wrong input at "bkrcheck"');
        return false;
    }

    if($open_project == 'Yes' || $open_project == 'yes') {
        $openprojectstatus = 1;
    } else if($open_project == 'No' || $open_project == 'no') {
        $openprojectstatus = 0;
    } else {
        $messageBag->add('w', 'Wrong input at "open project"');
        return false;
    }
    $sql = "UPDATE tbl_customer SET
                                    contact_name = :contact_name,
                                    contact_lastname = :contact_lastname,
                                    companyname = :companyname,
                                    first_adress = :first_adress,
                                    first_zipcode = :first_zipcode,
                                    first_city = :first_city,
                                    first_housenumber = :first_housenumber,
                                    second_adress = :second_adress,
                                    second_zipcode = :second_zipcode,
                                    second_city = :second_city,
                                    second_housenumber = :second_housenumber,
                                    initials = :initials,
                                    first_telephonenumber = :first_telephonenumber,
                                    second_telephonenumber = :second_telephonenumber,
                                    fax = :fax,
                                    email = :email,
                                    ledgeraccountnumber = :ledgeraccountnumber,
                                    taxcode = :taxcode,
                                    creditworthy = :creditworthy,
                                    bkrcheck = :bkrcheck,
                                    open_project = :open_project,
                                    updated_at = :updated_at


                                    WHERE id = :id";

    $q = $db->prepare($sql);
    $q->bindParam(':contact_name',$contact_name);
    $q->bindParam(':contact_lastname',$contact_lastname);
    $q->bindParam(':companyname',$companyname);
    $q->bindParam(':first_adress',$first_adress);
    $q->bindParam(':first_zipcode',$first_zipcode);
    $q->bindParam(':first_city',$first_city);
    $q->bindParam(':first_housenumber',$first_housenumber);
    $q->bindParam(':second_adress',$second_adress);
    $q->bindParam(':second_zipcode',$second_zipcode);
    $q->bindParam(':second_city',$second_city);
    $q->bindParam(':second_housenumber',$second_housenumber);
    $q->bindParam(':initials',$initials);
    $q->bindParam(':first_telephonenumber',$first_telephonenumber);
    $q->bindParam(':second_telephonenumber',$second_telephonenumber);
    $q->bindParam(':fax',$fax);
    $q->bindParam(':email',$email);
    $q->bindParam(':ledgeraccountnumber',$ledgeraccountnumber);
    $q->bindParam(':taxcode',$taxcode);
    $q->bindParam(':creditworthy',$creditstatus);
    $q->bindParam(':bkrcheck',$bkrstatus);
    $q->bindParam(':open_project',$openprojectstatus);
    $q->bindParam(':updated_at',$updated_at);
    $q->bindParam(':id',$id);
    $q->execute();
    $messageBag->add('s', 'customer is edited');
    return true;
}

function archive($db, $id){

    global $messageBag;

    $now = time();

    $sql = "SELECT * FROM tbl_customer WHERE id = :id";

    $q = $db->prepare($sql);
    $q->bindParam(':id', $id);
    $q->execute();

    if($q->rowCount() == 1){

        $sql = "SELECT  tbl_projects.archived_at, tbl_invoices.paid
                FROM tbl_projects
                INNER JOIN tbl_invoices ON tbl_projects.id = tbl_invoices.projects_id
                WHERE tbl_projects.customer_id = :id";

        $q = $db->prepare($sql);
        $q->bindParam(':id', $id);
        $q->execute();

        $resulten = $q->fetchAll(PDO::FETCH_ASSOC);

        if($q->rowCount() == 0){
            $sql = "UPDATE tbl_customer SET archived_at = :time WHERE id = :id";

            $q = $db->prepare($sql);
            $q->bindParam(':id', $id);
            $q->bindParam('time', $now);
            $q->execute();
            return true;


        }else{
            foreach($resulten as $resul){
                if($resul['archived_at'] == 0 || $resul['paid'] == 0){
                    $messageBag->add('w', 'Not all projects are done or not all invoices are paid');
                    return false;
                }else{

                    $sql = "UPDATE tbl_customer SET archived_at = :time WHERE id = :id";

                    $q = $db->prepare($sql);
                    $q->bindParam(':id', $id);
                    $q->bindParam('time', $now);
                    $q->execute();
                    return false;

                }

            }
        }
        return false;




    }else{
        return false;
    }

}

function dearchive($db,$id){

    $now = 0;

    $sql = "UPDATE tbl_customer SET archived_at = :time WHERE id = :id";

    $q = $db->prepare($sql);
    $q->bindParam(':id', $id);
    $q->bindParam('time', $now);
    $q->execute();

    return true;

}