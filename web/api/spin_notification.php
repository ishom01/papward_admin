<?php
    include 'connect.php';
    // include 'send_Verification_code.php';

    $response = array();

    if (isset($_POST['id'])) {

        //do something when right
        $user_id = $_POST['id'];

        $query = "SELECT * FROM user_pengguna WHERE id = '$user_id'";
        $result = $connect->query($query);

        if ($result->num_rows > 0) {

            $object = array();

            while ($row = $result->fetch_assoc()){
                $object = $row;
            }

            $spin_notif = array();
            $spin_item = array();

            $spin_obj = array();
            $spin_obj['id'] = 1;
            $spin_obj['min'] = 100;
            $spin_obj['max'] = 200;

            $spin_obj1 = array();
            $spin_obj1['id'] = 1;
            $spin_obj1['min'] = 30;
            $spin_obj1['max'] = 80;

            $spin_item[] = $spin_obj;
            $spin_item[] = $spin_obj1;

            $spin_notif['count'] = count($spin_item);
            $spin_notif['items'] = $spin_item;

            $object['notification'] = $spin_notif;

            $response['response'] = 200;
            $response['status'] = true;
            $response['data'] = $object;
        }else {
            $response['response'] = 200;
            $response['status'] = false;
            $response['message'] = "Login Gagal";
        }

    }else {

        //do something when false
        $response['response'] = 400;
        $response['status'] = false;
        $response['message'] = "Pastikan parameter anda terisi";
    }

    echo json_encode($response, JSON_PRETTY_PRINT);

?>
