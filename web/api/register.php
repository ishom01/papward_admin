<?php
    include 'connect.php';

    $response = array();

    if (isset($_POST['username']) &&
        isset($_POST['phone']) &&
        isset($_POST['pin'])) {

        //do something when right
        $username = $_POST['username'];
        $image = "http://localhost/papward/web/image/user_default.png";
        $pin = $_POST['pin'];
        $phone = $_POST['phone'];
        $code = rand(1000, 9999);
        $point = 0;
        $status = 0;

        $query = "INSERT INTO user_pengguna (
          username,
          phone,
          image,
          `point`,
          pin,
          ver_code,
          status) VALUES (
            '$username',
            '$phone',
            '$image',
            '$point',
            '$pin',
            '$code',
            '$status')";

            // echo $query;

        if ($connect->query($query)) {
            $response['response'] = 200;
            $response['status'] = true;
            $response['message'] = "Register Berhasil";
        }else {
            $response['response'] = 200;
            $response['status'] = false;
            $response['message'] = "Register Gagal";
        }

    }else {

        //do something when false
        $response['response'] = 400;
        $response['status'] = false;
        $response['message'] = "Pastikan parameter anda terisi";
    }

    echo json_encode($response, JSON_PRETTY_PRINT);

?>
