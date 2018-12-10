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
                        if($_SESSION['role'] == 'Driver' ){
                            echo '<li><a href="index.php?home=ok" >Home</a></li>
                                <li><a href="index.php?action=myClients"> View my clients </a></li>
                                  <li><a href="index.php?action=edit">Update profile</a></li>
                                  <li><a href="index.php?action=delete" >Delete profile</a></li>
                                  <li><a href="index.php?action=logout" > Logout </a></li>';
                        }
                        elseif($_SESSION['role'] == 'Client' ){
                            echo '<li><a href="index.php?home=ok" >Home  </a></li>
                                  <li><a href="index.php?action=view" > View drivers </a></li>
                                  <li><a href="index.php?action=view_vehicles" > View vehicles </a></li>
                                  <li><a href="index.php?action=liftClub" > View Lift-Clubs </a></li>
                                  <li><a href="index.php?action=logout" > Logout </a></li>';
                        }
                        elseif($_SESSION['role'] == 'Transport' ){
                            echo '<li><a href="index.php?home=ok" >Home</a></li>
                                  <li><a href="index.php?action=addVehicle" > Add Vehicle </a></li>
                                  <li><a href="index.php?action=deleteVehicle" > Delete Vehicle </a></li>
                                  <li><a href="index.php?action=logout" > Logout </a></li>';
                        }
                        elseif($_SESSION['role'] == 'Lift Club' ){
                            echo '<li><a href="index.php?home=ok" >Home</a></li>
                                  <li><a href="index.php?action=viewLiftClub_clients" >View my clients </a></li>
                                  <li><a href="index.php?action=logout" > Logout </a></li>';
                        }
                        else{   // else there's no one logged-in
                            echo '<li><a href="index.php?home=ok" >Home</a></li>
                                  <li><a href="index.php?action=sign_up" > Sign Up </a></li>
                                  <li><a href="index.php?action=login" > Login </a></li>
                                  <li><a href="index.php?action=add" > Add Driver </a></li>';
                        }
                    ?>                   
                </ul>
                </div>     <?php echo '<p style="float: left">Logged in: <b>'.$_SESSION['name'].'</b> ('. $_SESSION['role'] .')</p>' ?>
            
            <div id="content_area">