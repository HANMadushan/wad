<?php
session_start();
include "../connection.php";
$question_no = $_GET["questionno"];
$answer = "";
$ans = "";

if (isset($_SESSION["answer"][$question_no])) {
    $ans = $_SESSION["answer"][$question_no];
}

$res = mysqli_query($link, "SELECT * FROM questions WHERE category = '$_SESSION[exam_category]' AND question_no = $question_no");
$count = mysqli_num_rows($res);

if ($count == 0) {
    echo "over";
} else {
    while ($row = mysqli_fetch_array($res)) {
        $question_no = $row["question_no"];
        $question = $row["question"];
        $opt1 = $row["opt1"];
        $opt2 = $row["opt2"];
        $opt3 = $row["opt3"];
        $opt4 = $row["opt4"];
    }
?>

<br>
<table>
    <tr>
        <td style="font-weight: bold; font-size: 18px; padding-left: 5px" colspan="2">
            <?php echo "( " . $question_no . " ) " . $question; ?>
        </td>
    </tr>
</table>

<table style="margin-left: 20px">
    <tr>
        <td>
            <input type="radio" name="answer" id="opt1" value="<?php echo $opt1; ?>" onclick="radioclick(this.value, <?php echo $question_no; ?>)" <?php if ($ans == $opt1) echo "checked"; ?>>
            <label for="opt1"><?php echo $opt1; ?></label>
        </td>
    </tr>
    <tr>
        <td>
            <input type="radio" name="answer" id="opt2" value="<?php echo $opt2; ?>" onclick="radioclick(this.value, <?php echo $question_no; ?>)" <?php if ($ans == $opt2) echo "checked"; ?>>
            <label for="opt2"><?php echo $opt2; ?></label>
        </td>
    </tr>
    <tr>
        <td>
            <input type="radio" name="answer" id="opt3" value="<?php echo $opt3; ?>" onclick="radioclick(this.value, <?php echo $question_no; ?>)" <?php if ($ans == $opt3) echo "checked"; ?>>
            <label for="opt3"><?php echo $opt3; ?></label>
        </td>
    </tr>
    <tr>
        <td>
            <input type="radio" name="answer" id="opt4" value="<?php echo $opt4; ?>" onclick="radioclick(this.value, <?php echo $question_no; ?>)" <?php if ($ans == $opt4) echo "checked"; ?>>
            <label for="opt4"><?php echo $opt4; ?></label>
        </td>
    </tr>
</table>

<?php
}
?>
