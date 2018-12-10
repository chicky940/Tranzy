<?php
include 'authenticate.php';
include 'site_template/header.php';
?>
    <table style='width: 100%'>
        <tr>
            <td style='text-align: center; font-weight: 700; color: #FFFFFF; background-color: #8B0000'> Vehicles </td>
        </tr>
    </table>
    <?php
        if(is_array($vehicle_arr)){
            foreach ($vehicle_arr as $driver){
                    echo "
             <table class='driverTable'>
                     <tr class='driverTable tr th'>
                        <th rowspan='6' width='215px' class='table.driverTable img'><img runat = 'server' src = '$driver->veh_image' /></th>
                        <th>Make:</th>
                        <td>$driver->veh_make</td>
                     </tr>
                     <tr>
                        <th>Model:</th>
                        <td>$driver->veh_model</td>
                     </tr>
                     <tr>
                        <th>Year:</th>
                        <td>$driver->veh_year</td>
                     </tr>
                     <tr>
                        <th> Amount: </th>
                        <td>$driver->veh_amount</td>
                     </tr>
                     <tr>
                        <th>License:</th>
                        <td>$driver->license</td>
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
              
<?php
include 'site_template/footer.php';