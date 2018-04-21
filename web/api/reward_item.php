<?php
    include 'connect.php';
    // include 'send_Verification_code.php';

    $response = array();

    if (isset($_POST['id'])) {

        //do something when right
        $categoryid = $_POST['id'];

        $query = "SELECT * FROM reward_item WHERE reward_cat = '$categoryid'";
        $result = $connect->query($query);

        if ($result->num_rows > 0) {

            $object = array();

            while ($row = $result->fetch_assoc()){
                $object[] = $row;
            }

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
