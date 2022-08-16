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
    <title>Document</title>
</head>
<body>
    <div class="container">
    <input type="hidden" id="hidden" value="4">
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
                <li>
                    <span class="list-num ">3</span>
                    <i class="fa-solid fa-book"></i>
                   <span>Programme Scope</span> 
                  </li>
                </div>

                <div class="card">
                    <li class="active">
                        <span class="list-num first">4</span>
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
    <div class="flex-btns-2">

<a id="edit" name="edit" onclick="savebtn();" class="btn">Edit</a>
<a id="upper-next" name="upr-next" class="btn">Next</a>
</div>
    <section class="contact-info">

    <table style="width:100%;border-collapse:collapse;">
    <tr>
     <td colspan="4" align=center style="background-color:#e2e2e2;border-radius:5px;">   <h2> Qualifications </h2> </td>
    </tr>
    <tr>
        <td colspan="4">
        <table class="learning-units">
            <tr>
                <td> </td>
                <td> Qualification ID </td>
                <td> Title </td>
                <td> Learning Programme ID </td>
                <td> Assessor ID Number </td>
                <td> Moderator ID Number </td>
            </tr>
            
<tr>
    <td colspan="6" style="padding:0px;">
        <table class="learning-data" style="width:100%;height:300px;">
            <tr>
                <td align=center> <button type="button" value="Edit" class="flex-btns"> Edit </button> 
                </td>
                <td> 57712 </td>
                <td> Further Education and Training Certificate: Generic Manag	 </td>
                <td> 74360  </td>
                <td> 0 </td>
                <td> 0 </td>
            </tr>
            
        </table>
    </td>
</tr>
        </table>
        <td>
    </tr>
    <tr>
     <td colspan="4" align=center style="background-color:#e2e2e2;border-radius:5px;">   <h2> Unit Standards </h2> </td>
    </tr>
    <tr>
        <td colspan="4">
        <table class="learning-units">
            <tr>
                <td> </td>
                <td> Qualification ID </td>
                <td> Title </td>
                <td> Learning Programme ID </td>
                <td> Assessor ID Number </td>
                <td> Moderator ID Number </td>
            </tr>
            
<tr>
    <td colspan="6" style="padding:0px;">
        <table class="learning-data" style="width:100%;height:300px;">
            <tr>
            </tr>
            
        </table>
    </td>
</tr>
        </table>
        <td>
    </tr>
   
    <tr>
     <td colspan="4" align=center style="background-color:#e2e2e2;border-radius:5px;">   <h2> Assesors </h2> </td>
    </tr>
    <tr>
        <td colspan="4">
        <table class="learning-units">
            <tr>
                <td> </td>
                <td> Learning Unit Type </td>
                <td> Learning Unit ID </td>
                <td> Learning Unit Title</td>
                <td> Assessor ID Number </td>
                <td> Assessor Name </td>
            </tr>
            
<tr>
    <td colspan="6" style="padding:0px;">
        <table class="learning-data" style="width:100%;height:300px;">
            <tr>
                <td align=center> <button type="button" value="Delete" class="btns"> Delete </button> 
                <button type="button" value="add staff" class="btns"> Add Staff </button>
                </td>
                <td> Qualification </td>
                <td> 50584	 </td>
                <td> General Education and Training Certificate: Clothing Manufacturing Processes	  </td>
                <td> DN022100 </td>
                <td> Tendai Gonzo </td>
            </tr>
            
        </table>
    </td>
</tr>
        </table>
        <td>
    </tr>
    <tr>
     <td colspan="4" align=center style="background-color:#e2e2e2;border-radius:5px;">   <h2> Moderators </h2> </td>
    </tr>
    <tr>
        <td colspan="4">
        <table class="learning-units">
            <tr>
                <td> </td>
                <td> Learning Unit Type </td>
                <td> Learning Unit ID </td>
                <td> Learning Unit Title</td>
                <td> Moderator ID Number </td>
                <td> Moderator Name </td>
            </tr>
            
<tr>
    <td colspan="6" style="padding:0px;">
        <table class="learning-data" style="width:100%;height:300px;">
            <tr>
                <td align=center> <button type="button" value="Delete" class="btns"> Delete </button> 
                <button type="button" value="add staff" class="btns"> Add Staff </button>
                </td>
                <td> Qualification </td>
                <td> 50584	 </td>
                <td> General Education and Training Certificate: Clothing Manufacturing Processes	  </td>
                <td> 7906271112188 </td>
                <td> Gotora Rumbidzayi </td>
            </tr>
            
        </table>
    </td>
</tr>
        </table>
        <td>
    </tr>
    <tr>
     <td colspan="4" align=center style="background-color:#e2e2e2;border-radius:5px;">   <h2> Facilitators </h2> </td>
    </tr>
    <tr>
        <td style="width:10%;">
         <input type="radio" id="qualifications" name="facilitator"> 
         <label for="qualifications"> Qualifications </label>        
        </td>
        <td>
         <input type="radio" id="unit-standards" name="facilitator"> 
         <label for="unit-standards"> Unit Standards </label>        
        </td>
    <tr>
    <tr>
        <td colspan="4"> <hr> </td>
    </tr>
    <tr>
        <td colspan="3"> <label for="learning-programme"> Qualifiactions/Learning Programme: </label>
             <select style="width:80%;height:35px;" id="learning-programme">
                <option> </option>
            </select>
        </td>
        <td align=right> <button type="button" value="Search Facilitator" class="flex-btns"> Search Facilitator </button>
    </tr>
    <tr>
        <td colspan="3"> <label for="unit-standard"> Unit Standard: </label>
             <select style="width:88.7%;height:35px;" id="unit-standard">
                <option> </option>
            </select>
        </td>
        <td style="width:10%;"> </td>
    </tr>
    <tr>
        <td colspan="3"> <label for="learning-programme"> Facilitator: </label>
             <select style="width:30%;height:35px;">
                <option> </option>
            </select>
            <input type="text" style="width:60%;height:35px;">
        </td>
        <td align=right style="width:10%;"> <button type="button" value="Search Facilitator" class="flex-btns"> Add LP Facilitator </button>
    </tr>

    <tr>
        <td colspan="4">
        <table class="learning-units">
            <tr>
                <td> </td>
                <td> Learning Unit Type </td>
                <td> Learning Unit ID </td>
                <td> Learning Unit Title</td>
                <td> Facilitator ID Number </td>
                <td> Facilitator Name </td>
            </tr>
            
<tr>
    <td colspan="6" style="padding:0px;">
        <table class="learning-data" style="width:100%;height:300px;">
            <tr>
                <td align=center> <button type="button" value="Delete" class="flex-btns"> Delete </button> 
                </td>
                <td> Qualification/LP </td>
                <td> 50584	 </td>
                <td> General Education and Training Certificate: Clothing Manufacturing Processes	  </td>
                <td> 8707045529080 </td>
                <td> Anele Somgcolo </td>
            </tr>
            <tr>
                <td align=center> <button type="button" value="Delete" class="flex-btns"> Delete </button> 
                </td>
                <td> Qualification/LP </td>
                <td> 50584	 </td>
                <td> General Education and Training Certificate: Clothing Manufacturing Processes	  </td>
                <td> DN022100 </td>
                <td> Tendai Gonzo </td>
            </tr>
            
        </table>
    </td>
</tr>
        </table>
        <td>
    </tr>


    
    </table>    

    </section>
</div>

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