<?php
if (trim($_POST["description"]) != "") {
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $login = mysqli_real_escape_string($conn, $_SESSION["login"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);

    $sql = "SELECT *
            FROM users
            WHERE login = '$login'";

    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($_SESSION["login"] === $row["login"]) {
                $user_id = $row["id"];
            }
        }
    }

    $sql = "INSERT INTO tasks (user_id, description, status)
            VALUES('$user_id', '$description', '0')";

    if (mysqli_query($conn, $sql)) {
        header("Location:/main");
        exit;
    }
} else {
    header("Location:/main");
    exit;
}
mysqli_close($conn);
?>