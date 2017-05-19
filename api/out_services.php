<?php

// get only fine save
if (isset($_POST['action']) && $_POST['action'] == "save_fine") {
    // save image
    $info = pathinfo($_FILES['file']['name']);
    $ext = $info['extension']; // get the extension of the file
    $image_save_name = "fine_" . uniqid() . "." . $ext;

    $target = '../assets/images/' . $image_save_name;
    move_uploaded_file($_FILES['file']['tmp_name'], $target);

    $request = $_POST['fine'];

    include_once('../backend/dbConnect.php');
    // police officer login
    $sql = "SELECT * FROM driver WHERE driver_id = '" . $request['driver_data']['driver_no'] . "'";
    $results = $conn->query($sql);
    if ($results->num_rows > 0) {
        // driver found
        $driver = $results->fetch_assoc();
        $sql = "INSERT INTO fine(driver_id,officer_id,vehicle_no,date_of_offence,time,location,fine_rule_id,valid_from,valid_to,court,court_date,police_station,image_path,acc_type,province) VALUES(" . $driver['id'] . "," . $request['officer_data']['id'] . ",'" . $request['vehicle_no'] . "','" . $request['date_of_offence'] . "','" . $request['time'] . "','" . $request['location'] . "','" . $request['category']['id'] . "','" . $request['valid_from'] . "','" . $request['valid_to'] . "','" . $request['court'] . "','" . $request['court_date'] . "','" . $request['police_station'] . "','" . $image_save_name . "','" . $request['acc_type'] . "','" . $request['province'] . "')";
        if ($conn->query($sql)) {
            // deduct points
            $sql = "UPDATE driver SET points_count = points_count - " . $request['category']['points'] . " WHERE driver_id = '" . $request['driver_data']['driver_no'] . "'";
            if ($conn->query($sql)) {
                $res['status'] = 'SUCCESS';
            } else {
                $res['status'] = 'FAILED';
            }
        } else {
            $res['status'] = 'FAILED';
        }
    } else {
        // no driver found.. add new driver
        // 1. create user
        $sql = "INSERT INTO users(name,password,created_at) VALUES('" . $request['driver_data']['fname'] . " " . $request['driver_data']['lname'] . "','" . $request['driver_data']['driver_no'] . "',NOW())";
        if ($conn->query($sql)) {
            // 2. create driver
            $user_id = $conn->insert_id; // holds inserted user id
            $sql = "INSERT INTO driver(user_id, driver_id, points_count) VALUES(" . $user_id . ",'" . $request['driver_data']['driver_no'] . "',25)";
            if ($conn->query($sql)) {
                // driver found
                $driver_id = $conn->insert_id;
                $sql = "INSERT INTO fine(driver_id,officer_id,vehicle_no,date_of_offence,time,location,fine_rule_id,valid_from,valid_to,court,court_date,police_station,image_path,acc_type,province) VALUES(" . $driver_id . "," . $request['officer_data']['id'] . ",'" . $request['vehicle_no'] . "','" . $request['date_of_offence'] . "','" . $request['time'] . "','" . $request['location'] . "','" . $request['category']['id'] . "','" . $request['valid_from'] . "','" . $request['valid_to'] . "','" . $request['court'] . "','" . $request['court_date'] . "','" . $request['police_station'] . "','" . $image_save_name . "','" . $request['acc_type'] . "','" . $request['province'] . "')";
                if ($conn->query($sql)) {
                    // deduct points
                    $sql = "UPDATE driver SET points_count = points_count - " . $request['category']['points'] . " WHERE driver_id = '" . $request['driver_data']['driver_no'] . "'";
                    if ($conn->query($sql)) {
                        $res['status'] = 'SUCCESS';
                    } else {
                        $res['status'] = 'FAILED';
                    }
                } else {
                    $res['status'] = 'FAILED';
                }
            } else {
                $res['status'] = 'FAILED';
            }
        } else {
            $res['status'] = 'FAILED';
        }
    }

    header('Content-Type: application/json');
    $conn->close();
    echo json_encode($res);
} else {
    // get post data
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);

    if (isset($request->action) && $request->action == "login") {
        // do login process
        include_once('../backend/dbConnect.php');
        if ($request->type == "driver") {
            // driver login
            $sql = "SELECT u.*,d.id as d_id,d.points_count FROM users u, driver d WHERE d.driver_id = '" . $request->username . "' AND d.user_id = u.id AND u.password = '" . $request->password . "' GROUP BY u.id";
            $results = $conn->query($sql);
            if ($results->num_rows > 0) {
                $res['data'] = $results->fetch_assoc();
                $res['status'] = 'SUCCESS';
            } else {
                $res['status'] = 'FAILED';
            }
        } else {
            // police officer login
            $sql = "SELECT u.*,p.type FROM users u, police_officer p WHERE p.officer_id = '" . $request->username . "' AND p.user_id = u.id AND u.password = '" . $request->password . "' GROUP BY u.id";
            $results = $conn->query($sql);
            if ($results->num_rows > 0) {
                $res['data'] = $results->fetch_assoc();
                $res['status'] = 'SUCCESS';
            } else {
                $res['status'] = 'FAILED';
            }
        }
        header('Content-Type: application/json');
        $conn->close();
        echo json_encode($res);
    } else if (isset($request->action) && $request->action == "search_driver") {
        // do login process
        include_once('../backend/dbConnect.php');
        if ($request->type == "officer") {
            // police officer login
            $sql = "SELECT * FROM dmc m WHERE m.driver_no = '" . $request->driver_id . "'";
            $results = $conn->query($sql);
            if ($results->num_rows > 0) {
                $res['data'] = $results->fetch_assoc();
                $res['status'] = 'SUCCESS';
            } else {
                $res['status'] = 'FAILED';
            }
        }
        header('Content-Type: application/json');
        $conn->close();
        echo json_encode($res);
    } else if (isset($request->action) && $request->action == "get_fine_rules") {
        // do login process
        include_once('../backend/dbConnect.php');
        if ($request->type == "officer") {
            // police officer login
            $sql = "SELECT * FROM fine_rules";
            $results = $conn->query($sql);
            if ($results->num_rows > 0) {
                $res['data'] = array();
                while ($row = $results->fetch_assoc()) {
                    array_push($res['data'], $row);
                }
                $res['status'] = 'SUCCESS';
            } else {
                $res['status'] = 'FAILED';
            }
        }
        header('Content-Type: application/json');
        $conn->close();
        echo json_encode($res);
    } else if (isset($request->action) && $request->action == "get_dashboard_stats") {
        // do login process
        include_once('../backend/dbConnect.php');
        if ($request->type == "officer") {
            // load rules
            $rules = array();
            $sql = "SELECT * FROM fine_rules";
            $results = $conn->query($sql);
            if ($results->num_rows > 0) {
                $res['data'] = array();
                while ($row = $results->fetch_assoc()) {
                    $rules[$row['id']] = $row['points'];
                }
                $res['status'] = 'SUCCESS';
            } else {
                $res['status'] = 'FAILED';
            }


            // police officer
            $sql = "SELECT * FROM fine WHERE officer_id = " . $request->officer_id;
            $results = $conn->query($sql);
            if ($results->num_rows > 0) {
                $res['data'] = array();
                $res['data']['fines'] = array();
                $revenue = 0;
                while ($row = $results->fetch_assoc()) {
                    $revenue += $rules[$row['fine_rule_id']];
                    array_push($res['data']['fines'], $row);
                }
                $res['data']['fine_count'] = $results->num_rows;
                $res['data']['revenue'] = $revenue * 150;
                $res['data']['rules'] = $rules;
                $res['status'] = 'SUCCESS';
            } else {
                $res['status'] = 'FAILED';
            }
        } else {
            // load rules
            $rules = array();
            $sql = "SELECT * FROM fine_rules";
            $results = $conn->query($sql);
            if ($results->num_rows > 0) {
                $res['data'] = array();
                while ($row = $results->fetch_assoc()) {
                    $rules[$row['id']] = $row['points'];
                }
                $res['status'] = 'SUCCESS';
            } else {
                $res['status'] = 'FAILED';
            }

            // driver
            $sql = "SELECT * FROM fine WHERE driver_id = " . $request->driver_id;
            $results = $conn->query($sql);
            if ($results->num_rows > 0) {
                $res['data'] = array();
                $revenue = 0;
                while ($row = $results->fetch_assoc()) {
                    $revenue += $rules[$row['fine_rule_id']];
                }
                $res['data']['fine_count'] = $results->num_rows;
                $res['data']['revenue'] = $revenue;

                $sql = "SELECT points_count FROM driver WHERE id = " . $request->driver_id;
                $results = $conn->query($sql);
                if ($results->num_rows > 0) {
                    $res['data']['points_count'] = $results->fetch_assoc()['points_count'];
                    $res['status'] = 'SUCCESS';
                } else {
                    $res['status'] = 'FAILED';
                }
            } else {
                $res['status'] = 'FAILED';
            }
        }
        header('Content-Type: application/json');
        $conn->close();
        echo json_encode($res);
    } else if (isset($request->action) && $request->action == "get_fines") {
        // do login process
        include_once('../backend/dbConnect.php');
        if ($request->type == "officer") {
            // police officer
        } else {
            // driver
            $sql = "SELECT * FROM fine WHERE driver_id = " . $request->driver_id;
            $results = $conn->query($sql);
            if ($results->num_rows > 0) {
                $res['data'] = array();
                while ($row = $results->fetch_assoc()) {
                    array_push($res['data'], $row);
                }
                $res['status'] = 'SUCCESS';
            } else {
                $res['status'] = 'FAILED';
            }
        }
        header('Content-Type: application/json');
        $conn->close();
        echo json_encode($res);
    } else if (isset($request->action) && $request->action == "get_notifications") {
        include_once('../backend/dbConnect.php');
        if ($request->type == "officer") {
            // police officer
            $sql = "SELECT message FROM notifications WHERE officer = 1";
            $results = $conn->query($sql);
            if ($results->num_rows > 0) {
                $res['data'] = array();
                while ($row = $results->fetch_assoc()) {
                    array_push($res['data'], $row);
                }
                $res['status'] = 'SUCCESS';
            } else {
                $res['status'] = 'FAILED';
            }
        } else {
            // driver
            $sql = "SELECT message FROM notifications WHERE driver = 1";
            $results = $conn->query($sql);
            if ($results->num_rows > 0) {
                $res['data'] = array();
                while ($row = $results->fetch_assoc()) {
                    array_push($res['data'], $row);
                }
                $res['status'] = 'SUCCESS';
            } else {
                $res['status'] = 'FAILED';
            }
            // get fine rules
            $fine_rules = array();
            $sql = 'SELECT * FROM fine_rules';
            $results = $conn->query($sql);
            if ($results->num_rows > 0) {
                $fine_rules = array();
                while ($row = $results->fetch_assoc()) {
                    $fine_rules[$row['id']] = $row['rule'];
                }
                $res['status'] = 'SUCCESS';
            } else {
                $res['status'] = 'FAILED';
            }
            // get fine deadlines
            $sql = 'SELECT f.`fine_rule_id`,f.`valid_to` FROM driver d, fine f WHERE d.`user_id` = ' . $request->user_id . ' AND f.`driver_id` = d.`id`';
            $results = $conn->query($sql);
            if ($results->num_rows > 0) {
                $res['fines'] = array();
                while ($row = $results->fetch_assoc()) {
                    $row['fine_rule'] = $fine_rules[$row['fine_rule_id']];
                    array_push($res['fines'], $row);
                }
                $res['status'] = 'SUCCESS';
            } else {
                $res['status'] = 'FAILED';
            }
        }
        header('Content-Type: application/json');
        $conn->close();
        echo json_encode($res);
    } else if (isset($request->action) && $request->action == "pay_fine") {
        include_once('../backend/dbConnect.php');
        $sql = "DELETE FROM fine WHERE id = " . $request->fine_id;
        if ($conn->query($sql)) {
            $res['status'] = 'SUCCESS';
        } else {
            $res['status'] = 'FAILED';
        }
        header('Content-Type: application/json');
        $conn->close();
        echo json_encode($res);
    }
}

?>