<?php

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
} else if (isset($request->action) && $request->action == "save_fine") {
    // do login process
    include_once('../backend/dbConnect.php');
    if ($request->type == "officer") {
        // police officer login
        $sql = "SELECT * FROM driver WHERE driver_id = '" . $request->fine->driver_data->driver_no . "'";
        $results = $conn->query($sql);
        if ($results->num_rows > 0) {
            // driver found
            $driver = $results->fetch_assoc();
            $sql = "INSERT INTO fine(driver_id,officer_id,vehicle_no,date_of_offence,time,location,fine_rule_id,valid_from,valid_to,court,court_date,police_station) VALUES(" . $driver['id'] . "," . $request->fine->officer_data->id . ",'" . $request->fine->vehicle_no . "','" . $request->fine->date_of_offence . "','" . $request->fine->time . "','" . $request->fine->location . "','" . $request->fine->category->id . "','" . $request->fine->valid_from . "','" . $request->fine->valid_to . "','" . $request->fine->court . "','" . $request->fine->court_date . "','" . $request->fine->police_station . "')";
            if ($conn->query($sql)) {
                // deduct points
                $sql = "UPDATE driver SET points_count = points_count - " . $request->fine->category->points . " WHERE driver_id = '" . $request->fine->driver_data->driver_no . "'";
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
            $sql = "INSERT INTO users(name,password,created_at) VALUES('" . $request->fine->driver_data->fname . " " . $request->fine->driver_data->lname . "','" . $request->fine->driver_data->driver_no . "',NOW())";
            if ($conn->query($sql)) {
                // 2. create driver
                $user_id = $conn->insert_id; // holds inserted user id
                $sql = "INSERT INTO driver(user_id, driver_id, points_count) VALUES(" . $user_id . ",'" . $request->fine->driver_data->driver_no . "',25)";
                if ($conn->query($sql)) {
                    // driver found
                    $driver_id = $conn->insert_id;
                    $sql = "INSERT INTO fine(driver_id,officer_id,vehicle_no,date_of_offence,time,location,fine_rule_id,valid_from,valid_to,court,court_date,police_station) VALUES(" . $driver_id . "," . $request->fine->officer_data->id . ",'" . $request->fine->vehicle_no . "','" . $request->fine->date_of_offence . "','" . $request->fine->time . "','" . $request->fine->location . "','" . $request->fine->category->id . "','" . $request->fine->valid_from . "','" . $request->fine->valid_to . "','" . $request->fine->court . "','" . $request->fine->court_date . "','" . $request->fine->police_station . "')";
                    if ($conn->query($sql)) {
                        // deduct points
                        $sql = "UPDATE driver SET points_count = points_count - " . $request->fine->category->points . " WHERE driver_id = '" . $request->fine->driver_data->driver_no . "'";
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
    }
    header('Content-Type: application/json');
    $conn->close();
    echo json_encode($res);
} else if (isset($request->action) && $request->action == "get_dashboard_stats") {
    // do login process
    include_once('../backend/dbConnect.php');
    if ($request->type == "officer") {
        // police officer
        $sql = "SELECT * FROM fine WHERE officer_id = " . $request->officer_id;
        $results = $conn->query($sql);
        if ($results->num_rows > 0) {
            $res['data'] = array();
            $revenue = 0;
            while ($row = $results->fetch_assoc()) {
                $revenue += 250;
            }
            $res['data']['fine_count'] = $results->num_rows;
            $res['data']['revenue'] = $revenue;
            $res['status'] = 'SUCCESS';
        } else {
            $res['status'] = 'FAILED';
        }
    } else {
        // driver
        $sql = "SELECT * FROM fine WHERE driver_id = " . $request->driver_id;
        $results = $conn->query($sql);
        if ($results->num_rows > 0) {
            $res['data'] = array();
            $revenue = 0;
            while ($row = $results->fetch_assoc()) {
                $revenue += 250;
            }
            $res['data']['fine_count'] = $results->num_rows;
            $res['data']['revenue'] = $revenue;
            $res['status'] = 'SUCCESS';
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
}

?>