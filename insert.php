<?php
include 'connection.php';
if(isset($_POST['submit'])){
    $region = $_POST['region'];
    $sol_id = $_POST['sol_id'];
    $branch = $_POST['branch'];
    $cust_id = $_POST['cust_id'];
    $ac_no = $_POST['ac_no'];
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
    
    //insert data
    $sql="insert into `sheet` (region,sol_id,branch,cust_id,ac_no,name,schm_code,eff_main_classification,eff_sub_classification,category,doa,eff_npa_date,sanction_limit,drwng_power,bal_os,di_352crore,net_5578,provsion,provosion)
     values ('$region','$sol_id','$branch','$cust_id','$ac_no','$name','$schm_code','$eff_main_classification','$eff_sub_classification','$category','$doa','$eff_npa_date','$sanction_limit','$drwng_power','$bal_os','$di_352crore','$net_5578','$provsion','$provosion')";
    $result=mysqli_query($conn,$sql);
    if($result){
        header('location:success.php');
    } else{
        die("Connection failed: " . $conn->connect_error);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="./css/bootstrap.css">  
</head>
<body>
	<form action="" method="POST">
	 <div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="image/PGB.png" alt=""/>
                        <h3>Dakshin Bihar Gramin bank</h3>
                        <p>DBGB RO JAMUI Compromise Calculator </p>
                        <a href="search.php" class="cal">Calculator</a>                                                                                                    
                    </div>
                    <div class="col-md-9 register-right">
                                <h3 class="register-heading">Register Account Holder</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Enter Region *</label>
                                            <input type="text" name="region" class="form-control"  value="JAMUI" />
                                        </div> 
                                        <div class="form-group">
                                            <label>Enter Sol_ID *</label>
                                            <input type="text" name="sol_id" class="form-control" placeholder="Enter Sol_ID *" required />
                                        </div> 
                                        <div class="form-group">
                                            <label>Enter Branch *</label>
                                            <input type="text" name="branch" class="form-control" placeholder="Enter Branch *" required />
                                        </div> 
                                        <div class="form-group">
                                            <label>Enter Cust_ID *</label>
                                            <input type="text" name="cust_id" class="form-control" placeholder="Enter Cust_ID *" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Enter Ac_No *</label>
                                            <input type="text" name="ac_no" class="form-control" placeholder="Enter Ac_No *" required  />
                                        </div> 
                                        <div class="form-group">
                                            <label>Enter Name *</label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter Name *" required />
                                        </div> 
                                        <div class="form-group">
                                            <label>Enter SCHM_CODE *</label>
                                            <input type="text" name="schm_code" class="form-control" placeholder="Enter SCHM_CODE *" value="CCAKC" required />
                                        </div> 
                                        <div class="form-group">
                                            <label>Enter EFF_MAIN_CLASSIFICATION *</label>
                                            <input type="text" name="eff_main_classification" class="form-control" placeholder="Enter EFF_MAIN_CLASSIFICATION *" value="2" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Enter EFF_SUB_CLASSIFICATION *</label>
                                            <input type="text" name="eff_sub_classification" class="form-control" placeholder="Enter EFF_SUB_CLASSIFICATION *" value="2" required />
                                        </div>  
                                        <div class="form-group">
                                            <label>Enter Category *</label>
                                            <input type="text" name="category" class="form-control" placeholder="Enter Category *" value="SS"  required />
                                        </div>                                      
                                           
                                                                   
                                    </div>
                                    <div class="col-md-6"> 
                                                                                  
                                        <div class="form-group">
                                            <label>Enter DOA *</label>
                                            <input type="date" name="doa" class="form-control" placeholder="Enter DOA *" required />
                                        </div> 
                                        <div class="form-group">
                                            <label>Enter EFF_NPA_DATE *</label>
                                            <input type="date" name="eff_npa_date" class="form-control" placeholder="Enter EFF_NPA_DATE *" required />
                                        </div>  
                                        <div class="form-group">
                                            <label>Enter SANCTION_LIMIT *</label>
                                            <input type="text" name="sanction_limit" class="form-control"  placeholder="Enter SANCTION_LIMIT *" value="0" required/>
                                        </div> 
                                        <div class="form-group">
                                            <label>Enter DRWNG_POWER *</label>
                                            <input type="text" name="drwng_power" class="form-control" placeholder="Enter DRWNG_POWER *" required />
                                        </div> 
                                        <div class="form-group">
                                            <label>Enter BAL OS *</label>
                                            <input type="text" name="bal_os" class="form-control" placeholder="Enter BAL OS *" required />
                                        </div> 
                                        <div class="form-group">
                                            <label>Enter DI_352Crore *</label>
                                            <input type="text" name="di_352crore" class="form-control" placeholder="Enter DI_352Crore *" value="0" required />
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Enter NET_5578 *</label>
                                            <input type="text" name="net_5578" class="form-control" placeholder="Enter NET_5578 *" required />
                                        </div>  
                                        <div class="form-group">
                                            <label>Enter PROVSION *</label>
                                            <input type="text" name="provsion" class="form-control" placeholder="Enter PROVSION *" required />
                                        </div> 
                                        <div class="form-group">
                                            <label>Enter % Provosion *</label>
                                            <input type="text" name="provosion" class="form-control " placeholder="Enter % Provosion *" required />
                                        </div> 
                                        <label class=" font-italic">Click here for final submit.</label>
                                        <input type="submit" name="submit" class="btnRegister w-100 "  value="Register"/>
                                     
                                    </div>
                                </div>                                                        
                        
                    </div>
                </div>

            </div>
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>