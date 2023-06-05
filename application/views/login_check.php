<?php
if (trim($_POST["login"]) != "" && trim($_POST["password"]) != "") {

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $login = mysqli_real_escape_string($conn, $_POST["login"]);
    $password = sha1($_POST["password"]);

    $sql = "SELECT *
            FROM users
            WHERE login = '$login' AND password = '$password'";

    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($_POST["login"] === $row["login"] && $password === $row["password"]) {
                $_SESSION["login"] = $_POST["login"];
                $_SESSION["user_id"] = $row["id"];
                $_SESSION["id"] = 5;
                header("Location:/main");
                exit;
            }
        }
    } else {
        header("Location:/login");
        exit;
    }
} else {
    header("Location:/login");
    exit;
}

mysqli_close($conn);
?>