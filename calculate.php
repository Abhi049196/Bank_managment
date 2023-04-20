<?php include 'connection.php';
$ac_no = $_GET['ac_no'];
$sql="select * from `sheet` where ac_no = $ac_no";
$result=mysqli_query($conn,$sql);
if($result){
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
    //  echo $eff_npa_date;
    
    $datetime = DateTime::createFromFormat('Y-m-d', $eff_npa_date);
    $day = $datetime->format('d');
    $month = $datetime->format('m');
    $year = $datetime->format('y');
    
    
}

// calculate R value
if($schm_code=="CCAKC"){
    $r="6";
}else {
    $r="10.5";
}





?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calculation </title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    
   
    <script>
    function calculate() {
        // Get input values
        var osb = parseFloat(document.getElementById("osb").value);
        var di = parseFloat(document.getElementById("di").value);
        var ins = parseFloat(document.getElementById("ins").value);
        var pdr = parseFloat(document.getElementById("pdr").value);
        var other = parseFloat(document.getElementById("other").value);
        var comAmount = parseFloat(document.getElementById("comAmount").value);
        var tAmount = parseFloat(document.getElementById("tAmount").value);
        
        

        var DD = parseInt(document.getElementById("DD").value);
        var MM = parseInt(document.getElementById("MM").value);
        var YY = parseInt(document.getElementById("YY").value);

        var dd = <?php print($day) ?>;
        var mm = <?php print($month) ?>;
        var yy = <?php print($year) ?>;

        var r = <?php print($r) ?>;

        // calculate Y

        var Y = (DD - dd) / 365 + (MM - mm) / 12 + (YY - yy);
        document.getElementById("Y").innerHTML = Y.toFixed(2);

        // base abmout 
        var baseAmount;
        baseAmount = osb + di + ins + pdr + other;
        document.getElementById("ba").innerHTML = baseAmount;


        // Ri value
        

        var ri = (baseAmount * r * Y) / 100;
        document.getElementById("ri").innerHTML = ri.toFixed(2);

        // total due
        var tdue = ri + baseAmount;
        document.getElementById("tdue").innerHTML = tdue.toFixed(2);

        // scr amount
        var scr_amount = tdue - comAmount;
        document.getElementById("scr_amount").innerHTML = scr_amount.toFixed(2);

        //  os_balance - scr_amount

        var r_loss = osb - comAmount;
        document.getElementById("r_loss").innerHTML = r_loss.toFixed(2);

        // Rest_amount
        var rest_amount = comAmount - tAmount;
        document.getElementById("rest_amount").innerHTML = rest_amount.toFixed(2);

        // osp 
        var osp = (comAmount * 100) / osb;
        document.getElementById("osp").innerHTML = osp.toFixed(2);

        // comp_amount percentage
        var cap = (comAmount * 100) / tdue;
        document.getElementById("cap").innerHTML = cap.toFixed(2);


        var scale;
        if (scr_amount === tdue) {
            scale = "PLEASE ENTER COMPROMISE AMOUNT";
        } else if (scr_amount > 300000) {
            scale = "NOT POSSIBLE BY RO";
        } else if (scr_amount > 100000) {
            scale = "RO";
        } else if (scr_amount > 75000) {
            scale = "SCALE 3 BM";
        } else {
            scale = "SCALE 2 BM";
        }
        document.getElementById("scale").innerHTML = scale;
        

        // upfront value
        var provsion = <?php print($provsion) ?>;
        
        var upfront;
        if (osb - provsion == 0) {
        upfront = osb * 4/10;
        } else if (osb - provsion == 5/10) {
        upfront = osb * 4/10;
        } else {
        upfront = osb - provsion;
        }        
        document.getElementById("upfront").innerHTML = upfront.toFixed(2);


    }

    </script>
</head>

