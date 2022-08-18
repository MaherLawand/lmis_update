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

        echo "<header> <h2> Welcome "  . $row['name'] . " </h2> <a id='logout' href='logout.php'>Logout</a> </header>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QMS</title>
    <link rel="stylesheet" href="./css/2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <script type="text/javascript" src="./js/step2.js" defer></script>
    <script type="text/javascript" src="./js/common.js" defer></script>
</head>
<input type="hidden" id="hidden" value="2">
<div class="container">
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
                <li class="active">
                    <span class="list-num first">2</span>
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
        <P>Please check the compliance of your Organisational Quality Management System against the criteria listed below. Click on <B>Next </B>to save yur selections and click <b>Back</b> to return to the previous Details screen.</P>
        <div class="flex-btns">

<a id="edit" name="edit" onclick="savebtn();" class="btn">Edit</a>
<a id="upper-next" name="upr-next" class="btn">Next</a>
</div>
    </div>
    </section>
<body>
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
<table>
<tr><td><h4>Document N0:</h4></td>
<td><h4>Policy Area:</h4></td> 
<td><h4>Policy Criteria:</h4></td>
<td><h4>Checked:</h4></td></tr> 
<tr> <td> <P>1</P></td>
    <td> <p> Quality Policy </p></td>
    <td> <p> Vision, mission, values and commitment </p></td>
    <td> <input type="checkbox" id="one" onclick=check(one); > </td>
</tr>
<tr> <td> <P>1</P></td>
    <td> <p> Quality Policy </p></td>
    <td> <p> Maintenance access and distribution </p></td>
    <td> <input type="checkbox" id="two" onclick=check(two); > </td>
</tr>
<tr> <td> <P>1</P></td>
    <td> <p> Quality Policy </p></td>
    <td> <p> Role players in managing the QMS </p></td>
    <td> <input type="checkbox" id="three" onclick=check(three); ;> </td>
</tr>
<tr> <td> <P>1</P></td>
    <td> <p> Quality Policy </p></td>
    <td> <p> Review Mechanisms </p></td>
    <td> <input type="checkbox"id="four" onclick=check(four); > </td>
</tr>
<tr> <td> <P>2</P></td>
    <td> <p> Quality Policy </p></td>
    <td> <p> Facilatators/assessors/moderators-selection </p></td>
    <td> <input type="checkbox" id="five" onclick=check(five); > </td>
</tr>
<tr> <td> <P>2</P></td>
    <td> <p> Quality Policy </p></td>
    <td> <p> Service level agreements/code of conduct </p></td>
    <td> <input type="checkbox" id="six" onclick=check(six); > </td>
</tr>
<tr> <td> <P>2</P></td>
    <td> <p> Quality Policy </p></td>
    <td> <p> Staff development </p></td>
    <td> <input type="checkbox" id="seven" onclick=check(seven); > </td>
</tr>
<tr> <td> <P>3</P></td>
    <td> <p> ETD Staff Management </p></td>
    <td> <p> Design, development of new learning programmes </p></td>
    <td> <input type="checkbox" id="eight" onclick=check(eight); > </td>
</tr>
<tr> <td> <P>3</P></td>
    <td> <p> ETD Staff Management </p></td>
    <td> <p> Blueprints/curriculum principles </p></td>
    <td> <input type="checkbox" id="nine" onclick=check(nine); > </td>
</tr>
<tr> <td> <P>3</P></td>
    <td> <p> ETD Staff Management </p></td>
    <td> <p> Corporate identity and branding </p></td>
    <td> <input type="checkbox" id="ten" onclick=check(ten); > </td>
</tr>
<tr> <td> <P>3</P></td>
    <td> <p> ETD Staff Management </p></td>
    <td> <p> Focus and quality of provision </p></td>
    <td> <input type="checkbox" id="eleven" onclick=check(eleven); > </td>
</tr>
<tr> <td> <P>3</P></td>
    <td> <p> ETD Staff Management </p></td>
    <td> <p> Offsite workplace management </p></td>
    <td> <input type="checkbox" id="twelve" onclick=check(twelve); > </td>
</tr>
<tr> <td> <P>3</P></td>
    <td> <p> ETD Staff Management </p></td>
    <td> <p> Learner support </p></td>
    <td> <input type="checkbox" id="thirteen" onclick=check(thirteen); > </td>
</tr>
<tr> <td> <P>3</P></td>
    <td> <p> ETD Staff Management </p></td>
    <td> <p> Appeals </p></td>
    <td> <input type="checkbox" id="fourteen" onclick=check(fourteen); > </td>
</tr>
<tr> <td> <P>3</P></td>
    <td> <p> ETD Staff Management </p></td>
    <td> <p> Review/Evaluation </p></td>
    <td> <input type="checkbox" id="fifteen" onclick=check(fifteen);> </td>
</tr>
</table>

    
</body>
</html>