
<?php  
    include 'db.php';


//CRUD
//C - Create (Insert)
//R - Retreive/d (Select)
//U - Update (Modify/Alter)
//D - Delete (Remove)

?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Summary</title>

    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">

  </head>
  <body>
 
<?php 
  

    //this code is for delete using the autonumber fields as unique 
    if(isset($_GET['delete_id'])){
      //code goes here for delete
      $delete="DELETE FROM `tblteacher` WHERE autonumber = '$_GET[delete_id]'";
      $rundelete = mysqli_query($conn, $delete);
    }

    //this code is for inserting records to table 'tblteacher'
    if(isset($_POST['submit'])){
        $insert="INSERT INTO `tblteacher` (`firstname`, `middlename`, `lastname`) VALUES ('$_POST[firstname]', '$_POST[middlename]', '$_POST[lastname]')";
        $runinsert=mysqli_query($conn, $insert);
    }

 ?>


        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#">First Project</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
            </ul>
          </div>

        </nav>


<div class="container">
      <hr>
        <h4>SUMMARY</h4>
      <hr>  
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      
      <table class="table table-bordered table-sm">
        <thead>
          <th>#</th>
          <th>Teachers Name</th>
        </thead>
        <tbody>
<?php 

    $getteacher="SELECT * FROM tblteacher";
    $runteacher = mysqli_query($conn, $getteacher);
    $count=0;
    while($rowteacher = mysqli_fetch_assoc($runteacher)){
      echo 
      '
          <tr>
            <td width="1%" class="text-right">'.++$count.'.</td>
            <td>'.strtoupper($rowteacher['lastname']).', '.strtoupper($rowteacher['firstname']).' '.strtoupper($rowteacher['middlename']).'</td>
          </tr>
          

      ';?>
<?php 
    $getstudent = "SELECT * FROM tblstudent WHERE instructorid='$rowteacher[autonumber]'";
    $rungetstudent = mysqli_query($conn, $getstudent);
    $studentcount=0;
    while($rowstudent = mysqli_fetch_assoc($rungetstudent)){
      echo '
      <tr style="background-color:#A3E4D7">
            <td width="1%">'.++$studentcount.'.</td>
            <td>'.strtoupper($rowstudent['lastname']).', '.strtoupper($rowstudent['firstname']).' '.strtoupper($rowstudent['middlename']).'</td>
       </tr>
      ';
    }
  
?>
      <?php echo
      '

            
         
      ';
    }
?>


        </tbody>  
      </table>

    </div>
  </div>
</div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script>

</script>
  
  </body>
</html>