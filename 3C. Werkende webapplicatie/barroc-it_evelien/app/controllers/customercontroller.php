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
            header('Location: ' . $_SERVER['HTTP_REFERER']);
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
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        break;
    case 'archive' :
        $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        archive($db, $_POST['id']);
        break;
}

function alert($string)
{
    echo '<script type="text/javascript">alert("' . $string . '");</script>';
    echo '<script type="text/javascript">history.go(-1);</script>';
}

function add($contact_name, $contact_lastname,
             $companyname,$first_adress,
             $first_zipcode,$first_city, $first_housenumber,
             $second_adress, $second_zipcode, $second_city,
             $second_housenumber, $initials,
             $first_telephonenumber, $second_telephonenumber,
             $fax, $email, $db) {

    global $messageBag;
    $controle = 2;

    $created_at = time();
    $sql = "SELECT * FROM tbl_customer WHERE companyname = :companyname";
    $q = $db->prepare($sql);
    $q->bindParam(':companyname', $companyname);
    $q->execute();

    // kijkt of de rij al bestaat
    if ($q->rowCount() > 0) {
        $messageBag->add('w', 'Customer already excists');
        $controle = 1;
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
        $controle = 1;
        return false;
       // header('location:' . HTTP . '/public/views/customers/add.php');
    }

    if($controle == 2) {


        $sql = "INSERT INTO tbl_customer (contact_name, contact_lastname, companyname,
                                      first_adress, first_zipcode, first_city,
                                      first_housenumber, second_adress, second_zipcode,
                                      second_city, second_housenumber, initials,
                                      first_telephonenumber, second_telephonenumber, fax, email,
                                      created_at )
                    VALUES (:contact_name, :contact_lastname, :companyname, :first_adress,
                            :first_zipcode, :first_city, :first_housenumber, :second_adress,
                            :second_zipcode, :second_city, :second_housenumber,
                            :initials, :first_telephonenumber, :second_telephonenumber, :fax, :email,
                            :created_at )";


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
        $q->execute();
        $messageBag->add('s', 'customer is succesfully created');
        return true;
    }
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

    if($bkrcheck == 'Yes' || $bkrcheck == 'yes') {
        $bkrstatus = 1;
    } else if($creditworthy == 'No' || $creditworthy == 'no') {
        $bkrstatus = 0;
    } else {
        $messageBag->add('w', 'Wrong input at "bkrcheck"');
        return false;
    }

    if($open_project == 'Yes' || $open_project == 'yes') {
        $openprojectstatus = 1;
    } else if($creditworthy == 'No' || $creditworthy == 'no') {
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

    return true;
}

function archive($db, $id){

    $now = time();

    $sql = "SELECT * FROM tbl_customer WHERE id = :id";

    $q = $db->prepare($sql);
    $q->bindParam(':id', $id);
    $q->execute();

    $result = $q->fetch(PDO::FETCH_ASSOC);

    if(count($result == 1)){

        $sql = "SELECT tbl_customer.archived_at, tbl_projects.archived_at, tbl_invoices.paid
                FROM tbl_projects
                INNER JOIN tbl_invoices ON tbl_projects.id = tbl_invoices.projects_id
                INNER JOIN tbl_customer ON tbl_projects.id = tbl_customer.id
                WHERE tbl_projects.archived_at = 0 OR tbl_invoices.paid = 0 OR tbl_customer.id = :id";

        $q = $db->prepare($sql);
        $q->bindParam(':id', $id);
        $q->execute();

        if($q->rowCount() > 0 ) {

            $results = $q->fetchall();

            echo "Niet alles van deze customer is gearchiveerd of betaald";


        }else{

            $sql = "UPDATE tbl_customer SET archived_at = :time WHERE id = :id";

            $q = $db->prepare($sql);
            $q->bindParam(':id', $id);
            $q->bindParam('time', $now);
            $q->execute();

            header('location:' . HTTP . '/public/index.php');

        }

    }else{
        header('location:' . HTTP . '/public/index.php');
    }

}