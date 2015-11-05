<?php
require_once '../init.php';


switch( $_POST['type'] ) {
    case 'add':
        add($_POST['id'],
            $_POST['date_of_invoice'],
            $_POST['end_invoice_date'],
            $_POST['invoicenumber'],
            $_POST['item1'],
            $_POST['item2'],
            $_POST['item3'],
            $_POST['item4'],
            $_POST['item5'],
            $_POST['item6'],
            $_POST['item7'],
            $_POST['item8'],
            $_POST['item9'],
            $_POST['item10'],
            $_POST['description1'],
            $_POST['description2'],
            $_POST['description3'],
            $_POST['description4'],
            $_POST['description5'],
            $_POST['description6'],
            $_POST['description7'],
            $_POST['description8'],
            $_POST['description9'],
            $_POST['description10'],
            $_POST['amount1'],
            $_POST['amount2'],
            $_POST['amount3'],
            $_POST['amount4'],
            $_POST['amount5'],
            $_POST['amount6'],
            $_POST['amount7'],
            $_POST['amount8'],
            $_POST['amount9'],
            $_POST['amount10'],
            $_POST['price1'],
            $_POST['price2'],
            $_POST['price3'],
            $_POST['price4'],
            $_POST['price5'],
            $_POST['price6'],
            $_POST['price7'],
            $_POST['price8'],
            $_POST['price9'],
            $_POST['price10']);
        break;
    case 'edit':

        edit($_POST['invoicenumber'],
            $_POST['date_of_invoice'],
            $_POST['end_invoice_date'],
            $_POST['paid'],
            $_POST['item1'],
            $_POST['item2'],
            $_POST['item3'],
            $_POST['item4'],
            $_POST['item5'],
            $_POST['item6'],
            $_POST['item7'],
            $_POST['item8'],
            $_POST['item9'],
            $_POST['item10'],
            $_POST['description1'],
            $_POST['description2'],
            $_POST['description3'],
            $_POST['description4'],
            $_POST['description5'],
            $_POST['description6'],
            $_POST['description7'],
            $_POST['description8'],
            $_POST['description9'],
            $_POST['description10'],
            $_POST['amount1'],
            $_POST['amount2'],
            $_POST['amount3'],
            $_POST['amount4'],
            $_POST['amount5'],
            $_POST['amount6'],
            $_POST['amount7'],
            $_POST['amount8'],
            $_POST['amount9'],
            $_POST['amount10'],
            $_POST['price1'],
            $_POST['price2'],
            $_POST['price3'],
            $_POST['price4'],
            $_POST['price5'],
            $_POST['price6'],
            $_POST['price7'],
            $_POST['price8'],
            $_POST['price9'],
            $_POST['price10']);

        break;
}

