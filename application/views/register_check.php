<?php
if (trim($_POST["login"]) != "" && trim($_POST["password"]) != "") {
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $login = mysqli_real_escape_string($conn, $_POST["login"]);
    $password = sha1($_POST["password"]);
    $sql = "INSERT INTO users (login, password)
            VALUES('$login', '$password')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION["login"] = $_POST["login"];
    } else {
        header("Location:/register");
        exit;
    }

    $sql = "SELECT *
            FROM users
            WHERE login = '$login' AND password = '$password'";

    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($_SESSION["login"] === $row["login"]) {
                $_SESSION["user_id"] = $row["id"];
                header("Location:/main");
                exit;
            }
        }
    } else {
        header("Location:/register");
        exit;
    }
} else {
    header("Location:/register");
    exit;
}

mysqli_close($conn);
?>