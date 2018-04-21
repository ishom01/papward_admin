<?php
    include 'connect.php';

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

            sendSMSVerification($object['phone'], $object['username'], $object['ver_code']);

            $response['response'] = 200;
            $response['status'] = true;
            $response['data'] = $object;
        }else {
            $response['response'] = 200;
            $response['status'] = false;
            $response['message'] = "Kirim ulang kode berhasil";
        }

    }else {

        //do something when false
        $response['response'] = 400;
        $response['status'] = false;
        $response['message'] = "Pastikan parameter anda terisi";
    }

    echo json_encode($response, JSON_PRETTY_PRINT);

    function sendSMSVerification($phone, $username, $kode){

          $message = "Kode verifikasi untuk ".$username." adalah " . $Kode;
          $data = "msisdn=". $phone ."&content=" .$message;
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

?>
