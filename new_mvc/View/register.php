<?php
ob_start();
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
                                    <li><a href="index.php?action=add" >Add</a></li>
                                    <li><a href="index.php?action=edit">Edit</a></li>
                                    <li><a href="index.php?action=delete" >Delete</a></li>';
                        }
                        elseif($_SESSION['role'] == 'Client' ){
                            echo '<li><a href="index.php?home=ok" >Home</a></li>
                                  <li><a href="index.php?action=view" >View</a></li>';
                        }
                        else{   // else there's no one has logged in
                            echo '<li><a href="index.php?home=ok" >Home</a></li>
                                  <li><a href="index.php?action=sign_up" > Sign Up </a></li>
                                  <li><a href="index.php?action=login" > Login </a></li>';
                        }
                    ?>
                                        
                </ul>
                </div> 
    <div id="content_area">
        <form  method="post">
                <h3> Sign Up </h3>
        <table border="0" cellspacing="5" cellpadding="5" style="background-color: #FFFBD6;">
                <tbody>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="txtName" value="<?php echo $name?>" required /> </br></td>
                </tr>
                <tr>
                    <td>Surname:</td>
                    <td><input type="text" name="txtSurname" value="<?php echo $surname?>"  required  /> </br></td>
                </tr>
                <tr>
                    <?php echo $userExists_err; ?>
                    <td>Email:</td>
                    <td><input type="email" name="txtEmail" value="<?php echo $email?>" required /> </br></td>
                </tr>
                <tr> 
                    <?php echo $celNo_lengErr; ?>
                    <td>Cell No:</td>
                    <td><input type="text" name="txtCellNo"  value="<?php echo $cell?>"  required /> </br></td>
                </tr>

                <tr>
                    <td>Residential Address:</td>
                    <td> 
                        <textarea name="address" required> <?php echo $addr ?> </textarea>
                    </td>
                </tr>
                <tr>
                    <?php echo $dropdownErr?>
                    <td> User Type: </td>
                    <td><select name="user_role"> 
                            <option value="null"> -Please Select-</option>
                            <option value="Driver" <?php echo (isset($_POST['user_role']) && $_POST['user_role'] == 'Driver') ? 'selected="selected"' : ''; ?> > Driver</option>
                            <option value="Client" <?php echo (isset($_POST['user_role']) && $_POST['user_role'] == 'Client') ? 'selected="selected"' : ''; ?>> Client </option>
                            <option value="Transport Owner" <?php echo (isset($_POST['user_role']) && $_POST['user_role'] == 'Transport Owner') ? 'selected="selected"' : ''; ?>> Transport Owner </option>
                            <option value="Lift Club" <?php echo (isset($_POST['user_role']) && $_POST['user_role'] == 'Lift Club') ? 'selected="selected"' : ''; ?>> Lift Club </option>
                        </select>  </br></td>
                </tr>
                <tr>
                    <?php 
                          echo $passwdErr;
                          echo $passLengErr;
                    ?>
                    <td> Password:</td>
                    <td><input type="password" name="passwd" required /> </br></td>
                </tr>
                <tr>
                    <td> Confirm Password:</td>
                    <td><input type="password" name="confirm_passwd" required /> </br></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Sign up" name="btn_signUp" class="button" /></td>
                </tr>
            </tbody>
        </table>
            <?php 
                echo $msg;
                echo $success_msg;
            ?>
            </form>
    </div>
		        
            <div id="footer">
            <p> &copy; 2018 Transy.co.za All Rights Reserved </p>
            </div>
        </div>
    </body>
    </body>
</html>