<?php
session_start();
if(!isset($_SESSION['user_id'])){ 
    require('connection.php');
    Redirect('login.php'); }
else
{
    require('footer.php');
}
?>
<html>
    <body>
        <center>
        <span><a href="logout.php">Logout</a></span>
        <span><a href="adminpage.php">Back</a></span>
        <form action="" method="GET">
            <div class="col-auto">
            <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="search for place">
            </div>
            <div class="col-auto">
            <button type="submit" class="btn btn-primary">SEARCH</button>
            </div>
            </div>
        </form>
        <?php
				  	$result=mysqli_query($conn,"SELECT COUNT(user_id) FROM users");
					$row=mysqli_fetch_row($result);
					
					$result2=mysqli_query($conn,"SELECT COUNT(slot_id) FROM slots");
					$row2=mysqli_fetch_row($result2);
					
					$result3=mysqli_query($conn,"SELECT COUNT(su_id) FROM slot_user WHERE status='completed'");
					$row3=mysqli_fetch_row($result3);
					
					$result4=mysqli_query($conn,"SELECT COUNT(su_id) FROM slot_user WHERE status='waiting'");
					$row4=mysqli_fetch_row($result4);
					
					$result5=mysqli_query($conn,"SELECT SUM(slot_dose) FROM slots");
					$row5=mysqli_fetch_row($result5);

                    $result6=mysqli_query($conn,"SELECT COUNT(su_id) FROM slot_user WHERE status='cancelled'");
					$row6=mysqli_fetch_row($result6);

                    $result7=mysqli_query($conn,"SELECT AVG(slot_dose) FROM slots");
					$row7=mysqli_fetch_row($result7);
                    
                    
                    
                    echo"<table><tr>
    							<td align=center valign=middle><b>Users Centers Stats</b></td>
  							</tr>
  							<tr>
    							<td align=center valign=middle>Total Users- $row[0]</td>
							</tr>
                            <tr>
    							<td align=center valign=middle>Total Centers- $row2[0]</td>
  							</tr>
                            <tr>
    							<td align=center valign=middle>Completed vaccination - $row3[0]</td>
                            </tr>
                            <tr>
    							<td align=center valign=middle>still waiting - $row4[0]</td>
							</tr>
  							<tr>
   		 						<td align=center valign=middle>Total doses available - $row5[0]</td>
                            </tr>
                            <tr>
    							<td align=center valign=middle>Slots cancelled - $row6[0]</td>
							</tr>
  							<tr>
   							  <td align=center valign=middle>Average number of doses in one center - $row7[0]</td>
							</tr></table>";
                    ?>
        <table cellpadding="0" cellspacing="0" style="width:100%">
							<tr>
                                <td><b>Area ID</b></td>
                                <td><b>Area</b></td>
                                <td><b>Dosage Available</b></td>
                            </tr> 
                            <br/>
        <?php
                    if(isset($_GET['search'])){
                        $filtervalues = $_GET['search'];
                        if($filtervalues=="all"){ 
                            $query= "SELECT * FROM slots;";
                            $query_run = mysqli_query($conn, $query);
                        }
                        else{$query= "SELECT * FROM slots WHERE CONCAT(slot_area,slot_id,slot_dose) LIKE '%$filtervalues%' ";
                        $query_run = mysqli_query($conn, $query);
                        }
                        if(mysqli_num_rows($query_run) > 0){
                            foreach($query_run as $items){
                              ?>
                        <div id="main">
                    	
                            <?php
								{
									echo"<tr class=odd>
                                    <td>$items[slot_id]</td>
                                    <td>$items[slot_area]</td>
                                    <td>$items[slot_dose]</td>
                            		</tr>";
								}
                            	}}}	?>                       
                        </table>
        </center>
        <div class="data">
            <p class="hi" style="position: fixed;left: 0;bottom: 10px;width: 100%;color: black;">hi</p>
        </div>
    </body>
</html>
<style>
table,td,th{
		border:1px solid black;
	}
</style>

