<?php
    include 'connect.php';

    $response = array();

    if (isset($_POST['code']) && isset($_POST['id'])) {

        //do something when right
        $user_id = $_POST['id'];
        $code = $_POST['code'];

        $query = "SELECT * FROM user_pengguna WHERE id = '$user_id' and ver_code = '$code'";
        $result = $connect->query($query);

        if ($result->num_rows > 0) {

            $object = array();
            while ($row = $result->fetch_assoc()){
                $object = $row;
            }

            $sql = "UPDATE user_pengguna SET status = '1' WHERE id = '$user_id'";
            $connect->query($sql);

            $response['response'] = 200;
            $response['status'] = true;
            $response['data'] = $object;
        }else {
            $response['response'] = 200;
            $response['status'] = false;
            $response['message'] = "Code verifikasi tidak cocok";
        }

    }else {

        //do something when false
        $response['response'] = 400;
        $response['status'] = false;
        $response['message'] = "Pastikan parameter anda terisi";
    }

    echo json_encode($response, JSON_PRETTY_PRINT);
?>
