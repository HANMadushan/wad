<?php
session_start();
include "connection.php";
$date = date("Y-m-d H:i:s");
$_SESSION["end_time"] = date("Y-m-d H:i:s", strtotime($date . "+ $_SESSION[exam_time] minutes"));
include "header.php";
?>
<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">
    <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
        <?php
        $correct = 0;
        $wrong = 0;

        if (isset($_SESSION["answer"])) {
            for ($i = 1; $i <= sizeof($_SESSION["answer"]); $i++) {
                $answer = "";
                $res = mysqli_query($link, "SELECT * FROM questions WHERE category = '$_SESSION[exam_category]' AND question_no = $i");
                while ($row = mysqli_fetch_array($res)) {
                    $answer = trim(strtolower($row["answer"]));  // Convert correct answer to lowercase and trim
                }

                if (isset($_SESSION["answer"][$i])) {
                    $user_answer = trim(strtolower($_SESSION["answer"][$i]));  // Convert user answer to lowercase and trim

                    if ($answer == $user_answer) {
                        $correct++;
                    } else {
                        $wrong++;
                    }
                } else {
                    $wrong++;
                }
            }
        }

        $count = 0;
        $res = mysqli_query($link, "SELECT * FROM questions WHERE category = '$_SESSION[exam_category]'");
        $count = mysqli_num_rows($res);
        $wrong = $count - $correct;

        echo "<br><br>";
        echo "<center>";
        echo "Total Questions = " . $count;
        echo "<br>";
        echo "Correct Answers = " . $correct;
        echo "<br>";
        echo "Wrong Answers = " . $wrong;
        echo "</center>";
        ?>
    </div>
</div>

<?php
if (isset($_SESSION["exam_start"])) {
    $date = date("Y-m-d");
    mysqli_query($link, "INSERT INTO exam_results (id, username, exam_type, total_question, correct_answer, wrong_answer, exam_time) VALUES (NULL, '$_SESSION[username]', '$_SESSION[exam_category]', '$count', '$correct', '$wrong', '$date')");
}

if (isset($_SESSION["exam_start"])) {
    unset($_SESSION["exam_start"]);
    ?>
    <script type="text/javascript">
        // Clear selected answers when the page is reloaded
        window.location.href = window.location.href;
    </script>
    <?php
}
?>
<?php
include "footer.php";
?>
