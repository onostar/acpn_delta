<?php
    include "server.php";
    session_start();
    
    
        $location = $_POST['mem_location'];
        
        /* select and insert statements */
        $loc = $connectdb->prepare("SELECT * FROM users WHERE pharmacy_location = :pharmacy_location ORDER BY pharmacist DESC");
        $loc->bindValue("pharmacy_location", $location);
        $loc->execute();
       
        
        
?>
        <h2>All Registered members in "<?php echo $location;?>" Local Government Area</h2>
        <hr>
             

        <!-- search bar -->
        <div class="search">
                <input type="search" name="search" id="searchLocation" class="search" placeholder="search pharmacist, pharmacy, address">
                <button id="download_user" class="location_mem" onclick="downloadMembers()">Download</button>
            </div>
        <table id="locationTable">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Pharmacy Name</th>
                    <th>Address</th>
                    <th>Pharmacist</th>
                    <th>Phone number</th>
                    <th>PCN</th>
                    <th>Reg Date</th>
                </tr>
            </thead>
            <?php
                $sn= 1;
                if($loc){
                    $rows = $loc->fetchAll();

                foreach($rows as $row):
            ?>
            <tbody>
                <tr>
                    <td><?php echo $sn?></td>
                    <td><?php echo $row->pharmacy_name;?></td>
                    <td><?php echo $row->pharmacy_address;?></td>
                    <td><?php echo $row->pharmacist;?></td>
                    <td><?php echo $row->username;?></td>
                    <td><?php echo $row->contact_pcn_reg;?></td>
                    <td><?php echo date("jS M, Y", strtotime($row->registration_date));?></td>                     
                                        
                </tr>  
            </tbody> 
            <?php $sn++; endforeach; }?>  
        </table>
