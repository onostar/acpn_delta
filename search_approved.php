<?php
    include "server.php";
    session_start();
    
    
        $approve_year = $_POST['payment_year'];
        
        /* select and insert statements */
        $approvedMember = $connectdb->prepare("SELECT users.pharmacist_passport, payments.pharmacy_name, payments.supretendent_pharmacist, payments.tdate FROM users, payments WHERE users.pharmacist = payments.supretendent_pharmacist AND payments.payment_status=1 AND YEAR(tdate) = '$approve_year' ORDER BY tdate DESC");
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
                    <th>Passport</th>
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
                    <td><a href="<?php echo 'users/'.$row->pharmacist_passport?>" target="_blank"><img src="<?php echo 'users/'.$row->pharmacist_passport;?>></a></td>                    
                </tr>  
            </tbody> 
            <?php $sn++; endforeach; }?>  
        </table>
<?php
    if($approvedMember->rowCount() > 0){
?>
     <!-- clearance slip for all members-->
<div class="details" id="receipt" style="display:blocks;">
    <h2>Membership Annual Receipts</h2>
    <hr>
    <div class="receipt">      
        <?php 
            if(isset($_SESSION['status'])){
                $status = $_SESSION['status'];
            }
            $sql_receipt = $connectdb->prepare("SELECT users.id, users.username,  users.pharmacist, users.pharmacist_passport, users.pharmacist_email, users.pharmacist_address, users.pharmacy_name, users.pharmacy_address, payments.tdate, payments.supretendent_pharmacist, payments.receipt_number FROM users, payments WHERE users.pharmacist=payments.supretendent_pharmacist AND payments.payment_status=1 AND YEAR(payments.tdate) = '$approve_year'");
            $sql_receipt->execute();

            
            if(!$sql_receipt->rowCount()){
                echo "<div class='notice'>
                        <p>no Slip!</p>
                    </div>";
            }
            $rowss = $sql_receipt->fetchAll();
            foreach($rowss as $rows):
        ?>
        <div class="memberReceipt" id="printReceipt">
            <div class="mainReceipt">
                <div class="receipt_num">
                    <p style="font-weight:bold; text-decoration:underline;">
                        <?php
                            echo $rows->receipt_number;
                        ?>
                    </p>
                </div>
                <div class="receipt_header">
                    <div class="acpn_logo">
                        <img src="acpn_logo.png" alt="acpn">
                    </div>
                    <div class="association">
                        <h2>Association of Community Phamacists of Nigeria<br>Delta State Chapter</h2>
                        <p>146 New Lagos road, Benin city.
                        <h3 class="receipt_title">Membership Clearance form for "<?php echo date("Y")?>"</h3>
                    </div>
                </div>
                
                <div class="user_image">
                    <img src="<?php echo 'users/'.$rows->pharmacist_passport;?>" alt="user image">
                    
                </div>
                <div class="receipt_content">
                    <table>
                        <tr>
                            <td>This is to certify that:</td>
                            <td><strong>Pharm. <?php echo $rows->supretendent_pharmacist; ?></strong></td>
                        </tr>
                        <!-- <tr>
                            <td>Has paid THE SUM OF:</td>
                            <td>TWENTY THOUSAND NAIRA ONLY (N20,000)</td>
                        </tr> -->
                    </table>
                    <p>Has fulfilled ACPN registration requirement for the year <?php echo date("Y");?>. </p>
                    <p>He is therefore a bonafied member of ACPN Delta State for the year <?php echo date("Y");?>.</p>
                    <div class="chairman_sign">
                    <div class="sign">
                        <img src="signature.jpeg" alt="chairman signature">
                        <p><strong>Chairman ACPN</strong></p>
                    </div>
                    <div class="sign">
                        <p><?php
                            $get_date = $connectdb->prepare("SELECT tdate FROM payments WHERE pharmacist_email = :pharmacist_email");
                            $get_date->bindvalue("pharmacist_email", $rows->pharmacist_email);
                            $get_date->execute();
                            $tdate = $get_date->fetch();
                            echo date("jS M, Y", strtotime($tdate->tdate));
                        ;?></p>
                        <p><strong>Date</strong></p>
                    </div>
                </div>
                
            </div>
        </div>
        <button onclick="window.print()">Print receipt</button>
    </div>
            <?php endforeach; ?>

</div> 
<?php }?>

