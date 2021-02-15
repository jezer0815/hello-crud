
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

    <title>Request Page</title>

    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">

  </head>
  <body>

<?php 

  if(isset($_POST['update'])){

      $update = "UPDATE tblteacher SET firstname='$_POST[firstname]', middlename='$_POST[middlename]', lastname='$_POST[lastname]' WHERE autonumber='$_POST[update_id]'";
      $runupdate=mysqli_query($conn, $update);

  }

  if(isset($_POST['delete'])){
      $delete="DELETE FROM `tblteacher` WHERE autonumber = '$_POST[autonumber]'";
      $rundelete = mysqli_query($conn, $delete);
  }

  if(isset($_POST['saving'])){

        $insert="INSERT INTO `tblteacher` 
        (
        `firstname`, 
        `middlename`, 
        `lastname`
        ) 
        VALUES 
        (
        '$_POST[firstname]', 
        '$_POST[middlename]', 
        '$_POST[lastname]'
        )";
        $runinsert=mysqli_query($conn, $insert);
  }



  if(isset($_POST['searching'])){

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
                    $select="SELECT * FROM  tblteacher WHERE lastname LIKE '%$_POST[searchrecord]%'";
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
                                  <a href="index.php?update_id='.$rowselect['autonumber'].'">
                                    <button onclick="updaterecord()" class="btn btn-success btn-sm">Update</button>
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

              <?php echo'
          </tbody>
        </table>
    ';

  }




  if(isset($_POST['load'])){
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
                              

                                <button onclick="deleterecord(\''.$rowselect['autonumber'].'\')" class="btn btn-danger btn-sm">
                                    Delete
                                </button>

                          </td>
                          <td width="1%">
                                  <a href="index.php?update_id='.$rowselect['autonumber'].'">
                                    <button onclick="updaterecord()" class="btn btn-success btn-sm">Update</button>
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

    <?php echo'
          </tbody>
        </table>
    ';
  }


?>

  </body>
</html>