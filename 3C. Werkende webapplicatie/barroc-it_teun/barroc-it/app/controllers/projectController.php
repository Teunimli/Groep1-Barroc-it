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
        edit($_POST['id'],
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
            $_POST['customer_id'],
            $db
        );
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

                $sql = "SELECT * FROM tbl_projects WHERE customer_id = :id AND active = 1";
                $q = $db->prepare($sql);
                $q->bindParam(':id', $customer_id);
                $q->execute();


                    if ($q->rowCount() == 1) {
                        $active = 'There is already a project active';
                        alert($active);
                        $controle = 1;
                    }else if (
                        empty($_POST['projectname']) ||
                        empty($_POST['start_date']) ||
                        empty($_POST['status']) ||
                        empty($_POST['description']) ||
                        empty($_POST['limiten']) ||
                        !isset($_POST['maintenance_contract']) ||
                        empty($_POST['deadline']) ||
                        !isset($_POST['active'])) {

                        $notFilled = 'data is incomplete';
                        alert($notFilled);
                        $controle = 1;
                    } else {
                        $controle = 2;
                    }
            } else {
                $controle = 1;
            }
        }
    }

    if($controle == 2){

        if($_POST['maintenance_contract'] == 'yes' || $_POST['maintenance_contract'] == 'Yes'){
            $maintenance_contract = 1;
        }else if($_POST['maintenance_contract'] == 'no' || $_POST['maintenance_contract'] == 'No'){
            $maintenance_contract = 0;
        }

        if($_POST['active'] == 'yes' || $_POST['active'] == 'Yes'){
            $active = 1;
        }else if($_POST['active'] == 'no' || $_POST['active'] == 'No'){
            $active = 0;
        }

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

        header('location: ../../public/views/project/viewprojects.php?id=' . $_POST['customer_id']);
    }

}

function edit($id, $projectname, $start_date, $end_date,
              $hardware, $software, $operating_system, $status,
              $description, $limiten, $maintenance_contract, $application, $deadline, $active,$customerid, $db){

    $updated_at = time();

    $controle = 2;

    $start_timestamp = strtotime($start_date);
    $end_timestamp = strtotime($end_date);
    $deadline_timestamp = strtotime($deadline);

    if (empty($_POST['projectname']) ||
            empty($_POST['start_date']) ||
            empty($_POST['status']) ||
            empty($_POST['description']) ||
            empty($_POST['limiten']) ||
            !isset($_POST['maintenance_contract']) ||
            empty($_POST['deadline']) ||
            !isset($_POST['active'])
        ){
            $notFilled = 'data is incomplete';
            alert($notFilled);
            $controle = 1;

        }else{
            $sql= "SELECT * FROM tbl_projects WHERE customer_id = :id AND active = 1";
            $q = $db->prepare($sql);
            $q->bindParam(':id', $customerid);
            $q->execute();

        if($q->rowCount() >= 1){
            $controle = 1;
            header('location: ../../public/views/project/viewprojects.php?id=' . $_POST['customer_id']);
        }else{
            $controle = 2;
        }
    }



    if($controle == 2){

        if($_POST['maintenance_contract'] == 'yes' || $_POST['maintenance_contract'] == 'Yes'){
            $maintenance_contract = 1;
        }else if($_POST['maintenance_contract'] == 'no' || $_POST['maintenance_contract'] == 'No'){
            $maintenance_contract = 0;
        }

        if($_POST['active'] == 'yes' || $_POST['active'] == 'Yes'){
            $active = 1;
        }else if($_POST['active'] == 'no' || $_POST['active'] == 'No'){
            $active = 0;
        }

        $sql = "UPDATE tbl_projects SET projectname = :projectname,
                                        start_date = :start_date,
                                        end_date = :end_date,
                                        software = :software,
                                        hardware = :hardware,
                                        operating_system = :operating_system,
                                        status = :status,
                                        description = :description,
                                        limiten = :limiten,
                                        maintenance_contract = :maintenance_contract,
                                        application = :application,
                                        deadline = :deadline,
                                        active = :active,
                                        updated_at = :updated_at
                                        WHERE id = :id";



        $q = $db->prepare($sql);
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
        $q->bindParam(':updated_at', $updated_at);
        $q->bindParam(':id', $id);
        $q->execute();
        header('location: ../../public/views/project/viewprojects.php?id=' . $_POST['customer_id']);
    }

}