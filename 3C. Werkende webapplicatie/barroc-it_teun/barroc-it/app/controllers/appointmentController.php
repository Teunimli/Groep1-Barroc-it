<?php
require_once __DIR__ . '/../init.php';
switch( $_POST['type'] ) {
    case 'add' :

        if(add($_POST['customer_id'],
            $_POST['appointment_date'],
            $_POST['description'],
            $_POST['employee'],
            $_POST['lastcontact'],
            $db )) {
            header('location: ../../public/views/sales/appointments.php?id=' . $_POST['customer_id']);
        }else {
           echo "<script> history.go(-1); </script>";
        }
        break;
    case 'edit' :
        if(edit($_POST['appointment_id'],
            $_POST['appointment_date'],
            $_POST['description'],
            $_POST['employee'],
            $_POST['lastcontact'],
            $db )) {
            header('location: ../../public/views/sales/appointments.php?id=' . $_POST['íd']);
        } else {
            echo "<script> history.go(-1); </script>";
        }
        break;
    case 'delete' :
        if(delete($_POST['appointment_id'], $db)) {
            header('location: ../../public/views/sales/appointments.php?id=' . $_POST['id']);
        }
        break;
}


function add($customer_id, $appointment_date, $description, $employee, $lastcontact, $db) {
    global $messageBag;
    $created_at = time();
    $app_date = strtotime($appointment_date);
    if(empty($customer_id) || empty($appointment_date) || empty($description) || empty($employee) ){

        $messageBag->add('w', 'One or more fields are missing');
        return false;
    }


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
        return true;

}

function edit($id, $appointment_date, $description, $employee, $lastcontact, $db) {
    global $messageBag;
    $updated_at = time();
    $app_date = strtotime($appointment_date);
    $lastcont = strtotime($lastcontact);
    if(empty($appointment_date) || empty($description) || empty($employee) ){

        $messageBag->add('w', 'One or more fields are missing');
        return false;
    }


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
        return true;
}

function delete($id, $db) {
    $sql = "DELETE FROM tbl_appointment WHERE id = :id";
    $q = $db->prepare($sql);
    $q->bindparam(':id', $id);
    $q->execute();
    return true;

}
