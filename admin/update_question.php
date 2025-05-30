<?php
    if(isset($_POST["submit1"]))
    {
        mysqli_query($link,"update questions set question='$_POST[question]',opt1='$_POST[opt1]',opt2='$_POST[opt2]',opt3='$_POST[opt3]',opt4='$_POST[opt4]',answer='$_POST[answer]' where id=$id");

        ?>
        <script type="text/javascript">
                window.location="add_edit_questions.php?id=<?php echo $id ?>";
            </script>
<?php
    }
?>