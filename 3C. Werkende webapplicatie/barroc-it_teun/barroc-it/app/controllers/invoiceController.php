<?php
require_once '../init.php';


switch( $_POST['type'] ) {
    case 'add':
        add($_POST['id'],
            $_POST['date_of_invoie'],
            $_POST['end_invoice_date'],
            $_POST['invoicenumber'],
            $_POST['activities'],
            $_POST['price'],
            $db);
        var_dump($_POST);
        break;
    case 'edit':
        edit($_POST['invoicenumber'],
            $_POST['date_of_invoice'],
            $_POST['end_invoice_date'],
            $_POST['activities'],
            $_POST['price'],
            $_POST['paid'],
            $db);

        break;
}

function edit($id,$date_of_invoice, $end_invoice_date, $activities, $price, $paid, $db){

    global $messageBag;
    $controle = 2;

    if(empty($_POST['date_of_invoice']) ||
        empty($_POST['end_invoice_date']) ||
        empty($_POST['activities']) ||
        empty($_POST['price']) ||
        !isset($_POST['paid'])){

        $controle = 1;
        $messageBag->add('w','Not all fields are filled in');
    }

    if($controle == 2){

        if($_POST['paid'] == 'yes'){
            $paid = 1;
        }else{
            $paid = 0;
        }

        $dateofinvoice = strtotime($date_of_invoice);
        $endinvoicedate = strtotime($end_invoice_date);

        $sql = "UPDATE tbl_invoices SET date_of_invoice = :date_of_invoice,
                                        end_invoice_date = :end_invoice_date,
                                        inv_description = :inv_description,
                                        total_price = :price,
                                        paid = :paid
                                        WHERE id = :id";

        $q = $db->prepare($sql);
        $q->bindParam(':inv_description', $activities);
        $q->bindParam(':price', $price);
        $q->bindParam(':end_invoice_date', $endinvoicedate);
        $q->bindParam(':date_of_invoice', $dateofinvoice);
        $q->bindParam(':paid', $paid);
        $q->bindParam(':id', $id);
        $q->execute();
    }

}


function add($id, $date_of_invoice, $end_invoice_date, $invoicenumber, $activities, $price, $db){

    global $messageBag;
    $controle = 2;

    if(empty($_POST['date_of_invoie']) ||
       empty($_POST['end_invoice_date']) ||
       empty($_POST['invoicenumber']) ||
       empty($_POST['activities']) ||
       empty($_POST['price'])){

        $controle = 1;
        $messageBag->add('w','Not all fields are filled in');

    }else{

        $sql ="SELECT * FROM tbl_invoices WHERE id = :id";
        $q = $db->prepare($sql);
        $q->bindParam(':id', $invoicenumber);
        $q->execute();

        if($q->rowCount() == 0){
            $controle = 2;
        }else{
            $controle = 1;
        }
    }

    if($controle == 2){

        $dateofinvoice = strtotime($date_of_invoice);
        $endinvoicedate = strtotime($end_invoice_date);

        $sql = "INSERT INTO tbl_invoices(id, projects_id, inv_description, total_price, end_invoice_date, date_of_invoice)
                                  VALUES(:id, :projects_id, :inv_description, :total_price, :end_invoice_date, :date_of_invoice)";

        $q = $db->prepare($sql);
        $q->bindParam(':id', $invoicenumber);
        $q->bindParam(':projects_id', $id);
        $q->bindParam(':inv_description', $activities);
        $q->bindParam(':total_price', $price);
        $q->bindParam(':end_invoice_date', $endinvoicedate);
        $q->bindParam(':date_of_invoice', $dateofinvoice);
        $q->execute();

        //header('location: /../public/views/dashboard/dashboard.php');

    }

}