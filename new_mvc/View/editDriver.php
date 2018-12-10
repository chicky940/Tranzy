<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
          <title><?php echo $title; ?></title>
    <script type="text/javascript" src="../JavaScript/jquery-1.3.2.min.js"></script>
    <script type="text/javascript">
        function mainmenu() {
            $(" #nav ul ").css({ display: "none" }); // Opera Fix

            $(" #nav li").hover(function () {
                $(this).find('ul:first').css({ visibility: "visible", display: "none" }).show(400);
            }
                , function () {
                    $(this).find('ul:first').css({ visibility: "hidden" });
                });
        }

        $(document).ready(function () {
            mainmenu();
        });
    </script>
    <link rel="stylesheet" type="text/css" href="Styles/StyleSheet.css" />
    </head>
    <body>
            <body>
            <div id="wrapper">
            <div id="banner">
                    <table>
                <tr>
                    <td>
                        <img src="Images/Transy.png"/> 
                    </td>
                    <td class="auto-style1"></td>
                    <td class="auto-style2">
            &nbsp;<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b742f14b8270914"></script><div class="addthis_inline_share_toolbox"></div>
                        </td>
                </tr>
            </table>
            </div>
        
                <div id="navigation">
		<ul id="nav">
                    <?php 
                    include 'authenticate.php';
                        if($_SESSION['role'] == 'Driver' ){
                            echo '<li><a href="index.php?home=ok" >Home</a></li>
                                  <li><a href="index.php?action=myClients"> View my clients </a></li>
                                  <li><a href="index.php?action=edit">Update profile</a></li>
                                  <li><a href="index.php?action=delete" >Delete profile</a></li>
                                  <li><a href="index.php?action=logout" > Logout </a></li>'; 
                        }
                        else if($_SESSION['role'] == 'Client' ){
                            echo '<li><a href="index.php?home=ok" >Home</a></li>
                                  <li><a href="index.php?action=view" >View drivers </a></li>
                                  <li><a href="index.php?action=liftClub" >View Lift-Clubs </a></li>
                                  <li><a href="index.php?action=logout" > Logout </a></li>';
                        }
                        else if($_SESSION['role'] == 'Transport' ){
                            echo '<li><a href="index.php?home=ok" >Home</a></li>
                                  <li><a href="index.php?action=add" > Add Driver </a></li>
                                  <li><a href="index.php?action=view" >View</a></li>
                                    <li><a href="index.php?action=delete" > Delete </a></li>
                                  <li><a href="index.php?action=logout" > Logout </a></li>';
                        }
                        else if($_SESSION['role'] == 'Lift Club' ){
                            echo '<li><a href="index.php?home=ok" >Home</a></li>
                                  <li><a href="index.php?action=view" >View</a></li>
                                    <li><a href="index.php?action=logout" > Logout </a></li>';
                        }
                        else{   // else there's no one has logged in
                            echo '<li><a href="index.php?home=ok" >Home</a></li>
                                  <li><a href="index.php?action=sign_up" > Sign Up </a></li>
                                  <li><a href="index.php?action=login" > Login </a></li>';
                        }
                    ?>                   
                </ul>
                </div> 
                
        <?php echo 'Logged in as: <b>'. $_SESSION['role'] .'</b>' ?>
                
            <div id="content_area">
                 <table style='width: 100%'>
                    <tr>
                        <td style='text-align: center; font-weight: 700; color: #FFFFFF; background-color: #8B0000'> Update Driver </td>
                    </tr>
                </table>
                <center><form method='get'>
        <?php
             if(is_array($driverArr)){
                                foreach ($driverArr as $driver){
        ?>
            <table border='0' cellspacing='5' cellpadding='5' style='background-color: #FFFBD6;'>
            <tr>
                <td>Name:</td>
                <td><input type='text' name='txtName' value='<?php echo $driver->name ?>' required /> </br></td>
                </tr>
                <tr>
                <td>Surname:</td>
                <td><input type='text' name='txtSurname' value='<?php echo $driver->surname ?>' required  /> </br></td>
                </tr>
                <tr>
                <td>Email:</td>
                <td><input type='email' name='txtEmail' value='<?php echo $driver->email ?>' required  /> </br></td>
                </tr>
                <tr>
                <td>Cell No:</td>
                <td><input type='text' name='txtCellNo' value='<?php echo $driver->cell ?>' required  /> </br></td>
                </tr>
                <tr>
                <td>License Type:</td>
                <td> <select name='dropDownLicense'>
                <option>Code 8</option>
                <option>Code 10</option>
                <option>Code 14</option>
                      </select> </br></td>
                </tr>
                <tr>
                <td>Amount:</td>
                <td><input type='number' name='txtAmt' value='<?php echo $driver->amount ?>' required  /> </br></td>
                </tr>
                <tr>
                <td>Location:</td>
                </tr>
                <tr>
               <td>Experience:</td>
               <td><input type='text' name='txtExperience' value='<?php echo $driver->experience ?>' required  /> </br></td>
                </tr>
                <tr>
                <td><input type='submit' value='Save' name='btnUpdate' class='button' /></td>
                <td></td>
                </tr>
                </tbody>
                </table>
                        <?php
                        }
                        
                    }
                    echo $messg;
                        ?>
                </form> </center>
            </div>
                
		
            <div id="sidebar">
        
            </div>
        
            <div id="footer">
            <p> &copy; 2018 Transy.co.za All Rights Reserved </p>
            </div>
        </div>
    </body>
    </body>
</html>