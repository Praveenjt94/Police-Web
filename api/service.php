<?php

if (isset($_POST['login'])) {
    // do login process
    include_once('../backend/dbConnect.php');
    $sql = "SELECT u.*,p.type FROM users u, police_officer p WHERE p.officer_id = '" . $_POST['officer_id'] . "' AND u.password = '" . $_POST['password'] . "' GROUP BY u.id";
    $results = $conn->query($sql);
    if ($results->num_rows > 0) {
        $row = $results->fetch_assoc();
        // start login session
        session_start();
        $_SESSION['logged_user'] = $row;
        if ($row['type'] == "admin") {
            header('Location: ../index.php');
        } else {
            header('Location: ../profile.php');
        }
    } else {
        echo "Login Check failed";
        header('Location: ../login.php');
    }
    $conn->close();
} else if (isset($_POST['register'])) {
    // do registration process
    include_once('../backend/dbConnect.php');
    $sql = "INSERT INTO users(name,nic,telephone,email,password,created_at) VALUES('" . $_POST['name'] . "','" . $_POST['nic'] . "','" . $_POST['telephone'] . "','" . $_POST['email'] . "','" . $_POST['officer_id'] . "', NOW())";
    if ($conn->query($sql)) {
        $user_id = $conn->insert_id; // holds inserted user id
        $sql = "INSERT INTO police_officer(user_id,officer_id,type) VALUES(" . $user_id . "," . $_POST['officer_id'] . ",'" . $_POST['user_type'] . "')";
        if ($conn->query($sql)) {
            echo "Officer Added";
        } else {
            echo "Officer Save Failed";
        }
    } else {
        echo "Query Faild";
    }
    $conn->close();
    header('Location: ../officers.php');
} else if (isset($_GET{'logout'})) {
    // do logout process
    session_start();
    unset($_SESSION);
    session_destroy();
    header('Location: ../login.php');
}

?>