function edit($id, $date_of_invoice, $end_invoice_date, $paid, $item1, $item2, $item3,
              $item4, $item5, $item6, $item7, $item8, $item9, $item10, $description1, $description2,
              $description3, $description4, $description5, $description6, $description7, $description8,
              $description9, $description10, $amount1, $amount2, $amount3, $amount4, $amount5, $amount6,
              $amount7, $amount8, $amount9, $amount9, $amount10, $price1, $price2, $price3, $price4, $price5,
              $price6, $price7, $price8, $price9, $price10){
    global $db;
    global $messageBag;
    $controle = 2;

    if(empty($_POST['date_of_invoice']) ||
        empty($_POST['end_invoice_date']) ||
        !isset($_POST['paid'])){

        $controle = 1;
        $messageBag->add('w','Not all fields are filled in');
    }
    if(!empty($item1)) {
        if(empty($description1) || empty($amount1) || empty($price1)){
            $messageBag->add('w','Not all fields are filled in');
        }
    } else {
        $sql = "UPDATE tbl_invoice_items SET item = :item,
                                        description = :description,
                                        amount = :amount,
                                        price = :price
                                        WHERE id = 1";

        $q = $db->prepare($sql);
        $q->bindParam(':invoice_id', $id);
        $q->bindParam(':item', $item1);
        $q->bindParam(':description', $description1);
        $q->bindParam(':amount', $amount1);
        $q->bindParam(':price', $price1);
        $q->execute();
    }
    if(!empty($item2)) {
        if(empty($description2) || empty($amount2) || empty($price2)){
            $messageBag->add('w','Not all fields are filled in');
        }
    }else {
        $sql = "UPDATE tbl_invoice_items SET item = :item,
                                        description = :description,
                                        amount = :amount,
                                        price = :price
                                        WHERE id = 2";

        $q = $db->prepare($sql);
        $q->bindParam(':invoice_id', $id);
        $q->bindParam(':item', $item2);
        $q->bindParam(':description', $description2);
        $q->bindParam(':amount', $amount2);
        $q->bindParam(':price', $price2);
        $q->execute();
    }
    if(!empty($item3)) {
        if(empty($description3) || empty($amount3) || empty($price3)){
            $messageBag->add('w','Not all fields are filled in');
        }
    }else {
        $sql = "UPDATE tbl_invoice_items SET item = :item,
                                        description = :description,
                                        amount = :amount,
                                        price = :price
                                        WHERE id = 3";

        $q = $db->prepare($sql);
        $q->bindParam(':invoice_id', $id);
        $q->bindParam(':item', $item3);
        $q->bindParam(':description', $description3);
        $q->bindParam(':amount', $amount3);
        $q->bindParam(':price', $price3);
        $q->execute();
    }
    if(!empty($item4)) {
        if(empty($description4) || empty($amount4) || empty($price4)){
            $messageBag->add('w','Not all fields are filled in');
        }
    }
    else {
        $sql = "UPDATE tbl_invoice_items SET item = :item,
                                        description = :description,
                                        amount = :amount,
                                        price = :price
                                        WHERE id = 4";

        $q = $db->prepare($sql);
        $q->bindParam(':invoice_id', $id);
        $q->bindParam(':item', $item4);
        $q->bindParam(':description', $description4);
        $q->bindParam(':amount', $amount4);
        $q->bindParam(':price', $price4);
        $q->execute();
    }
    if(!empty($item5)) {
        if(empty($description5) || empty($amount5) || empty($price5)){
            $messageBag->add('w','Not all fields are filled in');
        }
    }else {
        $sql = "UPDATE tbl_invoice_items SET item = :item,
                                        description = :description,
                                        amount = :amount,
                                        price = :price
                                        WHERE id = 5";

        $q = $db->prepare($sql);
        $q->bindParam(':invoice_id', $id);
        $q->bindParam(':item', $item5);
        $q->bindParam(':description', $description5);
        $q->bindParam(':amount', $amount5);
        $q->bindParam(':price', $price5);
        $q->execute();
    }
    if(!empty($item6)) {
        if(empty($description6) || empty($amount6) || empty($price6)){
            $messageBag->add('w','Not all fields are filled in');
        }
    }else {
        $sql = "UPDATE tbl_invoice_items SET item = :item,
                                        description = :description,
                                        amount = :amount,
                                        price = :price
                                        WHERE id = 6";

        $q = $db->prepare($sql);
        $q->bindParam(':invoice_id', $id);
        $q->bindParam(':item', $item6);
        $q->bindParam(':description', $description6);
        $q->bindParam(':amount', $amount6);
        $q->bindParam(':price', $price6);
        $q->execute();
    }
    if(!empty($item7)) {
        if(empty($description7) || empty($amount7) || empty($price7)){
            $messageBag->add('w','Not all fields are filled in');
        }
    }else {
        $sql = "UPDATE tbl_invoice_items SET item = :item,
                                        description = :description,
                                        amount = :amount,
                                        price = :price
                                        WHERE id = 7";

        $q = $db->prepare($sql);
        $q->bindParam(':invoice_id', $id);
        $q->bindParam(':item', $item7);
        $q->bindParam(':description', $description7);
        $q->bindParam(':amount', $amount7);
        $q->bindParam(':price', $price7);
        $q->execute();
    }
    if(!empty($item8)) {
        if(empty($description8) || empty($amount8) || empty($price8)){
            $messageBag->add('w','Not all fields are filled in');
        }
    }else {
        $sql = "UPDATE tbl_invoice_items SET item = :item,
                                        description = :description,
                                        amount = :amount,
                                        price = :price
                                        WHERE id = 8";

        $q = $db->prepare($sql);
        $q->bindParam(':invoice_id', $id);
        $q->bindParam(':item', $item8);
        $q->bindParam(':description', $description8);
        $q->bindParam(':amount', $amount8);
        $q->bindParam(':price', $price8);
        $q->execute();
    }
    if(!empty($item9)) {
        if(empty($description9) || empty($amount9) || empty($price9)){
            $messageBag->add('w','Not all fields are filled in');
        }
    }else {
        $sql = "UPDATE tbl_invoice_items SET item = :item,
                                        description = :description,
                                        amount = :amount,
                                        price = :price
                                        WHERE id = 9";

        $q = $db->prepare($sql);
        $q->bindParam(':invoice_id', $id);
        $q->bindParam(':item', $item9);
        $q->bindParam(':description', $description9);
        $q->bindParam(':amount', $amount9);
        $q->bindParam(':price', $price9);
        $q->execute();
    }
    if(!empty($item10)) {
        if(empty($description10) || empty($amount10) || empty($price10)){
            $messageBag->add('w','Not all fields are filled in');
        }
    }else {
        $sql = "UPDATE tbl_invoice_items SET item = :item,
                                        description = :description,
                                        amount = :amount,
                                        price = :price
                                        WHERE id = 10";

        $q = $db->prepare($sql);
        $q->bindParam(':invoice_id', $id);
        $q->bindParam(':item', $item10);
        $q->bindParam(':description', $description10);
        $q->bindParam(':amount', $amount10);
        $q->bindParam(':price', $price10);
        $q->execute();
    }
    if($controle == 2){

        if($_POST['paid'] == 'yes' || $_POST['paid'] == 'Yes'){
            $paid = 1;
        }else if($_POST['paid'] == 'no' || $_POST['paid'] == 'No'){
            $paid = 0;
        }


        $dateofinvoice = strtotime($date_of_invoice);
        $endinvoicedate = strtotime($end_invoice_date);

        $sql = "UPDATE tbl_invoices SET date_of_invoice = :date_of_invoice,
                                        end_invoice_date = :end_invoice_date,
                                        paid = :paid
                                        WHERE id = :id";

        $q = $db->prepare($sql);
        $q->bindParam(':end_invoice_date', $endinvoicedate);
        $q->bindParam(':date_of_invoice', $dateofinvoice);
        $q->bindParam(':paid', $paid);
        $q->bindParam(':id', $id);
        $q->execute();

        header('location: ../../public/views/finance/invoiceinfo.php?id=' . $_POST['id']. '&customerid=' .$_POST['customerid']);
    }

}


