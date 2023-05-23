<?php
// session_start();
include('config.php');
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = $connection->prepare("SELECT * FROM users WHERE username=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        setcookie('user', '', time() - 3600);
        if ($username && $password) {
            echo -1;
        } else
            echo 0;
    } else {
        if (password_verify($password, $result['password'])) {
            // $_COOKIE['user_id'] = $result['id'];
            setcookie('user', serialize(['name' => $result['name'], 'birth_date' => $result['birth_date'], 'photo' => $result['photo']]), time() + 3600);
            header('Content-type: application/json');
            echo json_encode($result);
        } else {
            setcookie('user', '', time() - 3600);
            echo -1;
        }
    }
}
