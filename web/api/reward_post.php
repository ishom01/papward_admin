<?php
    include 'connect.php';
    // include 'send_Verification_code.php';

    $response = array();
    date_default_timezone_set('Asia/Jakarta');
    // $date = date("Y-m-d");
    $date = date('Y-m-d', strtotime("+5 days"));

    if (isset($_POST['id_reward']) && isset($_POST['id_user'])) {

        //do something when right
        $rewardid = $_POST['id_reward'];
        $userid = $_POST['id_user'];

        $query = "SELECT * FROM user_pengguna WHERE id = '$userid'";
        $result = $connect->query($query);

        $query1 = "SELECT * FROM reward_item WHERE id = '$rewardid'";
        $result1 = $connect->query($query1);

        if ($result->num_rows > 0 && $result1->num_rows > 0) {

            $row = $result->fetch_assoc();
            $row1 = $result1->fetch_assoc();

            if ($row['point'] > $row1['point']) {
                $code = rand(100000,999999);

                $newquery = "INSERT INTO reward_history (
                  id_reward,
                  id_user,
                  code,
                  date_expired,
                  status) VALUES (
                    '$rewardid',
                    '$userid',
                    '$code',
                    '$date',
                    0)";

                if ($connect->query($newquery)) {

                    $point = $row['point'] - $row1['point'];
                    $sql2 = "UPDATE user_pengguna SET `point` = '$point' WHERE id = '$userid'";
                    echo $connect->query($sql2);

                    $message = "Tukar ward point sebesar ".$row1['point'].". dengan " . $row1['name'] . " belaku hingga " .$date. ". Dengan kode penukaran ". $code;
                    $data = "msisdn=". $row['phone'] ."&content=" .$message;
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

                    $response['response'] = 200;
                    $response['status'] = true;
                    $response['message'] = "Tukar ward point berhasil";
                }else {
                    $response['response'] = 200;
                    $response['status'] = false;
                    $response['message'] = "Tukar ward point gagal";
                }
            }else {
                $response['response'] = 200;
                $response['status'] = false;
                $response['message'] = "Ward point anda tidak cukup";
            }
        }else {
            $response['response'] = 200;
            $response['status'] = false;
            $response['message'] = "User dan reward tidak ditemukan";
        }

    }else {

        //do something when false
        $response['response'] = 400;
        $response['status'] = false;
        $response['message'] = "Pastikan parameter anda terisi";
    }

    echo json_encode($response, JSON_PRETTY_PRINT);

?>
