
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

    <title>Teacher</title>

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

        </nav>


<div class="container">
      <hr>
        <h4>TEACHER MANAGEMENT</h4>
      <hr>  
</div>

<div class="container">
  <div class="row">
    <div class="col-sm">

    </div>

    <div class="col-sm">
      
        <form action="index.php" method="POST">
          <div class="form-group">
            <label for="exampleInputEmail1">First Name</label>
            <input type="text" class="form-control" name="firstname" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Middle Name</label>
            <input type="text" class="form-control" name="middlename" id="exampleInputPassword1">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Last Name</label>
            <input type="text" class="form-control" name="lastname" id="exampleInputPassword1">
          </div>
          <button name="submit" type="submit" class="btn btn-primary">Save</button>
        </form>

    </div>
    <div class="col-sm">
    </div>


  </div>
  <div class="row">
      <div class="col-lg-12">
          <hr>

            <form action="index.php" class="form-inline my-2 my-lg-0" method="POST">
              <input name="mysearch" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" name="submitsearch" type="submit">Search</button>
            </form>
          <hr>

<?php 
    //checking search submit button
  if(isset($_POST['submitsearch'])){
    
    echo 
    '
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Firstname</th>
              <th scope="col">Middle Name</th>
              <th scope="col">Lastname</th>
              <th>Action</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
      '; ?>
            <?php 
                $select="SELECT * FROM  tblteacher WHERE lastname LIKE '%$_POST[mysearch]%'";
                $runselect=mysqli_query($conn, $select);
                $count=0;
                while($rowselect=mysqli_fetch_assoc($runselect)){
                    echo '
                        <tr>
                          <th scope="row">'.++$count.'</th>
                          <td>'.$rowselect['firstname'].'</td>
                          <td>'.$rowselect['middlename'].'</td>
                          <td>'.$rowselect['lastname'].'</td>
                          <td width="1%">
                              <a href="index.php?delete_id='.$rowselect['autonumber'].'">
                                <button class="btn btn-danger btn-sm">Delete</button>
                              </a>
                          </td>
                          <td width="1%">
                              <a href="update.php?update_id='.$rowselect['autonumber'].'">
                                <button class="btn btn-success btn-sm">Update</button>
                              </a>
                          </td>
                        </tr>
                    ';
                }
            ?>
    <?php echo
    '    
          </tbody>
        </table>
    ';

  }else{

    echo 
    '
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Firstname</th>
              <th scope="col">Middle Name</th>
              <th scope="col">Lastname</th>
              <th>Action</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
      '; ?>
            <?php 
                $select="SELECT * FROM  tblteacher";
                $runselect=mysqli_query($conn, $select);
                $count=0;
                while($rowselect=mysqli_fetch_assoc($runselect)){
                    echo '
                        <tr>
                          <th scope="row">'.++$count.'</th>
                          <td>'.$rowselect['firstname'].'</td>
                          <td>'.$rowselect['middlename'].'</td>
                          <td>'.$rowselect['lastname'].'</td>
                          <td width="1%">
                              <a href="index.php?delete_id='.$rowselect['autonumber'].'">
                                <button class="btn btn-danger btn-sm">Delete</button>
                              </a>
                          </td>
                          <td width="1%">
                              <a href="update.php?update_id='.$rowselect['autonumber'].'">
                                <button class="btn btn-success btn-sm">Update</button>
                              </a>
                          </td>
                          <td width="1%" style="white-space:nowrap">
                              <a href="addstudents.php?instructor_id='.$rowselect['autonumber'].'">
                                <button class="btn btn-success btn-sm">ADD STUDENT</button>
                              </a>
                          </td>

                        </tr>
                    ';
                }
            ?>
    <?php echo
    '    
          </tbody>
        </table>
    ';

  }

?>




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