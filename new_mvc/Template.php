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
                    
                    <li><a href="index.php?home=ok" runat="server">Home</a></li>
                    <li><a href="index.php?action=view" runat="server">View</a></li>
                    <li><a href="index.php?action=add" runat="server">Add</a></li>
                    <li><a href="index.php?action=edit" runat="server">Edit</a></li>
                    <li><a href="index.php?action=delete" runat="server">Delete</a></li>
                                        
                <!--    <li><a href="DriverView.php" runat="server">View</a></li>
                    <li><a href="DriverAdd.php" runat="server">Add</a></li>
                    <li><a href="DriverOverview.php" runat="server">Edit</a></li>
                    <li><a href="DriverOverview.php" runat="server">Delete</a></li> -->
                </ul>
                </div> 
            <div id="content_area">
                    <?php echo $content; ?>
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