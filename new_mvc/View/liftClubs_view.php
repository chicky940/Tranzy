<?php
include 'authenticate.php';
include 'site_template/header.php';
?>
    <table style='width: 100%'>
        <tr>
            <td style='text-align: center; font-weight: 700; color: #FFFFFF; background-color: #8B0000'>Available Lift-clubs</td>
        </tr>
    </table>
<br>
    <center>
        <form method='get' width='100%'>
            Filter by destination: <!-- <input type="date" name="txt_filterLiftClub" value=""> -->
            <select name="txt_filterLiftClub" >
                <option value="">-Please select- </option>
                <?php 
                    foreach($townnames_arr as $data){
                        ?>
                    <option <?php echo $data->destination ?> <?php echo (isset($_GET['txt_filterLiftClub']) && $_GET['txt_filterLiftClub'] == "$data->destination") ? 'selected="selected"' : ''; ?>> <?php echo $data->destination ?></option>
    
                <?php
                    }
                ?>
            </select>
            <input type ="submit" name="btn_filterliftClub" value ='Search' />
            
        </form>
    </center>
<br>
<table style="width: 100%" class='driverTable'>
          <tr>
              <th>destination</th>
              <th>dest_time</th>
              <th>amount</th>
              <th>Date</th>
              <th></th>
          </tr>          
    <?php
    if(is_array($liftClub_arr)){
        foreach($liftClub_arr as $driver){
    
             echo "<tr class='driverTable tr th'>
                      
                        <td>$driver->destination</td>
                        <td>$driver->dest_time</td>
                        <td>$driver->amount</td>
                        <td>$driver->clubDate </td>
                        <td> <a href='index.php?viewLiftClub=$driver->id' > View Club </a></td>
                    </tr>
                    ";
        }
    }
    /* 
     
                        <th>Name:</th>
                        <td>$driver->name</td>
                    
                        <th>Email:</th>
                        <td>$driver->surname</td>
                    
                        <th>Cell:</th>
                        <td>$driver->cell</td>
                    
                        <th>description:</th>
                        <td>$driver->description</td>
                    
                        <th>max_passengers:</th>
                        <td>$driver->max_passengers</td>
                    
     */
    ?>
</table>
<?php
include 'site_template/footer.php';