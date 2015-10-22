<?php
require_once __DIR__ . '/../init.php';
switch( $_POST['type'] ) {
    case 'add' :

        add($_POST['customer_id'],
            $_POST['appointment_date'],
            $_POST['description'],
            $_POST['employee'],
            $_POST['lastcontact'],
            $db );
        break;
    case 'edit' :
        edit($_POST['appointment_id'],
            $_POST['id'],
            $_POST['appointment_date'],
            $_POST['description'],
            $_POST['employee'],
            $_POST['lastcontact'],
            $db );
        break;
    case 'delete' :
        break;
}

function alert($string)
{
    echo '<script type="text/javascript">alert("' . $string . '");</script>';
    echo '<script type="text/javascript">history.go(-1);</script>';
}

function add($customer_id, $appointment_date, $description, $employee, $lastcontact, $db) {
    global $messageBag;
    $controle = 2;
    $created_at = time();
    $app_date = strtotime($appointment_date);
    if(empty($customer_id) || empty($appointment_date) || empty($description) || empty($employee) ){

        $messageBag->add('w', 'One or more fields are missing');
        $controle = 1;
        // header('location:' . HTTP . '/public/views/customers/add.php');
    }

    if($controle == 2) {


        $sql = "INSERT INTO tbl_appointment (customer_id, appointment_date, description,
                                      lastcontact, employee, created_at )
                    VALUES (:customer_id, :appointment_date, :description, :lastcontact,
                            :employee, :created_at )";


        $q = $db->prepare($sql);
        $q->bindParam(':customer_id', $customer_id);
        $q->bindParam(':appointment_date', $app_date);
        $q->bindParam(':description', $description);
        $q->bindParam(':lastcontact', $lastcontact);
        $q->bindParam(':employee', $employee);
        $q->bindParam(':created_at', $created_at);
        $q->execute();
        $messageBag->add('s', 'Appointment is created');
        header('location: ../../public/views/dashboard/dashboard.php');
    }

}

function edit($id, $customerid, $appointment_date, $description, $employee, $lastcontact, $db) {
    global $messageBag;
    $controle = 2;
    $updated_at = time();
    $app_date = strtotime($appointment_date);
    $lastcont = strtotime($lastcontact);
    if(empty($appointment_date) || empty($description) || empty($employee) ){

        $messageBag->add('w', 'One or more fields are missing');
        $controle = 1;
        // header('location:' . HTTP . '/public/views/customers/add.php');
    }

    if($controle == 2) {


        $sql = "UPDATE tbl_appointment SET
                                    appointment_date = :appointment_date,
                                    description = :description,
                                    employee = :employee,
                                    lastcontact = :lastcontact,
                                    updated_at = :updated_at
                                    WHERE id = :id";

        $q = $db->prepare($sql);
        $q->bindParam(':appointment_date',$app_date);
        $q->bindParam(':description',$description);
        $q->bindParam(':employee',$employee);
        $q->bindParam(':lastcontact',$lastcont);
        $q->bindParam(':updated_at',$updated_at);
        $q->bindParam(':id',$id);
        $q->execute();
        $messageBag->add('s', 'Appointment is updated');
        header('location: ../../public/views/sales/appointments.php?id=' . $customerid);
    }
}
