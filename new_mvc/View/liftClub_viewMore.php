<?php
include 'authenticate.php';
include 'site_template/header.php';
?>
    <table style='width: 100%'>
        <tr>
            <td style='text-align: center; font-weight: 700; color: #FFFFFF; background-color: #8B0000'>Available Drivers</td>
        </tr>
    </table>
<?php echo $mssg ?>
<table class='driverTable'>
    <?php
    
    if(is_array($liftClub_arr)){
        foreach($liftClub_arr as $driver){
    
        echo "<tr class='driverTable tr th'>
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
                     <th>description:</th>
                     <td>$driver->description</td>
                 </tr>
                 <tr>
                     <th>max_passengers:</th>
                      <td>$driver->max_passengers</td>
                 </tr>
                 <tr>
                     <th>Amount:</th>
                    <td>$driver->amount</td>
                 </tr>   
                 <tr>
                     <th>Departure:</th>
                        <td>$driver->departure</td>
                 </tr>    
                 <tr> 
                     <th>Departure time:</th>
                        <td>$driver->depart_time</td>
                 </tr>     
                 <tr>       
                     <th>Destiantion:</th>
                        <td>$driver->destination</td>
                  </tr>    
                 <tr>        
                     <th>Destiantion time:</th>      
                        <td>$driver->dest_time</td>
                 </tr> 
                 
                 <tr>
                    <th>Date:</th>
                    <td>$driver->clubDate </td>
                 </tr>
if ($dirh) {
    while (($dirElement = readdir($dirh)) !== false) {
        
    }
    closedir($dirh);
}
                
                    <br>
                 <tr>        
                     <th>  </th>   
                     <th><a href='index.php?joinClub=$driver->id'> Join club </a></td>
                 </tr> 
                    ";
        }
    }
    ?>
</table>

<br>
<a href="index.php?action=liftClub"> Go back</a>
<?php
include 'site_template/footer.php';