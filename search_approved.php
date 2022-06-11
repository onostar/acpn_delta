<?php
    include "server.php";
    session_start();
    
    
        $approve_year = $_POST['payment_year'];
        
        /* select and insert statements */
        $approvedMember = $connectdb->prepare("SELECT pharmacy_name, supretendent_pharmacist, tdate FROM payments WHERE payment_status=1 AND YEAR(tdate) = '$approve_year' ORDER BY tdate DESC");
        $approvedMember->execute();
       
        
        
?>
        <h2>All Approved members for "<?php echo $approve_year;?>"</h2>
        <hr>
             

        <!-- search bar -->
        <div class="search">
                <input type="search" name="search" id="searchApprove" class="search" placeholder="search pharmacist, pharmacy, address">
                <button id="download_user" class="approved_mem">Download</button>
            </div>
        <table id="approvedTable">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Pharmacy Name</th>
                    <th>Pharmacist</th>
                    <th>Date of payment</th>
                </tr>
            </thead>
            <?php
                $sn= 1;
                if($approvedMember){
                    $rows = $approvedMember->fetchAll();

                foreach($rows as $row):
            ?>
            <tbody>
                <tr>
                    <td><?php echo $sn?></td>
                    <td><?php echo $row->pharmacy_name;?></td>
                    <td><?php echo $row->supretendent_pharmacist;?></td>
                    <td><?php echo date("jS M, Y", strtotime($row->tdate));?></td>                     
                </tr>  
            </tbody> 
            <?php $sn++; endforeach; }?>  
        </table>
    

