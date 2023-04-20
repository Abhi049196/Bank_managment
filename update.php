<?php
include 'connection.php';
 $ac_no = $_GET['ac_no'];
 $sql="select * from `sheet` where ac_no = $ac_no";
 $result=mysqli_query($conn,$sql);
 $row=mysqli_fetch_assoc($result);
    $region = $row['region'];
    $sol_id = $row['sol_id'];
    $branch = $row['branch'];
    $cust_id = $row['cust_id'];
    $ac_no = $row['ac_no'];
    $name = $row['name'];
    $schm_code = $row['schm_code'];
    $eff_main_classification = $row['eff_main_classification'];
    $eff_sub_classification = $row['eff_sub_classification'];
    $category = $row['category'];
    $doa = $row['doa'];
    $eff_npa_date = $row['eff_npa_date'];
    $sanction_limit = $row['sanction_limit'];
    $drwng_power = $row['drwng_power'];
    $bal_os = $row['bal_os'];
    $di_352crore = $row['di_352crore'];
    $net_5578 = $row['net_5578'];
    $provsion = $row['provsion'];
    $provosion = $row['provosion'];

    if(isset($_POST['update'])){
        $region = $_POST['region'];
        $sol_id = $_POST['sol_id'];
        $branch = $_POST['branch'];
        $cust_id = $_POST['cust_id'];        
        $name = $_POST['name'];
        $schm_code = $_POST['schm_code'];
        $eff_main_classification = $_POST['eff_main_classification'];
        $eff_sub_classification = $_POST['eff_sub_classification'];
        $category = $_POST['category'];
        $doa = $_POST['doa'];
        $eff_npa_date = $_POST['eff_npa_date'];
        $sanction_limit = $_POST['sanction_limit'];
        $drwng_power = $_POST['drwng_power'];
        $bal_os = $_POST['bal_os'];
        $di_352crore = $_POST['di_352crore'];
        $net_5578 = $_POST['net_5578'];
        $provsion = $_POST['provsion'];
        $provosion = $_POST['provosion'];
        $sql="update `sheet` set region='$region',sol_id='$sol_id',branch='$branch',cust_id='$cust_id',name='$name',schm_code='$schm_code',eff_main_classification='$eff_main_classification',eff_sub_classification='$eff_sub_classification',category='$category',doa='$doa',eff_npa_date='$eff_npa_date',sanction_limit='$sanction_limit',drwng_power='$drwng_power',bal_os='$bal_os',di_352crore='$di_352crore',net_5578='$net_5578',provsion='$provsion',provosion='$provosion' where ac_no='$ac_no'";
        $result=mysqli_query($conn,$sql);
        if($result){        
            header('location:success.php');
        }else{
            die(mysqli_die($conn));
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update account details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="./css/bootstrap.css">
</head>

<body>
    <form action="" method="POST">
        <div class="container register">
            <div class="row">
                <div class="col-md-3 register-left">
                    <img src="image/PGB.png" alt="" />
                    <h3>Dakshin Bihar Gramin bank</h3>
                    <p>DBGB RO JAMUI Compromise Calculator </p>
                    <a href="search.php" class="cal">Calculator</a>
                </div>
                <div class="col-md-9 register-right small">
                    <h3 class="register-heading">Update Account Details</h3>
                    <div class="row register-form">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Enter Region *</label>
                                <input type="text" name="region" class="form-control" value="<?php echo $region?>" />
                            </div>
                            <div class="form-group">
                                <label>Enter Sol_ID *</label>
                                <input type="text" name="sol_id" class="form-control" value="<?php echo $sol_id?>"
                                    required />
                            </div>
                            <div class="form-group">
                                <label>Enter Branch *</label>
                                <input type="text" name="branch" class="form-control" value="<?php echo $branch?>"
                                    required />
                            </div>
                            <div class="form-group">
                                <label>Enter Cust_ID *</label>
                                <input type="text" name="cust_id" class="form-control" value="<?php echo $cust_id?>"
                                    required />
                            </div>
                            <div class="form-group">
                                <label>Enter Ac_No *</label>
                                <input type="text" name="ac_no" class="form-control" disabled  value="<?php echo $ac_no?>"
                                    required />
                            </div>
                            <div class="form-group">
                                <label>Enter Name *</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $name?>"
                                    required />
                            </div>
                            <div class="form-group">
                                <label>Enter SCHM_CODE *</label>
                                <input type="text" name="schm_code" class="form-control" value="<?php echo $schm_code?>"
                                     required />
                            </div>
                            <div class="form-group">
                                <label>Enter EFF_MAIN_CLASSIFICATION *</label>
                                <input type="text" name="eff_main_classification" class="form-control"
                                     value="<?php echo $eff_main_classification?>" required />
                            </div>
                            <div class="form-group">
                                <label>Enter EFF_SUB_CLASSIFICATION *</label>
                                <input type="text" name="eff_sub_classification" class="form-control"
                                     value="<?php echo $eff_sub_classification?>" required />
                            </div>
                            <div class="form-group">
                                <label>Enter Category *</label>
                                <input type="text" name="category" class="form-control" 
                                    value="<?php echo $category?>" required />
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label>Enter DOA *</label>
                                <input type="date" name="doa" class="form-control" value="<?php echo "" .$doa. ""?>" required />
                            </div>
                            <div class="form-group">
                                <label>Enter EFF_NPA_DATE *</label>
                                <input type="date" name="eff_npa_date" class="form-control" value="<?php echo $eff_npa_date?>"
                                     required />
                            </div>
                            <div class="form-group">
                                <label>Enter SANCTION_LIMIT *</label>
                                <input type="text" name="sanction_limit" class="form-control" value="<?php echo $sanction_limit?>"
                                     value="0" required />
                            </div>
                            <div class="form-group">
                                <label>Enter DRWNG_POWER *</label>
                                <input type="text" name="drwng_power" class="form-control" value="<?php echo $drwng_power?>"
                                    required />
                            </div>
                            <div class="form-group">
                                <label>Enter BAL OS *</label>
                                <input type="text" name="bal_os" class="form-control" value="<?php echo $bal_os?>"
                                    required />
                            </div>
                            <div class="form-group">
                                <label>Enter DI_352Crore *</label>
                                <input type="text" name="di_352crore" class="form-control"
                                     value="<?php echo $di_352crore?>" required />
                            </div>

                            <div class="form-group">
                                <label>Enter NET_5578 *</label>
                                <input type="text" name="net_5578" class="form-control" value="<?php echo $net_5578?>"
                                    required />
                            </div>
                            <div class="form-group">
                                <label>Enter PROVSION *</label>
                                <input type="text" name="provsion" class="form-control" value="<?php echo $provsion?>"
                                    required />
                            </div>
                            <div class="form-group">
                                <label>Enter % Provosion *</label>
                                <input type="text" name="provosion" class="form-control " value="<?php echo $provosion?>"
                                     required />
                            </div>
                            <label class="font-italic">Click here for update.</label><br>
                            <input type="submit" name="update" class="btnRegister btn-dark" value="Update Details" />

                        </div>
                    </div>

                </div>
            </div>

        </div>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>