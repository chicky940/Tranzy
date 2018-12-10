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
                $(this).find('ul:first').css({ visibility:  "visible", display: "none" }).show(400);
            }
                , function () {
                    $(this).find('ul:first').css({ visibility: "hidden" });
                });
        }

        $(document).ready(function () {
            mainmenu();
        });
    </script>
    <script type="text/javascript">
        $(function() {
            var genderValue = localStorage.getItem("genderValue");
            if(genderValue != null) {
                $("select[name=types]").val(genderValue);
            }

            $("select[name=types]").on("change", function() {
                localStorage.setItem("genderValue", $(this).val());
            });
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
                                  <li><a href="index.php?action=add" >Add</a></li>
                                  <li><a href="index.php?action=edit">Edit</a></li>
                                  <li><a href="index.php?action=delete" >Delete</a></li>
                                  <li><a href="index.php?action=logout" > Logout </a></li>';
                        }
                        else if($_SESSION['role'] == 'Client' ){
                            echo '<li><a href="index.php?home=ok" >Home</a></li>
                                  <li><a href="index.php?action=view" >View drivers </a></li>
                                  <li><a href="index.php?action=view" >View vehicles </a></li>
                                  <li><a href="index.php?action=liftClub" >View Lift-Clubs </a></li>
                                  <li><a href="index.php?action=logout" > Logout </a></li>';
                        }
                        else if($_SESSION['role'] == 'Transport' ){
                            echo '<li><a href="index.php?home=ok" >Home</a></li>
                                  <li><a href="index.php?action=add" > Add Driver </a></li>
                                  <li><a href="index.php?action=view" >View Drivers </a></li>
                                  <li><a href="index.php?action=addVehicle" >Add Vehicle </a></li>
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
                
                <?php echo '<p style="float: left">Logged in: <b>'.$_SESSION['name'].'</b> ('. $_SESSION['role'] .')</p>' ?>
            <div id="content_area">
                <table style='width: 100%'>
                    <tr>
                        <td style='text-align: center; font-weight: 700; color: #FFFFFF; background-color: #8B0000'>Search Driver:</td>
                    </tr>
                </table>
                <br>
                <center>
                    <form method='get' width='100%'>
                    Please Select a License Type:
                        <select name="types" >
                            <option value='%'>ALL</option>
                            <option value='Code 8' <?php echo (isset($_GET['types']) && $_GET['types'] == 'Code 8') ? 'selected="selected"' : ''; ?>> Code 8</option>
                            <option value='Code 10' <?php echo (isset($_GET['types']) && $_GET['types'] == 'Code 10') ? 'selected="selected"' : ''; ?>> Code 10</option>
                            <option value='Code 14' <?php echo (isset($_GET['types']) && $_GET['types'] == 'Code 14') ? 'selected="selected"' : ''; ?>> Code 14</option>
                        </select>
                    
                    <input type ="submit" name="filterDriver" value ='Search' />
                    </form>
                </center>
                <br>
                <table style='width: 100%'>
                    <tr>
                        <td style='text-align: center; font-weight: 700; color: #FFFFFF; background-color: #8B0000'>Available Drivers</td>
                    </tr>
                </table>
              <?php
                    if(is_array($driverArr)){
                        foreach ($driverArr as $driver){
                    
                            echo "
                     <table class='driverTable'>
                             <tr class='driverTable tr th'>
                                <th rowspan='6' width='215px' class='table.driverTable img'><img runat = 'server' src = '$driver->image' /></th>
                                <th>Name:</th>
                                <td>$driver->name</td>
                             </tr>
                             <tr>
                                <th>Surname:</th>
                                <td>$driver->surname</td>
                             </tr>
                             <tr>
                                <th>Email:</th>
                                <td>$driver->email</td>
                             </tr>
                             <tr>
                                <th>Cell:</th>
                                <td>$driver->cell</td>
                             </tr>
                             <tr>
                                <th>License:</th>
                                <td>$driver->license</td>
                             </tr>
                             <tr>
                                <th>Amount:</th>
                                <td>$driver->amount</td>
                             </tr>
                             <tr>
                                <th>Experience:</th>
                                <td>$driver->experience</td>
                             </tr>  
                             <tr>
                                <th> </th>
                                <td> </td>
                                <td> <a href='index.php?hireDriver=$driver->id' > Hire driver </a> </td>
                             </tr>
                       </table>";
                        }
                    }
                ?>
                         
                
                    
            </div>
                        
            <div id="footer">
            <p> &copy; 2018 Transy.co.za All Rights Reserved </p>
            </div>
        </div>
    </body>
    </body>
</html>