<?php
include 'authenticate.php';
include 'site_template/header.php';
?>
    <table style="width: 100%">
        <tr>
            <td style="text-align: center; font-weight: 700; color: #FFFFFF; background-color: #8B0000"> Add Vehicle </td>
        </tr>
    </table>
                <center><form method="post"  enctype="multipart/form-data" >
                <table border="0" cellspacing="5" cellpadding="5" style="background-color: #FFFBD6;">
                <tr>
                    <td>Make:</td>
                        <td><input type="text" name="make" required  placeholder="Toyota" /> </br></td>
                    </tr>

                    <tr>
                    <td>Model:</td>
                    <td><input type="text" name="model"  required placeholder="Corolla 1.6" /> </br></td>
                    </tr>

                    <tr>
                    <td>Year:</td>
                    <td><input type="number" name="year" required /> </br></td>
                    </tr>
                    <tr>
                    <td>Amount per day:</td>
                    <td><input type="number" name="amount" required /> </br></td>
                    </tr>

                    <tr>
                    <td>Image:</td>
                    <td><input type="file" name="ImageSelect" id="Image"  required /> </br></td>
                    </tr>
                    <tr>
                    <td><input type="submit" value="Submit" name="btn_addVehicle" class="button" /></td>
                    <td></td>
                    </tr>
                    </tbody>
                    </center>
                    </table>
             <?php echo $msg ?>
            </form> </center>
   
<?php
include 'site_template/footer.php';