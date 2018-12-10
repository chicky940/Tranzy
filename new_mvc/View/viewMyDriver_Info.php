<?php
include 'authenticate.php';
include 'site_template/header.php';
?>
    <table style='width: 100%'>
        <tr>
            <td style='text-align: center; font-weight: 700; color: #FFFFFF; background-color: #8B0000'> My Driver Details </td>
        </tr>
    </table>
    <?php echo $mssg ?>
    <table class='driverTable'>
        <?php
        if(is_array($driverArr)){
            foreach ($driverArr as $driver){
                    
            echo "<tr class='driverTable tr th'>
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
                  ";
            }
        }
        ?>
    </table>

<?php
include 'site_template/footer.php';