function add($id, $date_of_invoice, $end_invoice_date, $invoicenumber, $item1, $item2, $item3,
             $item4, $item5, $item6, $item7, $item8, $item9, $item10, $description1, $description2,
             $description3, $description4, $description5, $description6, $description7, $description8,
             $description9, $description10, $amount1, $amount2, $amount3, $amount4, $amount5, $amount6,
             $amount7, $amount8, $amount9, $amount9, $amount10, $price1, $price2, $price3, $price4, $price5,
             $price6, $price7, $price8, $price9, $price10){


    global $messageBag;
    global $db;
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

    if(!empty($item1)) {
        if(empty($description1) || empty($amount1) || empty($price1)){
            $messageBag->add('w','Not all fields are filled in');
        }else {
            $sql = "INSERT INTO tbl_invoice_items(id, invoice_id, item, description, amount, price)
                                  VALUES(1, :invoice_id, :item, :description, :amount, :price)";

            $q = $db->prepare($sql);
            $q->bindParam(':invoice_id', $invoicenumber);
            $q->bindParam(':item', $item1);
            $q->bindParam(':description', $description1);
            $q->bindParam(':amount', $amount1);
            $q->bindParam(':price', $price1);
            $q->execute();
        }
    }
    if(!empty($item2)) {
        if(empty($description2) || empty($amount2) || empty($price2)){
            $messageBag->add('w','Not all fields are filled in');
        }else {
            $sql = "INSERT INTO tbl_invoice_items(id, invoice_id, item, description, amount, price)
                                  VALUES(2, :invoice_id, :item, :description, :amount, :price)";

            $q = $db->prepare($sql);
            $q->bindParam(':invoice_id', $invoicenumber);
            $q->bindParam(':item', $item2);
            $q->bindParam(':description', $description2);
            $q->bindParam(':amount', $amount2);
            $q->bindParam(':price', $price2);
            $q->execute();
        }
    }
    if(!empty($item3)) {
        if(empty($description3) || empty($amount3) || empty($price3)){
            $messageBag->add('w','Not all fields are filled in');
        }else {
            $sql = "INSERT INTO tbl_invoice_items(id, invoice_id, item, description, amount, price)
                                  VALUES(3, :invoice_id, :item, :description, :amount, :price)";

            $q = $db->prepare($sql);
            $q->bindParam(':invoice_id', $invoicenumber);
            $q->bindParam(':item', $item3);
            $q->bindParam(':description', $description3);
            $q->bindParam(':amount', $amount3);
            $q->bindParam(':price', $price3);
            $q->execute();
    }
    }
    if(!empty($item4)) {
        if(empty($description4) || empty($amount4) || empty($price4)){
            $messageBag->add('w','Not all fields are filled in');
        } else {
            $sql = "INSERT INTO tbl_invoice_items(id, invoice_id, item, description, amount, price)
                                  VALUES(4, :invoice_id, :item, :description, :amount, :price)";

            $q = $db->prepare($sql);
            $q->bindParam(':invoice_id', $invoicenumber);
            $q->bindParam(':item', $item4);
            $q->bindParam(':description', $description4);
            $q->bindParam(':amount', $amount4);
            $q->bindParam(':price', $price4);
            $q->execute();
        }
    }

    if(!empty($item5)) {
        if(empty($description5) || empty($amount5) || empty($price5)){
            $messageBag->add('w','Not all fields are filled in');
        }else {
            $sql = "INSERT INTO tbl_invoice_items(id, invoice_id, item, description, amount, price)
                                  VALUES(5, :invoice_id, :item, :description, :amount, :price)";

            $q = $db->prepare($sql);
            $q->bindParam(':invoice_id', $invoicenumber);
            $q->bindParam(':item', $item5);
            $q->bindParam(':description', $description5);
            $q->bindParam(':amount', $amount5);
            $q->bindParam(':price', $price5);
            $q->execute();
        }
    }
    if(!empty($item6)) {
        if(empty($description6) || empty($amount6) || empty($price6)){
            $messageBag->add('w','Not all fields are filled in');
        }else {
            $sql = "INSERT INTO tbl_invoice_items(id, invoice_id, item, description, amount, price)
                                  VALUES(6, :invoice_id, :item, :description, :amount, :price)";

            $q = $db->prepare($sql);
            $q->bindParam(':invoice_id', $invoicenumber);
            $q->bindParam(':item', $item6);
            $q->bindParam(':description', $description6);
            $q->bindParam(':amount', $amount6);
            $q->bindParam(':price', $price6);
            $q->execute();
        }
    }
    if(!empty($item7)) {
        if(empty($description7) || empty($amount7) || empty($price7)){
            $messageBag->add('w','Not all fields are filled in');
        }else {
            $sql = "INSERT INTO tbl_invoice_items(id, invoice_id, item, description, amount, price)
                                  VALUES(7, :invoice_id, :item, :description, :amount, :price)";

            $q = $db->prepare($sql);
            $q->bindParam(':invoice_id', $invoicenumber);
            $q->bindParam(':item', $item7);
            $q->bindParam(':description', $description7);
            $q->bindParam(':amount', $amount7);
            $q->bindParam(':price', $price7);
            $q->execute();
        }
    }
    if(!empty($item8)) {
        if(empty($description8) || empty($amount8) || empty($price8)){
            $messageBag->add('w','Not all fields are filled in');
        }else {
            $sql = "INSERT INTO tbl_invoice_items(id, invoice_id, item, description, amount, price)
                                  VALUES(8, :invoice_id, :item, :description, :amount, :price)";

            $q = $db->prepare($sql);
            $q->bindParam(':invoice_id', $invoicenumber);
            $q->bindParam(':item', $item8);
            $q->bindParam(':description', $description8);
            $q->bindParam(':amount', $amount8);
            $q->bindParam(':price', $price8);
            $q->execute();
        }
    }
    if(!empty($item9)) {
        if(empty($description9) || empty($amount9) || empty($price9)){
            $messageBag->add('w','Not all fields are filled in');
        }else {
            $sql = "INSERT INTO tbl_invoice_items(id, invoice_id, item, description, amount, price)
                                  VALUES(9, :invoice_id, :item, :description, :amount, :price)";

            $q = $db->prepare($sql);
            $q->bindParam(':invoice_id', $invoicenumber);
            $q->bindParam(':item', $item9);
            $q->bindParam(':description', $description9);
            $q->bindParam(':amount', $amount9);
            $q->bindParam(':price', $price9);
            $q->execute();
        }
    }
    if(!empty($item10)) {
        if(empty($description10) || empty($amount10) || empty($price10)){
            $messageBag->add('w','Not all fields are filled in');
        }else {
            $sql = "INSERT INTO tbl_invoice_items(id, invoice_id, item, description, amount, price)
                                  VALUES(10, :invoice_id, :item, :description, :amount, :price)";

            $q = $db->prepare($sql);
            $q->bindParam(':invoice_id', $invoicenumber);
            $q->bindParam(':item', $item10);
            $q->bindParam(':description', $description10);
            $q->bindParam(':amount', $amount10);
            $q->bindParam(':price', $price10);
            $q->execute();
        }
    }
    if($controle == 2){

        $dateofinvoice = strtotime($date_of_invoice);
        $endinvoicedate = strtotime($end_invoice_date);

        $sql = "INSERT INTO tbl_invoices(id, projects_id, end_invoice_date, date_of_invoice)
                                  VALUES(:id, :projects_id, :end_invoice_date, :date_of_invoice)";

        $q = $db->prepare($sql);
        $q->bindParam(':id', $invoicenumber);
        $q->bindParam(':projects_id', $id);
        $q->bindParam(':end_invoice_date', $endinvoicedate);
        $q->bindParam(':date_of_invoice', $dateofinvoice);
        $q->execute();

        header('location: ../../public/views/finance/invoiceinfo.php?id=' . $_POST['id']. '&customerid=' .$_POST['customerid']);

    }else{
        $messageBag->add('w','Something went wrong');

        header('location: ../../public/views/finance/invoiceinfo.php?id=' . $_POST['id']. '&customerid=' .$_POST['customerid']);
    }

}