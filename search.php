<?php
include 'connection.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search account details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="icon" type="image/x-icon" href="./image/PGB.png">

</head>

<body>
<form method="post">
        <div class="container register mt-lg-5">
            <div class="row">
                <div class="col-md-3 register-left">
                    <img src="image/PGB.png" alt="" />
                    <h3>Dakshin Bihar Gramin bank</h3>
                    <p>You can search Account holder details </p>
                    <a href="insert.php" class="cal">Register account</a>
                </div>
                
                <div class="col-md-9 register-right">                    
                        <h3 class="register-heading">Enter Account No</h3>
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="ac_no" class="form-control"
                                        placeholder="Enter Account no *" required  maxlength="14" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;"/>
                                </div>
                                <?php
                                if(isset($_POST['search'])){
                                    $ac_no = $_POST['ac_no'];
                                    $sql="select * from `sheet` where ac_no = $ac_no";
                                    $result=mysqli_query($conn,$sql);
                                    
                                    $row=mysqli_fetch_assoc($result);
                                    if($row){
                                    $ac_no = $row['ac_no'];
                                    $name= $row['name'];                                                                    
                                    echo '<a href="calculate.php?ac_no='.$ac_no.'" class="text-decoration-none font-weight-bold text-info">'.$name.'                             
                                    <span class="btn btn-primary mt-2">View Details </span></a>';
                                    } else echo '<h4 class="text-danger">Account Details Not found</h4>';
                                }
                                ?>          
                            </div>
                            <div class="col-md-6">
                            <button class="btn btn-primary" name="search">Search </button> 
                                                     
                                
                            </div>
                        </div>
                    
                </div>
                
            </div>
        </div>
</form>

</body>

</html>