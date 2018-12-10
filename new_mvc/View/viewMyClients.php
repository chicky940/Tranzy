<?php
include 'authenticate.php';
include 'site_template/header.php';
?>
    <table style='width: 100%'>
        <tr>
            <td style='text-align: center; font-weight: 700; color: #FFFFFF; background-color: #8B0000'> My Clients </td>
        </tr>
    </table>

    <table style="width: 100%" class='driverTable'>
          <tr>
              <th>Name</th>
             <th>Surname</th>
              <th>Cell</th>
              <th>Email</th>
              <th>Date</th>
          </tr>          
    <?php
    if(is_array($clientArr)){
        foreach($clientArr as $driver){
    
             echo "<tr class='driverTable tr th'>
                      
                        <td>$driver->name</td>
                    
                        <td>$driver->surname</td>
                    
                        <td>$driver->cell</td>
                        
                        <td>$driver->email</td>
                            
                            <td>$driver->clubDate</td>
                    </tr>
                    ";
        }
    }  
?>
</table>
<?php
include 'site_template/footer.php';