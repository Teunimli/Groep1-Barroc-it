<?php
require_once '../init.php';


switch( $_POST['type'] ) {
    case 'add':
        add($_POST['customer_id'],
            $_POST['projectname'],
            $_POST['start_date'],
            $_POST['end_date'],
            $_POST['hardware'],
            $_POST['software'],
            $_POST['operating_system'],
            $_POST['status'],
            $_POST['description'],
            $_POST['limiten'],
            $_POST['maintenance_contract'],
            $_POST['application'],
            $_POST['deadline'],
            $_POST['active'],
            $db
        );
        break;
    case 'edit':
        break;
    case 'archive':
        break;

}

function alert($string)
{
    echo '<script type="text/javascript">alert("' . $string . '");</script>';
    echo '<script type="text/javascript">history.go(-1);</script>';
}


function add($customer_id, $projectname, $start_date, $end_date,
             $hardware, $software, $operating_system, $status,
             $description, $limiten, $maintenance_contract, $application, $deadline, $active, $db){

    $created_at = time();

    $controle = 2;

    $sql = "SELECT * FROM tbl_customer WHERE id = :id";
    $q = $db->prepare($sql);
    $q->bindParam(':id', $customer_id);
    $q->execute();

    $customer = $q->fetch();

    if ($q->rowCount() > 0) {
        if(isset($customer['creditworthy'])) {
            if ($customer['creditworthy'] == 1) {
                $controle = 2;

                $sql = "SELECT * FROM tbl_projects WHERE customer_id = :id";
                $q = $db->prepare($sql);
                $q->bindParam(':id', $customer_id);
                $q->execute();

                $customers = $q->fetch();

                if(!empty($customers['active'])) {
                    if ($customers['active'] == 1) {
                        $active = 'There is already a project active';
                        alert($active);
                        $controle = 1;
                    } else if (
                        empty($_POST['projectname']) ||
                        empty($_POST['start_date']) ||
                        empty($_POST['status']) ||
                        empty($_POST['description']) ||
                        empty($_POST['limiten']) ||
                        empty($_POST['maintenance_contract']) ||
                        empty($_POST['deadline']) ||
                        empty($_POST['active'])
                    ) {

                        $notFilled = 'data is incomplete';
                        alert($notFilled);
                        $controle = 1;

                    } else {
                        $controle = 2;
                    }
                }
            } else {
                $controle = 1;
            }
        }
    }

    if($controle == 2){

        $start_timestamp = strtotime($start_date);
        $end_timestamp = strtotime($end_date);
        $deadline_timestamp = strtotime($deadline);

        $sql = "INSERT INTO tbl_projects(customer_id, projectname, start_date, end_date, software, hardware,
                                         operating_system, status, description, limiten, maintenance_contract,
                                         application, deadline, active, created_at)
                                  VALUES(:customer_id, :projectname, :start_date, :end_date, :software, :hardware,
                                         :operating_system, :status, :description, :limiten, :maintenance_contract,
                                         :application, :deadline, :active, :created_at)";


        $q = $db->prepare($sql);
        $q->bindParam(':customer_id', $customer_id);
        $q->bindParam(':projectname', $projectname);
        $q->bindParam(':start_date', $start_timestamp);
        $q->bindParam(':end_date', $end_timestamp);
        $q->bindParam(':software', $software);
        $q->bindParam(':hardware', $hardware);
        $q->bindParam(':operating_system', $operating_system);
        $q->bindParam(':status', $status);
        $q->bindParam(':description', $description);
        $q->bindParam(':limiten', $limiten);
        $q->bindParam(':maintenance_contract', $maintenance_contract);
        $q->bindParam(':application', $application);
        $q->bindParam(':deadline', $deadline_timestamp);
        $q->bindParam(':active', $active);
        $q->bindParam(':created_at', $created_at);
        $q->execute();

        //header('location: ../../public/views/dashboard/dashboard.php');
    }

}

function edit(){

}