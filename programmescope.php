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
    <form action="" method="POST">
    
    <div class="flex-btns-2">

<a id="edit" name="edit" onclick="savebtn();" class="btn">Edit</a>
<a id="upper-next" name="upr-next" class="btn">Next</a>
</div>
    <section class="contact-info">

    <table style="width:100%;border-collapse:collapse;">
    <tr>
        <td>
            <input type="radio" id="qualification" name="quals" value="Qualifications">
            <label for="qualification"> Qualifications </label> 
        </td>
        <td>
            <input type="radio" id="unit" name="quals" value="Unit Standrads">
            <label for="unit"> Unit Standrads </label>
        </td>   
        <td>
            <input type="radio" id="skills" name="quals" value="Skills Programs">
            <label for="skills"> Skills Programs </label>
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
    <tr>
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
    <tr>
    <td style="text-align:right;"> <label for="Qualifiaction"> Qualification: </label> </td>
    <td colspan="2">
            <select style="width:100%;height:30px;" id="Qualification" name="qualification"> 
            <option> </option>
            <?php 
                        include 'config.php';
                        $sqllearning = "SELECT id ,title FROM learningprogram";
                        $result = $conn -> query($sqllearning);
                        // $rows = $result -> mysqli_fetch_assoc();
                            //echo $conn;
                            while($rows = $result ->fetch_assoc())
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
        <button type="button" value="Choose Electives" class="flex-btns"> Choose Electives </button>
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
            <button type="button" class="flex-btns" value="add learning unit"> Add Learning Unit </button>
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
            <tr>
                <td> <button type="button" value="delete" class="btns"> DELETE </button>
                     <button type="button" value="view" class="btns"> VIEW US </button> 
                </td>
                <td> 50584 </td>
                <td> General Education and Training Certificate: Clothing Manufacturing Processes	 </td>
                <td>  </td>
                <td> 2018-07-01 </td>
                <td> 2023-07-01 </td>
            </tr>
            
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
                <td> Learning Programme ID </td>
                <td> Unit Standard ID </td>
                <td> Title </td>
                <td> Start Date </td>
                <td> End Date </td>
                <td> Learning Type </td>
            </tr>
            <tr>
    <td colspan="8" style="padding:0px;">
        <table class="learning-data" style="width:100%;height:300px;">
            <tr>
                <td> </td>
            </tr>
            
        </table>
    </td>
</tr>
        </table>
        <td>
    </tr>
   
    <tr>
     <td colspan="4" align=center style="background-color:#e2e2e2;border-radius:5px;">   <h2> Skills Programs Learning Units </h2> </td>
    </tr>
    <tr>
        <td colspan="4" style="border:0px;">
        <table class="learning-units">
            <tr>
                <td> </td>
                <td> Qualification ID </td>
                <td> Unit Standard ID </td>
                <td> Title </td>
                <td> Start Date </td>
                <td> End Date </td>
                <td> Learning Type </td>
                <td> SP Title </td>
            </tr>
<tr>
    <td colspan="8" style="padding:0px;">
        <table class="learning-data" style="width:100%;height:300px;">
            <tr>
                <td> </td>
            </tr>
            
        </table>
    </td>
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