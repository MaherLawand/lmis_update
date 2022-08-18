<?php
    session_start();
    if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: index.php");
        die();
    }

    include 'config.php';

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);

        echo "<header> <h2> Welcome "  . $row['name'] . " </h2> <a href='logout.php'>Logout</a> </header>";
    }
    if(isset($_POST['submit'])){
    /*first database table*/
    $provider_id=mysqli_real_escape_string($conn, $_POST['pid']);
    $provider_code=mysqli_real_escape_string($conn, $_POST['pCode']);
    $entity_reg_num=mysqli_real_escape_string($conn, $_POST['egn']);
    $provider_name=mysqli_real_escape_string($conn, $_POST['pName']);
    $trading_name=mysqli_real_escape_string($conn, $_POST['tName']);
    $sps=mysqli_real_escape_string($conn, $_POST['sps']);
    $pparl=mysqli_real_escape_string($conn, $_POST['proofAcc']);
    $dhet_reg=mysqli_real_escape_string($conn, $_POST['DHET']);
    $dhet_reg_num=mysqli_real_escape_string($conn, $_POST['DHETnb']);
    
    $dhet_reg_start_date=mysqli_real_escape_string($conn, $_POST['DHET-startdate']);
    $new_start_Date = date("Y-m-d", strtotime($dhet_reg_start_date));
    $dhet_reg_end_date=mysqli_real_escape_string($conn, $_POST['DHET-enddate']);
    $new_end_Date = date("Y-m-d", strtotime($dhet_reg_start_date));
    $bbbee_rating=mysqli_real_escape_string($conn, $_POST['BBBEE-lvl']);
    $bbbee_rec=mysqli_real_escape_string($conn, $_POST['BBBEE-rec']);
    $num_fulltime_staff=mysqli_real_escape_string($conn, $_POST['num-staff']);
    $num_cont_staff=mysqli_real_escape_string($conn, $_POST['connum-staff']);
    $main_prov=mysqli_real_escape_string($conn, $_POST['province']);
    $lat_deg=mysqli_real_escape_string($conn, $_POST['Latitude-deg']);
    $lat_min=mysqli_real_escape_string($conn, $_POST['Latitude-min']);
    $lat_sec=mysqli_real_escape_string($conn, $_POST['Latitude-sec']);
    $long_deg=mysqli_real_escape_string($conn, $_POST['Longitude-deg']);
    $long_min=mysqli_real_escape_string($conn, $_POST['Longitude-min']);
    $long_sec=mysqli_real_escape_string($conn, $_POST['Longitude-sec']);
    /* second database table */
    $firstname=mysqli_real_escape_string($conn, $_POST['fn']);
    $title=mysqli_real_escape_string($conn, $_POST['title']);
    $lastname=mysqli_real_escape_string($conn, $_POST['ln']);
    $pos_in_or=mysqli_real_escape_string($conn, $_POST['po']);
    $tel_num=mysqli_real_escape_string($conn, $_POST['tel']);
    $cel_num=mysqli_real_escape_string($conn, $_POST['cell']);
    $email=mysqli_real_escape_string($conn, $_POST['emailContact']);
    $physical_address=mysqli_real_escape_string($conn, $_POST['physicalAddress']);
    $postal_address=mysqli_real_escape_string($conn, $_POST['postalAddress']);
    $houseph=mysqli_real_escape_string($conn, $_POST['housePH']);
    $housepo=mysqli_real_escape_string($conn, $_POST['housePO']);
    $streetph=mysqli_real_escape_string($conn, $_POST['streetPH']);
    $streetpo=mysqli_real_escape_string($conn, $_POST['streetPO']);
    $suburbph=mysqli_real_escape_string($conn, $_POST['suburbPH']);
    $suburbpo=mysqli_real_escape_string($conn, $_POST['suburbPO']);
    $TownCityph=mysqli_real_escape_string($conn, $_POST['TownCityPH']);
    $TownCitypo=mysqli_real_escape_string($conn, $_POST['TownCityPO']);
    $postalCodeph=mysqli_real_escape_string($conn, $_POST['postalCodePH']);
    $postalCodepo=mysqli_real_escape_string($conn, $_POST['postalCodePO']);
    $Provinceph=mysqli_real_escape_string($conn, $_POST['ProvincePH']);
    $Provincepo=mysqli_real_escape_string($conn, $_POST['ProvincePO']);
    
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM provider_detalis WHERE user_id='{$provider_id}'"))==0){
    $sqlprovider = "INSERT INTO provider_detalis (user_id,user_code,entity_reg_num,provider_name,trading_name,sps,pparl,dhet,dhet_reg_num,dhet_reg_start_date,dhet_reg_end_date,bbbee_rating,bbbee_rec,num_fulltime_staff,num_contracted_staff,main_prov_operation,lat_deg,lat_min,lat_sec,long_deg,long_min,long_sec) VALUES ('{$provider_id}','{$provider_code}','{$entity_reg_num}', '{$provider_name}','{$trading_name}','{$sps}','{$pparl}','{$dhet_reg}','{$dhet_reg_num}','{$new_start_Date}','{$new_end_Date}','{$bbbee_rating}','{$bbbee_rec}','{$num_fulltime_staff}','{$num_cont_staff}','{$main_prov}','{$lat_deg}','{$lat_min}','{$lat_sec}','{$long_deg}','{$long_min}','{$long_sec}')";
    $query_provider=mysqli_query($conn,$sqlprovider);

    $sqlcontact="INSERT INTO contact_details (user_id,first_name,title,last_name,pos_in_org,tel_num,cel_num,email,physical_address,postal_address,house_ph,house_po,street_ph,street_po,suburb_ph,suburb_po,towncity_ph,towncity_po,postalcode_ph,postalcode_po,province_ph,province_po) VALUES ('{$provider_id}','{$firstname}','{$title}','{$lastname}','{$pos_in_or}','{$tel_num}','{$cel_num}','{$email}','{$physical_address}','{$postal_address}','{$houseph}','{$housepo}','{$streetph}','{$streetpo}','{$suburbph}','{$suburbpo}','{$TownCityph}','{$TownCitypo}','{$postalCodeph}','{$postalCodepo}','{$Provinceph}','{$Provincepo}')";
    
    $query_contact=mysqli_query($conn,$sqlcontact);
    }else{
        $sqlprovider_update="UPDATE provider_detalis SET user_code='$provider_code',entity_reg_num='$entity_reg_num',provider_name='$provider_name',trading_name='$trading_name',sps='$sps',pparl='$pparl',dhet='$dhet_reg',dhet_reg_num='$dhet_reg_num',dhet_reg_start_date='$new_start_Date',dhet_reg_end_date='$new_end_Date',bbbee_rating='$bbbee_rating',bbbee_rec='$bbbee_rec',num_fulltime_staff='$num_fulltime_staff',num_contracted_staff='$num_cont_staff',main_prov_operation='$main_prov',lat_deg='$lat_deg',lat_min='$lat_min',lat_sec='$lat_sec',long_deg='$long_deg',long_min='$long_min',long_sec='$long_sec' WHERE user_id='$provider_id'";
        $query_update_provider=mysqli_query($conn,$sqlprovider_update);

        $sqlcontact_update="UPDATE contact_details SET first_name='$firstname',title='$title',last_name='$lastname',pos_in_org='$pos_in_or',tel_num='$tel_num',cel_num='$cel_num',email='$email',physical_address='$physical_address',postal_address='$postal_address',house_ph='$houseph',house_po='$housepo',street_ph='$streetph',street_po='$streetpo',suburb_ph='$suburbph',suburb_po='$suburbpo',towncity_ph='$TownCityph',towncity_po='$TownCitypo',postalcode_ph='$postalCodeph',postalcode_po='$postalCodepo',province_ph='$Provinceph',province_po='$Provincepo' WHERE user_id='$provider_id'";
        $query_update_contact=mysqli_query($conn,$sqlcontact_update);
    }
    
}
$selectprovider=mysqli_query($conn,"SELECT * FROM provider_detalis WHERE user_id='{$row['user_id']}'");
if(mysqli_num_rows($selectprovider)>0){
$provider_row = mysqli_fetch_assoc($selectprovider);
}

