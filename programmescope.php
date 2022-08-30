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
    $selectlearning=mysqli_query($conn,"SELECT * FROM learningprogram");
    if(mysqli_num_rows($selectlearning)>0){
        $learning_row = mysqli_fetch_assoc($selectlearning);
        }
        $selectunitstandard=mysqli_query($conn,"SELECT * FROM unitstandard");
    if(mysqli_num_rows($selectunitstandard)>0){
        $unitstandard_row = mysqli_fetch_assoc($selectunitstandard);
        }
        if(isset($_POST['add'])){
            $learningprogram=mysqli_real_escape_string($conn, $_POST['learning']);
            $qualification=mysqli_real_escape_string($conn, $_POST['qualification']);
            $unitstandard=mysqli_real_escape_string($conn, $_POST['unit_standard']);
            $us_qualification=mysqli_real_escape_string($conn, $_POST['qualification_standard']);
           
            //select learn
            $selectlearn=mysqli_query($conn,"SELECT * FROM learningprogram WHERE id='{$learningprogram}'");
            $learnrow=$selectlearn -> fetch_assoc();
            
            //select qual
            $selectqual=mysqli_query($conn,"SELECT * FROM qualifications WHERE id='{$qualification}'");
            $qualrow=$selectqual -> fetch_assoc();

            //select elective
            $selectedelectives=$_POST['electives'];
            $electiveslength=count($selectedelectives);
            $electivetitle=array();
            $electivecode=array();
            $electivecredits=array();
            for($i=0;$i<$electiveslength;$i++){
            $selectelective=mysqli_query($conn,"SELECT * FROM electives WHERE userid='{$selectedelectives[$i]}'");
                $electiverow=$selectelective -> fetch_assoc();
                array_push($electivetitle,$electiverow['title']);
                array_push($electivecode,$electiverow['code']);
                array_push($electivecredits,$electiverow['credits']);
            }
           $stringelectivetitle= implode(" , ",$electivetitle);
           $stringelectivecode=implode(" , ",$electivecode);
           $stringelectivecredits=implode(" , ",$electivecredits);
            //select unit standard
            $selectus=mysqli_query($conn,"SELECT * FROM unitstandard WHERE id='{$unitstandard}'");
            $usrow=$selectus -> fetch_assoc();

            //select uqual
            $selectusqual=mysqli_query($conn,"SELECT * FROM qual_unitstandard WHERE unique_id='{$_POST['usqualhidden']}'");
            $usqualrow=$selectusqual -> fetch_assoc();

            if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM programmescope WHERE learningnumber='{$learningprogram}'"))==0 && $_POST['quals']==1){
                $sqlinsertlearning = "INSERT INTO programmescope (id,learningtitle,learningid,qualificationtitle,qualificationid,learningstartdate,learningenddate,learningnumber) VALUES ('{$row['user_id']}','{$learnrow['title']}','{$learnrow['qualificationid']}', '{$qualrow['title']}','{$qualrow['learningprogramid']}','{$learnrow['startdate']}','{$learnrow['enddate']}','{$learningprogram}')";
                $query_insert=mysqli_query($conn,$sqlinsertlearning);
                //insert electives
                $sqlinsertelectives="INSERT INTO programmescopeelectives (id,electivetitle,electivecode,electivecredits,qualificationid) VALUES ('{$row['user_id']}','{$stringelectivetitle}','{$stringelectivecode}','{ $stringelectivecredits}','{$_POST['qualification']}')";
                $query_electives=mysqli_query($conn,$sqlinsertelectives);
    }
        }
        if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM programmescopeus WHERE usnumber='{$_POST['usqualhidden']}'"))==0 && $_POST['quals']==2){
            $sqlinsertus = "INSERT INTO programmescopeus (id,unitstandardtitle,unitstandardid,usqualtitle,usqualid,usstartdate,usenddate,usnumber) VALUES ('{$row['user_id']}','{$usrow['title']}','{$usrow['unitid']}', '{$usqualrow['title']}','{$usqualrow['qualid']}','{$usrow['start_date']}','{$usrow['end_date']}','{$_POST['usqualhidden']}')";
            $query_insert=mysqli_query($conn,$sqlinsertus);
    }
    
    if(isset($_POST['del'])){
        $delete=mysqli_query($conn,"DELETE FROM programmescope WHERE learningnumber='{$_POST['delete']}'");
        $deleteelectives=mysqli_query($conn,"DELETE FROM programmescopeelectives WHERE qualificationid='{$_POST['deletebtn']}'");

    }
    if(isset($_POST['usdel'])){
        $delete=mysqli_query($conn,"DELETE FROM programmescopeus WHERE usnumber='{$_POST['usdelete']}'");
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/programme.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <script type="text/javascript" src="./js/step2.js" defer></script>
    <script type="text/javascript" src="./js/step3.js" defer></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
    <input type="hidden" id="hidden" value="3">
<section class="path">
<div class="path1">
    <div class="card ">
        <li>
            <span class="list-num">1</span>
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
                <li class="active">
                    <span class="list-num first">3</span>
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
    <form action=
            "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    
    <div class="flex-btns-2">

<a id="edit" name="edit" onclick="savebtn();" class="btn">Edit</a>
<a id="upper-next" name="upr-next" class="btn">Next</a>
</div>
    <section class="contact-info">

    <table style="width:100%;border-collapse:collapse;">
    <tr>
        <td>
            <input type="radio" id="qualification-btn" name="quals" value="1" onchange=hide(); checked>
            <label for="qualification"> Qualifications </label> 
        </td>
        <td>
            <input type="radio" id="unit-btn" name="quals" value="2" onchange=hide();>
            <label for="unit"> Unit Standards </label>
        </td>   
        <td>
            <table style="border:1px solid #e2e2e2;width:100%;">
                <tr>
                    <th style="text-align:left;border-bottom:1px solid #e2e2e2;background-color:#00c16e;color:white;" colspan="2"> Search Options: </th>
                </tr>
                <tr>
                    <td>
                        <input type="radio" id="id" name="search" value="by id">
                        <label for="id"> By Id </label>
                    </td>
                    <td>
                        <input type="radio" id="title" name="search" value="by title">
                        <label for="id"> By Title </label>
                    </td>    
                </tr>
            </table>
        </td>
    </tr>
    <tr>
    <td colspan="4"> <hr> </td>
    <tr>
    <tr id="learning-label">
        <td style="text-align:right;"> <label for="learning"> Learning Program: </label> </td>
        <td colspan="2">
        
            <select style="width:100%;height:30px;" id="learning" name="learning" onchange=change();> 
            <?php 
                        include 'config.php';
                        $sqllearning = "SELECT id ,title FROM learningprogram";
                        $result = $conn -> query($sqllearning);
                        // $rows = $result -> mysqli_fetch_assoc();
                            //echo $conn;
                            while($rows = $result ->fetch_assoc())
                            {
                                echo  "<option value = " .$rows['id']." " ?> <?php if(mysqli_num_rows($selectlearning)>0){
                                    if($learning_row['title']==$rows['id']){
                                        echo "selected";
                                    }
                                } ?> <?php echo " >" . $rows['title'] . "</option>" ;
                            }
                            
                            
                            
                        ?> 
             </select>
             
        </td>
    </tr>
    <tr  id="qualification-label">
    <td style="text-align:right;"> <label for="Qualification"> Qualification: </label> </td>
    <td colspan="2">
            <select style="width:100%;height:30px;" id="Qualification" name="qualification" onchange=electives();> 
            <option> </option>
            <?php 
                        include 'config.php';
                        $sqllearning = "SELECT id ,title FROM learningprogram";
                        $sqlqual = "SELECT id ,title FROM qualifications";
                        $result = $conn -> query($sqllearning);
                        $results = $conn -> query($sqlqual);
                        // $rows = $result -> mysqli_fetch_assoc();
                            //echo $conn;
                            while($rows = $results ->fetch_assoc())
                            {
                                echo  "<option hidden value = " .$rows['id']." " ?> <?php if(mysqli_num_rows($selectlearning)>0){
                                    if($learning_row['title']==$rows['id']){
                                        echo "selected";
                                    }
                                } ?> <?php echo " >" . $rows['title'] . "</option>" ;
                            }
                            
                            
                            
                        ?> 
             </select>
             
    </td>
    <td style="text-align:right;">
        <button type="button" value="Choose Electives" class="flex-btns" id="elective-btn" onclick=elective();> Choose Electives </button>
    </td>
    </tr>
    <tr id="elective-heading" hidden>
    <td colspan="4" align=center style="background-color:#e2e2e2;border-radius:5px;">   <h2> Choose electives </h2> </td>
    <tr id="elective-table" hidden>
        <td colspan="4">
        <table class="learning-units">
            <tr>
                <td> Select </td>
                <td> Code </td>
                <td> Title </td>
                <td> Credits </td>
            </tr>
            <?php include 'config.php';
                $sqlelectives="SELECT * FROM electives";
                $result=$conn -> query($sqlelectives);
                while($rows = $result ->fetch_assoc())
                            {
                                echo  "<tr class='elective_row' hidden>" ?><?php if($rows['title']!=" "){ echo 
                                "<td> <input type='checkbox' class='elective' name='elective[]' onchange=getelectiveid(); value='";?><?php echo $rows['id']."'>";?> 
                                <?php echo " <input type='checkbox' class='electives' hidden name='electives[]' value='" . $rows['userid'] . "'</td>"; }?>
                                <?php echo "<td>" . $rows['code'] . "</td>" ;
                                echo "<td>" . $rows['title'] . "</td>";
                                echo "<td>" . $rows['credits'] . "</td>";
                                echo "</tr>";
                            }
            ?>
        </table>
            
    </tr>
    <tr id="unit-label" hidden>
    <td style="text-align:right;"> <label for="unit_standard"> Unit Standard: </label> </td>
    <td colspan="2">
            <select style="width:100%;height:30px;" id="unit_standard" name="unit_standard" onchange=changestandard();> 
            <option> </option>
            <?php 
                        include 'config.php';
                        $sqlunitstandard = "SELECT id ,title FROM unitstandard";
                        $result = $conn -> query($sqlunitstandard);
                        // $rows = $result -> mysqli_fetch_assoc();
                            //echo $conn;
                            while($rows = $result ->fetch_assoc())
                            {
                                echo  "<option value = " .$rows['id']." " ?> <?php if(mysqli_num_rows($selectunitstandard)>0){
                                    if($unitstandard_row['title']==$rows['id']){
                                        echo "selected";
                                    }
                                } ?> <?php echo " >" . $rows['title'] . "</option>" ;
                            }
                            
                            
                            
                        ?> 
             </select>
             
    </td>                
    </tr>
    <tr id="qual-label" hidden>
    <td style="text-align:right;"> <label for="Qualifiaction_standard"> Qualification: </label> </td>
    <td colspan="2">
            <select style="width:100%;height:30px;" id="Qualification_standard" name="qualification_standard" onchange=getusqualid();> 
            <option> </option>
            <?php 
                        include 'config.php';
                        $sqlqual = "SELECT id ,title FROM qual_unitstandard";
                        $results = $conn -> query($sqlqual);
                        // $rows = $result -> mysqli_fetch_assoc();
                            //echo $conn;
                            while($rows = $results ->fetch_assoc())
                            {
                                echo  "<option hidden value = " .$rows['id']." " ?> <?php if(mysqli_num_rows($selectlearning)>0){
                                    if($learning_row['title']==$rows['id']){
                                        echo "selected";
                                    }
                                } ?> <?php echo " >" . $rows['title'] . "</option>" ;
                            }
                            
                            
                        ?> 
                        <input type="radio" name="usqualhidden" id="usqualhidden" checked hidden>
             </select>
             
    </td>              
    </tr>
    <tr>
        <td colspan="4"> <hr> </td>
    <tr>
    <tr>
        <td style="text-align:right;"> <label for="start-date"> Start Date: </label> </td>
        <td colspan="1">
            <input type="date" id="start-date" style="height:30px;width:50%;">
             
        </td>
        <td style="text-align:right;"> <label for="end-date"> End Date: </label> </td>
        <td colspan="1">
            <input type="date" id="end-date" style="height:30px;width:50%;">
             
        </td>
    </tr>
    <tr>
        <td colspan="4" style="text-align:right;">
            <input type="submit" class="flex-btns" id="add" name="add" value="Add Learning Unit">
        </td>
    </tr>
    <tr>
        <td colspan="4"> <hr> </td>
    <tr>
    <tr>
     <td colspan="4" align=center style="background-color:#e2e2e2;border-radius:5px;">   <h2> Qualification Learning Units </h2> </td>
    </tr>
    <tr>
        <td colspan="4">
        <table class="learning-units">
            <tr>
                <td> </td>
                <td> Qualification ID </td>
                <td> Title </td>
                <td> Learning Programme ID </td>
                <td> Start Date </td>
                <td> End Date </td>
            </tr>
          
            
<tr>
    <td colspan="6" style="padding:0px;">
        <table class="learning-data" style="width:100%;height:300px;">
        <?php $selectqualsperuser=mysqli_query($conn,"SELECT * FROM programmescope WHERE id='{$row['user_id']}'");
       while($rows=$selectqualsperuser->fetch_assoc()){
                echo "<tr> 
                <td> <input type='submit' value='DELETE' name='del' id='del' class='btns'>
                     <input type='text' value='".$rows['learningnumber']."' name='delete' id='delete' hidden>
                     <input type='text' value='".$rows['learningnumber']."' name='deletebtn' id='deletebtn' hidden>
                     <button type='button' value='view' class='btns'> VIEW US </button>
                </td>
                <td>" . $rows['qualificationid'] . "</td>
                <td>" . $rows['learningtitle'] . "</td>
                <td>" . $rows['learningid'] . "</td>
                <td>" . $rows['learningstartdate'] . "</td>
                <td>" . $rows['learningenddate'] . "</td>
                
                </tr>";
        }
      
            ?>         
        </table>
    </td>
</tr>
        </table>
        <td>
    </tr>
    <tr>
     <td colspan="4" align=center style="background-color:#e2e2e2;border-radius:5px;">   <h2> Unit Standard Learning Units </h2> </td>
    </tr>
    <tr>
        <td colspan="4">
        <table class="learning-units">
            <tr>
                <td> </td>
                <td> Qualification ID </td>
                <td> Unit Standard ID </td>
                <td> Title </td>
                <td> Start Date </td>
                <td> End Date </td>
                <td> Learning Type </td>
            </tr>
            <tr>
    <td colspan="7" style="padding:0px;">
        <table class="learning-data" style="width:100%;height:300px;">
        <?php $selectusperuser=mysqli_query($conn,"SELECT * FROM programmescopeus WHERE id='{$row['user_id']}'");
        if(mysqli_num_rows($selectusperuser)>0){
       while($row=$selectusperuser->fetch_assoc()){
                echo "<tr> 
                <td> <input type='submit' value='DELETE' name='usdel' id='usdel' class='btns'>
                     <input type='text' value='".$row['usnumber']."' name='usdelete' id='usdelete' hidden>
                </td>
                <td>" . $row['usqualid'] . "</td>
                <td>" . $row['unitstandardid'] . "</td>
                <td>" . $row['unitstandardtitle'] . "</td>
                <td>" . $row['usstartdate'] . "</td>
                <td>" . $row['usenddate'] . "</td>
                <td> </td>
                </tr>";
        }
    }
      
            ?>    
        </table>
    </td>
</tr>
        </table>
        <td>
    </tr>
   
   
        </table>
</td>
    </tr>


    
    </table>    

    </section>
    
</div>

</form>
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