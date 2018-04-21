<?php
    include 'connect.php';
    // include 'send_Verification_code.php';

    $response = array();

    if (isset($_POST['id']) && isset($_POST['id_user'])) {

        //do something when right
        $categoryid = $_POST['id'];
        $userid = $_POST['id_user'];

        $query = "SELECT * FROM reward_item WHERE reward_cat = '$categoryid'";
        $result = $connect->query($query);

        $query1 = "SELECT * FROM user_pengguna WHERE id = '$userid'";
        $result1 = $connect->query($query1);
        $row1 = $result1->fetch_assoc();
        $point = $row1['point'];

        if ($result->num_rows > 0) {

            $object = array();

            while ($row = $result->fetch_assoc()){
                $object[] = $row;
            }

            $response['response'] = 200;
            $response['status'] = true;
            $response['point'] = $point;
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
