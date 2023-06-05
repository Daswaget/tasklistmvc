<?php
if ($_SESSION["login"] == "") {
    echo
        "<div class='block3'>
            <h5 style='margin-top: 12px;'><a href='/register'>Регистрация</a></h5>
            <h5><a href='/login'>Вход</a></h5>
        </div>";
} else {
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $login = $_SESSION["login"];
    $user_id = $_SESSION["user_id"];

    $sql = "SELECT *
        FROM tasks
        WHERE user_id = '$user_id'";

    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($user_id === $row["user_id"]) {
                $id = $row["id"];
                if (isset($_POST["u$id"])) {
                    $sql = "UPDATE tasks
                        SET status='0'
                        WHERE id='$id' AND user_id='$user_id'";
                    mysqli_query($conn, $sql);
                    mysqli_close($conn);
                    header("Location:/main");
                    exit;
                }
                if (isset($_POST["r$id"])) {
                    $sql = "UPDATE tasks
                        SET status='1'
                        WHERE id='$id' AND user_id='$user_id'";
                    mysqli_query($conn, $sql);
                    mysqli_close($conn);
                    header("Location:/main");
                    exit;
                }
                if (isset($_POST["ready_all"])) {
                    $sql = "UPDATE tasks
                        SET status='1'
                        WHERE user_id='$user_id'";
                    mysqli_query($conn, $sql);
                    mysqli_close($conn);
                    header("Location:/main");
                    exit;
                }
                if (isset($_POST["d$id"])) {
                    $sql = "DELETE FROM tasks
                        WHERE ID = $id AND user_id='$user_id'";
                    mysqli_query($conn, $sql);
                    mysqli_close($conn);
                    header("Location:/main");
                    exit;
                }
                if (isset($_POST["remove_all"])) {
                    $sql = "DELETE FROM tasks
                        WHERE user_id='$user_id'";
                    mysqli_query($conn, $sql);
                    mysqli_close($conn);
                    header("Location:/main");
                    exit;
                }
            }
        }
    }

    echo "<div class='block4'><div class='text3'>Здравствуйте, " . htmlspecialchars("$login") . "!</div>
        <div class='text4'><a href='/logout_check'>Выйти</a></div></div>
        <div class='block2'>" .
        '<form action="/task_check" method="post">
            <textarea type="text" name="description" placeholder="Enter text..." class="textarea"></textarea>
            <button type="submit" class="button">ADD TASK</button>
        </form>' .
        '<form method="post">
            <input type="submit" name="remove_all" value="REMOVE ALL" class="button2" />
             <input type="submit" name="ready_all" value="READY ALL" class="button3" />
        </form>' .
        "</div>";

    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($user_id === $row["user_id"]) {
                $id = $row["id"];
                $description = $row["description"];
                $text = htmlspecialchars("$description");
                echo "<div class='block2'>" . "<p class='text'>$text</p>";
                echo '<form method="post">';
                if ($row["status"] === "1")
                    echo "<input type='submit' name=\"u$id\" value='UNREADY' class='button4' /><div class='green_circle'><div class='white_circle'></div></div>";
                if ($row["status"] === "0")
                    echo "<input type='submit' name=\"r$id\" value='READY' class='button4' /><div class='red_circle'><div class='white_circle'></div></div>";
                echo "<input type='submit' name=\"d$id\" value='DELETE' class='button5' />";
                echo '</form>';
                echo "</div>";
            }
        }
    }
}
?>