<body style="background-color:#CFF4FC" onload="javascript:calculate()" class="small">
    <form action="" method="POST">
        <div class="row">
            <div class=" col-lg-5">
                <div class="container mt-1">

                    <h3>Account Details.</h3>
                    <table class="table table-sm table-borderless">
                        <tr>
                            <th class=" bg-info">Ac No to be Mentioned : </th>
                            <td class=" bg-info font-weight-bold"><?php echo $ac_no ?></td>
                        </tr>
                        <tr>
                            <th>Name of Borrower : </th>
                            <td><?php echo $name ?></td>
                        </tr>
                        <tr>
                            <th>A/C No. : </th>
                            <td><?php echo $ac_no ?></td>
                        </tr>
                        <tr>
                            <th>Date Of Advance : </th>
                            <td><?php echo $doa ?></td>
                        </tr>
                        <tr>
                            <th>Limit : </th>
                            <td><?php echo $sanction_limit ?></td>
                        </tr>
                        <tr>
                            <th>O/S : </th>
                            <td><?php echo $bal_os ?></td>
                        </tr>
                        <tr>
                            <th>Scheme : </th>
                            <td><?php echo $schm_code ?></td>
                        </tr>
                        <tr>
                            <th>Date of NPA : </th>
                            <td><?php echo $eff_npa_date ?></td>
                        </tr>
                        <tr>
                            <th>Category : </th>
                            <td><?php echo $category ?></td>
                        </tr>
                        <tr>
                            <th>Proviosion : </th>
                            <td><?php echo $provsion ?></td>
                        </tr>
                        <tr>
                            <th> Upfront : </th>
                            <td id="upfront"></td>
                        </tr>

                        <div class="container">
                            <tr>
                                <th class="font-weight-bold text-danger text-center">ATTENTION FOR COMPROMISE</th>
                            </tr>
                            <tr>
                                <td class="text-center">PLEASE ENTER COMPROMISE AMOUNT FOR DETERMINING SANCTIONING
                                    AUTHORITY</td>
                            </tr>
                            <tr>
                                <th class="text-center">SENCTIONING AUTHORITY:</th>
                                <th class="text-danger font-weight-bold" id="scale"></th>
                            </tr>
                        </div>
                    </table>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="container mt-2">                                                                                                  
                    <table class="table-sm table-bordered text-nowrap">
                        <tr class="bg-info"><th><span class="h5"> Please Follow <span class="text-danger">Circular No. 05/21 </span> </span></th>
                            <td><a href="search.php" class="btn btn-sm w-100 btn-dark">Back to search</a> </td>
                            <td>
                            <?php 
                                echo '
                                <a href="update.php?ac_no='.$ac_no.'" class="btn btn-dark btn-sm w-100">Update</a>'
                            ?>
                            </td>
                            <td>
                            <?php 
                                echo '
                                <a class="btn btn-dark btn-sm w-100 text-white" onclick="window.print()">Print</a>'
                            ?>
                            </td></tr>

                        <tr>
                            <th>DD</th>
                            <th>MM</th>
                            <th>YY</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td class="bg-white"><input type="text" value="31" class="bg-transparent border-0 " id="DD"
                                    onfocusout="calculate()"  oninput="day(this)"></td>
                            <td class="bg-white"><input type="text" value="12" class="bg-transparent border-0" id="MM"
                                    onfocusout="calculate()" oninput="month(this)"></td>
                            <td class="bg-white"><input type="text" value="22" class="bg-transparent border-0" id="YY"
                                    onfocusout="calculate()" maxlength="2"></td>
                            <td>Prv Quater</td>
                        </tr>
                        <tr>
                            <td><?php echo $day ?></td>
                            <td><?php echo $month ?></td>
                            <td><?php echo $year ?></td>
                            <td>intt Run Upto</td>
                        </tr>
                        <tr>
                            <th>Y</th>
                            <td id="Y"></td>
                        </tr>
                        <tr>
                            <th>R</th>
                            <td><?php echo $r ?></td>
                        </tr>

                        <tr>
                            <th>OS Balance</th>
                            <td><input disabled type="text" value="<?php echo $bal_os ?>" id="osb"
                                    class=" bg-transparent border-0"></td>
                            <td class="text-danger font-weight-bold" id="osp"></td>
                        </tr>
                        <tr>
                            <th>DI</th>
                            <td class="bg-white"><input type="text" value="0" id="di" class="bg-transparent border-0"
                                    onfocusout="calculate()" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"></td>
                        </tr>
                        <tr>
                            <th>Ins.</th>
                            <td class="bg-white"><input type="text" value="0" class="bg-transparent border-0" id="ins"
                                    onfocusout="calculate()" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"></td>
                        </tr>
                        <tr>
                            <th>PDR</th>
                            <td class="bg-white"><input type="text" value="0" class="bg-transparent border-0" id="pdr"
                                    onfocusout="calculate()" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"></td>
                        </tr>
                        <tr>
                            <th>Other Chg</th>
                            <td class="bg-white"><input type="text" value="0" class="bg-transparent border-0" id="other"
                                    onfocusout="calculate()" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"></td>

                        <tr>
                            <th>Base Amount</th>
                            <td id="ba"><?php echo $bal_os ?></td>
                        </tr>
                        <tr>
                            <th>RI</th>
                            <td id="ri"></td>
                        </tr>
                        <tr>
                            <th>Total Dues</th>
                            <td id="tdue"></td>
                        </tr>
                        <tr>
                            <th>Comp amt</th>
                            <td class="bg-white"><input type="text" value="40000" class="bg-transparent border-0"
                                    id="comAmount" onfocusout="calculate()" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"></td>
                            <td class="text-danger font-weight-bold" id="cap"></td>
                        </tr>
                        <tr>
                            <th>Scr Amt</th>
                            <td id="scr_amount"></td>
                        </tr>
                        <tr>
                            <th>R Loss</th>
                            <td id="r_loss"></td>
                        </tr>
                        <tr>
                            <th>Tokan Amount</th>
                            <td class="bg-white"><input type="text" value="0" class="bg-transparent border-0"
                                    id="tAmount" onfocusout="calculate()" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"></td>
                        </tr>
                        <tr>
                            <th>Rest Amount</th>
                            <td id="rest_amount"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        


    </form>
    <script src="./js/main.js"  type="text/javascript"></script>
</body>

</html>