$selectcontact=mysqli_query($conn,"SELECT * FROM contact_details WHERE user_id='{$row['user_id']}'");
if(mysqli_num_rows($selectcontact)>0){
$contact_row = mysqli_fetch_assoc($selectcontact);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <script type="text/javascript" src="./js/step1.js" defer></script>
    <script type="text/javascript" src="./js/common.js" defer></script>
    <title>Document</title>
</head>
<body>
    <div class="container" id="container">
<!--<header>
    
   <a href="">Log Off</a>

</header>-->
<input type="hidden" id="hidden" value="1">
<section class="path">
<div class="path1">
    <div class="card ">
        <li class="active">
            <span class="list-num first">1</span>
            <i class="fa-solid fa-id-card"></i>
           <span>Details</span> 
          </li>
        </div>

        <div class="card">
            <li>
                <span class="list-num">2</span>
               <i class="fa-solid fa-handshake"></i>
               <span>QMS</span> 
              </li>
            </div>

            <div class="card">
                <li>
                    <span class="list-num">3</span>
                    <i class="fa-solid fa-book"></i>
                   <span>Programme Scope</span> 
                  </li>
                </div>

                <div class="card">
                    <li>
                        <span class="list-num">4</span>
                        <i class="fa-solid fa-users"></i>
                       <span>ETD Staff</span> 
                      </li>
                    </div>

                    <div class="card">
                        <li>
                            <span class="list-num">5</span>
                            <i class="fa-solid fa-building"></i>
                           <span>Satellite Offices & Delivery Sites</span> 
                          </li>
                        </div>

                        <div class="card">
                            <li>
                                <span class="list-num">6</span>
                                <i class="fa-solid fa-file"></i>                                                      <span>Documents</span> 
                              </li>
                            </div>

                            <div class="card">
                                <li>
                                    <span class="list-num">7</span>
                                    <i class="fa-solid fa-square-check"></i>                                    <span>Verify Information</span> 
                                  </li>
                                </div>
                           
</div>

<div class="path2">
    <p >Enter the details of the training provider. Click on <strong>Save</strong> to save the changes that you have made. Click on <strong>Edit</strong> to edit an already existing record</p>
<form action="" method="POST">
    <div class="flex-btns">

<a id="edit" name="edit" onclick="savebtn();" class="btn">Edit</a>
<a id="upper-next" name="upr-next" class="btn">Next</a>
</div>

</div>

</section>
<h1 style="text-align: center; margin:50px;">Provider Details</h1>
<section class="contact-info">
    <table style="width: 100%;">
        <tr>
            <th>Provider ID :</th>  <td style="width: 300px;">
                <input type="text" name="pid" value="<?php echo $row['user_id'] ?>" id="pid" readonly></td>
            <th>Provider Code :</th>  <td><input type="text" name="pCode" id="pCode" readonly></td>
            <th>Entity Registration No :</th>  <td><input type="text" name="egn" id="egn" class="count" onfocusout="checkempty('egn');" onkeyup="savebtn();" value="<?php 
            if(mysqli_num_rows($selectprovider)>0){
            if($provider_row['entity_reg_num']!=""){
                echo $provider_row['entity_reg_num']; 
                }
            }?>"
                <?php if(mysqli_num_rows($selectprovider)>0){ 
                if($provider_row['entity_reg_num']!=""){
                    echo "readonly";
                }
            }
                ?>
            ></td>
        </tr>

        <tr>
            <th>Provider Name :</th><td><input type="text" name="pName" id="pName" class="count" onfocusout="checkempty('pName');" onkeyup="savebtn();" value="<?php 
            if(mysqli_num_rows($selectprovider)>0){
            if($provider_row['provider_name']!=""){
                echo $provider_row['provider_name']; 
                }
            } 
                ?>"
                <?php if(mysqli_num_rows($selectprovider)>0){ 
                if($provider_row['provider_name']!=""){
                    echo "readonly";
                }
            }
                ?>
                ></td>
        </tr>
        <tr>
            <th>Trading Name :</th><td><input type="text" name="tName" id="tName" value="<?php 
            if(mysqli_num_rows($selectprovider)>0){
            if($provider_row['trading_name']!=""){
                echo $provider_row['trading_name']; 
                } }
                ?>"
                <?php if(mysqli_num_rows($selectprovider)>0){
                if($provider_row['trading_name']!=""){
                    echo "readonly";
                }
            }
                ?>
                ></td>
        </tr>
       <tr>
            <th>Select Primary SETA :</th><td><select name="sps" id="sps" onfocusout="checkempty();" 
            <?php if(mysqli_num_rows($selectprovider)>0){
                if($provider_row['sps']!=""){
                    echo "disabled";
                }
            }
                ?>
                >
             <?php 
                        include 'config.php';
                        $sqlSeta = "SELECT id ,setaName FROM primarySeta";
                        $result = $conn -> query($sqlSeta);
                        // $rows = $result -> mysqli_fetch_assoc();
                            //echo $conn;
                            while($rows = $result ->fetch_assoc())
                            {
                                echo  "<option value = " .$rows['id']." " ?> <?php if(mysqli_num_rows($selectprovider)>0){
                                    if($provider_row['sps']==$rows['id']){
                                        echo "selected";
                                    }
                                } ?> <?php echo " >" . $rows['setaName'] . "</option>" ;
                            }
                            
                            
                            
                        ?> 
           </select></td> 
        </tr>

        <tr>
            <th>Proof of Primary Accreditation and RL: </th><td><input type="file" name="proofAcc" id="proofAcc" value="<?php 
            if(mysqli_num_rows($selectprovider)>0){
            if($provider_row['pparl']!=""){
                echo $provider_row['pparl']; 
                } 
            }
                ?>"
                <?php if(mysqli_num_rows($selectprovider)>0){
                if($provider_row['pparl']!=""){
                    echo "readonly";
                }
            }
                ?>
                ></td>
           
        </tr>
        <tr>
            <th>Registered with DHET :</th><td><select id="DHET" name="DHET"
                <?php if(mysqli_num_rows($selectprovider)>0){
                if($provider_row['dhet']!=""){
                    echo "disabled";
                }
            }
                ?>
                >
                <option  <?php if(mysqli_num_rows($selectprovider)>0){
                    if($provider_row['dhet']=="Yes"){
                        echo "selected";
                    }
                }
                ?>
                > Yes </option>
                <option <?php if(mysqli_num_rows($selectprovider)>0){
                    if($provider_row['dhet']=="No"){
                        echo "selected";
                    }
                }
                ?>
                > No </option>
            </select></td>
            <th>DHET Registration No:</th><td><input type="number" id="dhetnb" name="DHETnb" name="DHETnb" value="<?php 
            if(mysqli_num_rows($selectprovider)>0){
            if($provider_row['dhet_reg_num']!=""){
                echo $provider_row['dhet_reg_num']; 
                } 
            }
                ?>"
                <?php if(mysqli_num_rows($selectprovider)>0){
                if($provider_row['dhet_reg_num']!=""){
                    echo "readonly";
                }
            }
                ?>
                ></td>
        </tr>

        <tr>
            <th>DHET Registration Start Date :</th><td><input type="date" id="DHET-startdate" name="DHET-startdate" value="<?php 
            if(mysqli_num_rows($selectprovider)>0){
            if($provider_row['dhet_reg_start_date']!=""){
                echo $provider_row['dhet_reg_start_date']; 
                } 
            }
                ?>"
                <?php if(mysqli_num_rows($selectprovider)>0){
                if($provider_row['dhet_reg_start_date']!=""){
                    echo "readonly";
                }
            }
                ?>
                ></td>
            <th>DHET Registration End Date:</th><td><input type="date" id="DHET-enddate" name="DHET-enddate" value="<?php 
            if(mysqli_num_rows($selectprovider)>0){
            if($provider_row['dhet_reg_end_date']!=""){
                echo $provider_row['dhet_reg_end_date']; 
                } 
            }
                ?>"
                <?php if(mysqli_num_rows($selectprovider)>0){
                if($provider_row['dhet_reg_end_date']!=""){
                    echo "readonly";
                }
            }
                ?>
                ></td>
        </tr>
        
        <tr>
            <th>BBBEE Rating :</th><td> <select id="BBBEE-lvl" name="BBBEE-lvl" class="count" onfocusout="checkempty('BBBEE-lvl');" onkeyup="savebtn();"
            <?php 
                if(mysqli_num_rows($selectprovider)>0){
                if($provider_row['bbbee_rating']!=""){
                    echo "disabled";
                }
            }
                ?>
                >
             <?php 
                        include 'config.php';
                        $sqlbbbee = "SELECT id ,bbbee_rating FROM bbbee";
                        $result = $conn -> query($sqlbbbee);
                        // $rows = $result -> mysqli_fetch_assoc();
                            //echo $conn;
                            while($rows = $result ->fetch_assoc())
                            {
                                echo  "<option value = " .$rows['id']." " ?> <?php if(mysqli_num_rows($selectprovider)>0){
                                    if($provider_row['bbbee_rating']==$rows['id']){
                                        echo "selected";
                                    }
                                } ?> <?php echo " >" . $rows['bbbee_rating'] . "</option>" ;
                            }
                            
                            
                            
                        ?> 
        </select></td>
            <th>BBBEE Recognition:</th><td><input type="number" id="BBBEE-rec" name="BBBEE-rec" class="count" onfocusout="checkempty('BBBEE-rec');" onkeyup="savebtn();" value="<?php 
            if(mysqli_num_rows($selectprovider)>0){
            if($provider_row['bbbee_rec']!=""){
                echo $provider_row['bbbee_rec']; 
                } 
            }
                ?>"
                <?php if(mysqli_num_rows($selectprovider)>0){
                if($provider_row['bbbee_rec']!=""){
                    echo "readonly";
                }
            }
                ?>
                ></td>
        </tr>

        <tr>
            <th>No. Full Time Staff :</th><td><input type="number" id="num-staff" name="num-staff" class="count" onfocusout="checkempty('num-staff');" onkeyup="savebtn();" value="<?php 
            if(mysqli_num_rows($selectprovider)>0){
            if($provider_row['num_fulltime_staff']!=""){
                echo $provider_row['num_fulltime_staff']; 
                } 
            }
                ?>"
                <?php if(mysqli_num_rows($selectprovider)>0){
                if($provider_row['num_fulltime_staff']!=""){
                    echo "readonly";
                }
            }
                ?>
                ></td>
            <th>No. Contracted Staff :</th><td><input type="number" id="num-constaff" name="connum-staff" class="count" onfocusout="checkempty('num-constaff');" onkeyup="savebtn();" value="<?php
            if(mysqli_num_rows($selectprovider)>0){ 
            if($provider_row['num_contracted_staff']!=""){
                echo $provider_row['num_contracted_staff']; 
                } 
            }
                ?>"
                <?php if(mysqli_num_rows($selectprovider)>0){
                 if($provider_row['num_contracted_staff']!=""){
                    echo "readonly";
                }
            }
                ?>
                ></td>
        </tr>

        <tr>
            <th>Main Province Of Operation :</th><td><input type="text" id="province" name="province" class="count" onfocusout="checkempty('province');" onkeyup="savebtn();" value="<?php 
            if(mysqli_num_rows($selectprovider)>0){
            if($provider_row['main_prov_operation']!=""){
                echo $provider_row['main_prov_operation']; 
                } 
            }
                ?>"
                <?php if(mysqli_num_rows($selectprovider)>0){
                if($provider_row['main_prov_operation']!=""){
                    echo "readonly";
                }
            }
                ?>
                ></td>

        </tr>

        <tr>
            <th>Latitude Degrees:</th><td><input type="number" id="Latitude-deg" name="Latitude-deg" class="count" onfocusout="checkempty('Latitude-deg');" onkeyup="savebtn();" value="<?php 
            if(mysqli_num_rows($selectprovider)>0){
            if($provider_row['lat_deg']!=""){
                echo $provider_row['lat_deg']; 
                } 
            }
                ?>"
                <?php if(mysqli_num_rows($selectprovider)>0){
                if($provider_row['lat_deg']!=""){
                    echo "readonly";
                }
            }
                ?>
                ></td>
            <th>Latitude Minutes :</th><td><input type="number" id="Latitude-min" name="Latitude-min" class="count" onfocusout="checkempty('Latitude-min');" onkeyup="savebtn();" value="<?php
            if(mysqli_num_rows($selectprovider)>0){ 
            if($provider_row['lat_min']!=""){
                echo $provider_row['lat_min']; 
                } 
            }
                ?>"
                <?php if(mysqli_num_rows($selectprovider)>0){
                if($provider_row['lat_min']!=""){
                    echo "readonly";
                }
            }
                ?>
                ></td>
            <th>Latitude Seconds :</th><td><div id="error-container-one"> <div id="seconds-one"></div> <input type="number" id="Latitude-sec" name="Latitude-sec"  onfocusout="checklatsec()" value="<?php 
            if(mysqli_num_rows($selectprovider)>0){
            if($provider_row['lat_sec']!=""){
                echo $provider_row['lat_sec']; 
                }
            } 
                ?>"
                <?php if(mysqli_num_rows($selectprovider)>0){
                if($provider_row['lat_sec']!=""){
                    echo "readonly";
                }
            }
                ?>
                > </div></td>
        </tr>

        <tr>
            <th>Longitude Degrees:</th><td><input type="number" id="Longitude-deg" name="Longitude-deg" class="count" onfocusout="checkempty('Longitude-deg');" onkeyup="savebtn();" value="<?php 
            if(mysqli_num_rows($selectprovider)>0){
            if($provider_row['long_deg']!=""){
                echo $provider_row['long_deg']; 
                } 
            }
                ?>"
                <?php if(mysqli_num_rows($selectprovider)>0){
                if($provider_row['long_deg']!=""){
                    echo "readonly";
                }
            }
                ?>
                ></td>
            <th>Longitude Minutes :</th><td><input type="number" id="Longitude-min" name="Longitude-min" class="count" onfocusout="checkempty('Longitude-min');" onkeyup="savebtn();" value="<?php 
            if(mysqli_num_rows($selectprovider)>0){
            if($provider_row['long_min']!=""){
                echo $provider_row['long_min']; 
                } 
            }
                ?>"
                <?php if(mysqli_num_rows($selectprovider)>0){
                if($provider_row['long_min']!=""){
                    echo "readonly";
                }
            }
                ?>
                ></td>
            <th>Longitude Seconds :</th><td><div id="error-container-two"> <div id="seconds-two"> </div> <input type="number" id="Longitude-sec" name="Longitude-sec"  onfocusout="checklongsec();" value="<?php 
           if(mysqli_num_rows($selectprovider)>0){
           if($provider_row['long_sec']!=""){
                echo $provider_row['long_sec']; 
                } 
            }
                ?>"
                <?php if(mysqli_num_rows($selectprovider)>0){
                if($provider_row['long_sec']!=""){
                    echo "readonly";
                }
            }
                ?>
                > </div></td>
        </tr>
    </table>
</section>

<!-- contact details table -->

<h1 style="text-align: center; margin:50px;">Contact Details</h1>
<section class="contact-info">
    
    <table style="width: 100%;">
        <tr>
            <th >First Name : </th> <td ><input type="text" name="fn" id="fn" class="count" onfocusout="checkempty('fn');" onkeyup="savebtn();" value="<?php
            if(mysqli_num_rows($selectcontact)>0){ 
            if($contact_row['first_name']!=""){
                echo $contact_row['first_name']; 
                } 
            }
                ?>"
                <?php  if(mysqli_num_rows($selectcontact)>0){
                if($contact_row['first_name']!=""){
                    echo "readonly";
                }
            }
                ?>
                ></td>
            <th>Title : </th> <td><input type="text" name="title" id="title" value="<?php 
             if(mysqli_num_rows($selectcontact)>0){
            if($contact_row['title']!=""){
                echo $contact_row['title']; 
                } 
            }
                ?>"
                <?php  if(mysqli_num_rows($selectcontact)>0){
                if($contact_row['title']!=""){
                    echo "readonly";
                }
            }
                ?>
                ></td>
        </tr>
        <tr>
            <th>Last Name : </th> <td><input type="text" name="ln" id="ln" class="count" onfocusout="checkempty('ln');" onkeyup="savebtn();" value="<?php 
             if(mysqli_num_rows($selectcontact)>0){
            if($contact_row['last_name']!=""){
                echo $contact_row['last_name']; 
                } 
            }
                ?>"
                <?php  if(mysqli_num_rows($selectcontact)>0){
                if($contact_row['last_name']!=""){
                    echo "readonly";
                }
            }
                ?>
                ></td>
            <th>Position in Organization:</th> <td> <input type="text" name="po" id="po" value="<?php 
             if(mysqli_num_rows($selectcontact)>0){
            if($contact_row['pos_in_org']!=""){
                echo $contact_row['pos_in_org']; 
                }
            } 
                ?>"
                <?php  if(mysqli_num_rows($selectcontact)>0){
                if($contact_row['pos_in_org']!=""){
                    echo "readonly";
                }
            }
                ?>
                > </td>
        </tr>
        <tr>
            <th>Tel No : </th> <td><input type="text" name="tel" id="tel" value="<?php 
             if(mysqli_num_rows($selectcontact)>0){
            if($contact_row['tel_num']!=""){
                echo $contact_row['tel_num']; 
                } 
            }
                ?>"
                <?php  if(mysqli_num_rows($selectcontact)>0){
                if($contact_row['tel_num']!=""){
                    echo "readonly";
                }
            }
                ?>
                ></td>
            <th>Cell No : </th> <td><input type="text" name="cell" id="cell" value="<?php 
             if(mysqli_num_rows($selectcontact)>0){
            if($contact_row['cel_num']!=""){
                echo $contact_row['cel_num']; 
                } 
            }
                ?>"
                <?php  if(mysqli_num_rows($selectcontact)>0){
                 if($contact_row['cel_num']!=""){
                    echo "readonly";
                }
            }
                ?>
                ></td>
            
        </tr> 
        
        <tr>
            <th>E-mail : </th> <td><input type="email" name="emailContact" id="emailContact" class="count" onfocusout="checkempty('emailContact');" onkeyup="savebtn();" value="<?php
             if(mysqli_num_rows($selectcontact)>0){ 
            if($contact_row['email']!=""){
                echo $contact_row['email']; 
                } 
            }
                ?>"
                <?php  if(mysqli_num_rows($selectcontact)>0){
                if($contact_row['email']!=""){
                    echo "readonly";
                }
            }
                ?>
                ></td>
            <th>Physical Address : </th> <td><input id="physicaladdress" type="text" name="physicalAddress" value="<?php 
             if(mysqli_num_rows($selectcontact)>0){
            if($contact_row['physical_address']!=""){
                echo $contact_row['physical_address']; 
                } 
            }
                ?>"
                <?php  if(mysqli_num_rows($selectcontact)>0){
                if($contact_row['physical_address']!=""){
                    echo "readonly";
                }
            }
                ?>
                ></td>
            <th>Postal Address : </th> <td><input id="postaladdress" type="text" name="postalAddress" value="<?php 
             if(mysqli_num_rows($selectcontact)>0){
            if($contact_row['postal_address']!=""){
                echo $contact_row['postal_address']; 
                } 
            }
                ?>"
                <?php  if(mysqli_num_rows($selectcontact)>0){
                if($contact_row['postal_address']!=""){
                    echo "readonly";
                }
            }
                ?>
                ></td>
        </tr>

         <tr>
            <th>House No./Complex Name : </th> <td><input type="text" name="housePH" id="housePH" class="count" onfocusout="checkempty('housePH');" onkeyup="savebtn();" value="<?php
             if(mysqli_num_rows($selectcontact)>0){ 
            if($contact_row['house_ph']!=""){
                echo $contact_row['house_ph']; 
                } 
            }
                ?>"
                <?php  if(mysqli_num_rows($selectcontact)>0){
                if($contact_row['house_ph']!=""){
                    echo "readonly";
                }
            }
                ?>
                ></td>
            <th>House No./Complex Name : </th> <td><input type="text" name="housePO" id="housePO" class="count" onfocusout="checkempty('housePO');" onkeyup="savebtn();" value="<?php 
             if(mysqli_num_rows($selectcontact)>0){
            if($contact_row['house_po']!=""){
                echo $contact_row['house_po']; 
                } 
            }
                ?>"
                <?php  if(mysqli_num_rows($selectcontact)>0){
                if($contact_row['house_po']!=""){
                    echo "readonly";
                }
            }
                ?>
                ></td>
        </tr> 
        
        <tr>
            <th>Street Name : </th> <td><input type="text" name="streetPH" id="streetPH" class="count" onfocusout="checkempty('streetPH');" onkeyup="savebtn();" value="<?php 
             if(mysqli_num_rows($selectcontact)>0){
            if($contact_row['street_ph']!=""){
                echo $contact_row['street_ph']; 
                } 
            }
                ?>"
                <?php  if(mysqli_num_rows($selectcontact)>0){
                if($contact_row['street_ph']!=""){
                    echo "readonly";
                }
            }
                ?>
                ></td>
            <th>Street Name : </th> <td><input type="text" name="streetPO" id="streetPO" class="count" onfocusout="checkempty('streetPO');" onkeyup="savebtn();" value="<?php 
             if(mysqli_num_rows($selectcontact)>0){
            if($contact_row['street_po']!=""){
                echo $contact_row['street_po']; 
                } 
            }
                ?>"
                <?php  if(mysqli_num_rows($selectcontact)>0){
                if($contact_row['street_po']!=""){
                    echo "readonly";
                }
            }
                ?>
                ></td>
        </tr>
        
        <tr>
            <th>Suburb : </th> <td><input type="text" name="suburbPH" id="suburbPH" onkeyup="savebtn();" value="<?php 
             if(mysqli_num_rows($selectcontact)>0){
            if($contact_row['suburb_ph']!=""){
                echo $contact_row['suburb_ph']; 
                } 
            }
                ?>"
                <?php  if(mysqli_num_rows($selectcontact)>0){
                if($contact_row['suburb_ph']!=""){
                    echo "readonly";
                }
            }
                ?>
                ></td>
            <th>Suburb : </th> <td><input type="text" name="suburbPO" id="suburbPO" onkeyup="savebtn();" value="<?php 
             if(mysqli_num_rows($selectcontact)>0){
            if($contact_row['suburb_po']!=""){
                echo $contact_row['suburb_po']; 
                } 
            }
                ?>"
                <?php  if(mysqli_num_rows($selectcontact)>0){
                if($contact_row['suburb_po']!=""){
                    echo "readonly";
                }
            }
                ?>
                ></td>
        </tr>
        
        <tr>
            <th>Town/City : </th> <td><input type="text" name="TownCityPH" id="TownCityPH" onkeyup="savebtn();" value="<?php 
             if(mysqli_num_rows($selectcontact)>0){
            if($contact_row['towncity_ph']!=""){
                echo $contact_row['towncity_ph']; 
                }
            } 
                ?>"
                <?php if(mysqli_num_rows($selectcontact)>0){
                if($contact_row['towncity_ph']!=""){
                    echo "readonly";
                }
            }
                ?>
                ></td>
            <th>Town/City : </th> <td><input type="text" name="TownCityPO" id="TownCityPO" onkeyup="savebtn();" value="<?php 
            if(mysqli_num_rows($selectcontact)>0){
            if($contact_row['towncity_po']!=""){
                echo $contact_row['towncity_po']; 
                } 
            }
                ?>"
                <?php if(mysqli_num_rows($selectcontact)>0){
                if($contact_row['towncity_po']!=""){
                    echo "readonly";
                }
            }
                ?>
                ></td>
        </tr> 
        
        <tr>
            <th>Postal Code : </th> <td><input type="text" name="postalCodePH" id="postalCodePH" class="count" onfocusout="checkempty('postalCodePH');" onkeyup="savebtn();" value="<?php
            if(mysqli_num_rows($selectcontact)>0){ 
            if($contact_row['postalcode_ph']!=""){
                echo $contact_row['postalcode_ph']; 
                } 
            }
                ?>"
                <?php if(mysqli_num_rows($selectcontact)>0){
                if($contact_row['postalcode_ph']!=""){
                    echo "readonly";
                }
            }
                ?>
                ></td>
            <th>Postal Code : </th> <td><input type="text" name="postalCodePO" id="postalCodePO" class="count" onfocusout="checkempty('postalCodePO');" onkeyup="savebtn();" value="<?php
            if(mysqli_num_rows($selectcontact)>0){ 
            if($contact_row['postalcode_po']!=""){
                echo $contact_row['postalcode_po']; 
                } 
            }
                ?>"
                <?php if(mysqli_num_rows($selectcontact)>0){
                if($contact_row['postalcode_po']!=""){
                    echo "readonly";
                }
            }
                ?>
                ></td>
        </tr>
        <tr>
            <th>Province :</th><td><select name="ProvincePH" id="ProvincePH" class="count" onfocusout="checkempty('ProvincePH');" onkeyup="savebtn();"
            <?php if(mysqli_num_rows($selectcontact)>0){
                if($contact_row['province_ph']!=""){
                    echo "disabled";
                }
            }
                ?>
                >
             <?php 
                        include 'config.php';
                        $sqlProvince = "SELECT id ,province FROM province";
                        $result = $conn -> query($sqlProvince);
                        // $rows = $result -> mysqli_fetch_assoc();
                            //echo $conn;
                            while($rows = $result ->fetch_assoc())
                            {
                                echo  "<option value = " .$rows['id']." " ?> <?php if(mysqli_num_rows($selectcontact)>0){
                                    if($contact_row['province_ph']==$rows['id']){
                                        echo "selected";
                                    }
                                } ?> <?php echo " >" . $rows['province'] . "</option>" ;
                            }
                            
                            
                            
                        ?> 
           </select></td> 
           <th>Province :</th><td><select name="ProvincePO" id="ProvincePO" class="count" onfocusout="checkempty('ProvincePO');" onkeyup="savebtn();"
            <?php if(mysqli_num_rows($selectcontact)>0){
                if($contact_row['province_po']!=""){
                    echo "disabled";
                }
            }
                ?>
                >
             <?php 
                        include 'config.php';
                        $sqlProvince = "SELECT id ,province FROM province";
                        $result = $conn -> query($sqlProvince);
                        // $rows = $result -> mysqli_fetch_assoc();
                            //echo $conn;
                            while($rows = $result ->fetch_assoc())
                            {
                                echo  "<option value = " .$rows['id']." " ?> <?php if(mysqli_num_rows($selectcontact)>0){
                                    if($contact_row['province_po']==$rows['id']){
                                        echo "selected";
                                    }
                                } ?> <?php echo " >" . $rows['province'] . "</option>" ;
                            }
                            
                            
                            
                        ?> 
           </select></td> 
        </tr> 
    </table>
</section>
<div id="save-container" style="width:100%;display:flex;justify-content:flex-end;">
<input type="submit" name="submit" id="submit" class="submit" value="Save" style="width:70px;" onsubmit="checkreadonly();" disabled>
</div>
<hr>
<div class="flex-btns">
    <a id="edit" onclick="savebtn();" class="btn">Edit</a>
    <a id="bottom-next" name="btm-next" class="btn">Next</a>
    </div>
    <hr>
    <br>
    <table style="width: 100%;">
        <tr>
            <th>Create Date :</th> <td><input type="date" id="create-date" name="create-date"></td>
            <th>Last Update Date :</th> <td><input type="date" id="update-date" name="update-date"></td>
        </tr>
        <tr>
            <th>Create User :</th><td><input type="text" id="create-user" name="create-user" value="<?php echo $row['name'] ?>" disabled></td>
            <th>Last Update User :</th><td><input type="text" id="update-user" name="update-user" value="<?php echo $row['name'] ?>" disabled></td>
        </tr>
    </table>
</div>
</form>
<br>
<br>
<footer>

    <div id="footer">
        <span>Supported Browser : </span> 
        <div>
        <i class="fa-brands fa-internet-explorer"></i>
         <i class="fa-brands fa-safari"></i>
         <i class="fa-brands fa-chrome"></i>
         <i class="fa-brands fa-firefox"></i>
    </div>
    <span> © 2022 All rights reserved.</span>
    </div>
  
</footer>

</body>
</html>
