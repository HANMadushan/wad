<?php
session_start();
include "header.php";
include "../connection.php";

if(!isset($_SESSION["admin"]))
{
    ?>
    <script type="text/javascript">
        window.location="index.php";
    </script>
    <?php
}

?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add Exam</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <form name="formal" action="add_exam_category.php" method="post">
                            <div class="card-body">
                            <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header"><strong>Add Exam Categories</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label">New Exam Category</label><input type="text" name="examname" placeholder="Add Exam Category" class="form-control"></div>
                                <div class="form-group"><label for="vat" class=" form-control-label">Exam Time In Minutes</label><input type="text" placeholder="Exam Time In Minutes" class="form-control" name="examtime"></div>
                                <div class="form-group">

                                    <input type="submit" name="submit1" value="Add Exam" class="btn btn-success">
                                </div>
                            </div>
                        </div> 

                    </div>


                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Exam Category</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Exam Name</th>
                                            <th scope="col">Exam Time</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $count=0;
                                    $res=mysqli_query($link,"select * from exam_category");
                                    while($row=mysqli_fetch_array($res))
                                    {
                                        $count=$count+1;
                                      ?>
                                      <tr>
                                            <th scope="row"><?php echo $count; ?></th>
                                            <td><?php echo $row["category"]; ?></td>
                                            <td><?php echo $row["exam_time_in_minutes"]; ?></td>
                                            <td><a href="edit_exam.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
                                            <td><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
                                        </tr>
                                      <?php  
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                
                 </div>
                </form>
                </div>  
             </div>
             </div>
             </div>
             </div>



     <?php
     include "footer.php";
     
     ?>
