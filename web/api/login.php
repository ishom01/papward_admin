<?php
    include 'connect.php';
    // include 'send_Verification_code.php';

    $response = array();

    if (isset($_POST['phone']) &&
        isset($_POST['pin'])) {

        //do something when right
        $user_phone = $_POST['phone'];
        $user_password = $_POST['pin'];

        $query = "SELECT * FROM user_pengguna WHERE phone = '$user_phone' AND pin = '$user_password'";
        $result = $connect->query($query);

        if ($result->num_rows > 0) {

            $object = array();
            while ($row = $result->fetch_assoc()){
                $object = $row;
            }

            if ($object['status'] == 0) {
                $message = "Kode verifikasi untuk ".$object['username']." adalah " . $object['ver_code'];
                $data = "msisdn=". $object['phone'] ."&content=" .$message;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,"https://api.mainapi.net/smsnotification/1.0.0/messages");
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/x-www-form-urlencoded',
                    'Authorization: Bearer 5d766c57aa881a778b08cb42f75df1fb',
                    'Accept: application/json')
                );
                $result = curl_exec($ch);
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
