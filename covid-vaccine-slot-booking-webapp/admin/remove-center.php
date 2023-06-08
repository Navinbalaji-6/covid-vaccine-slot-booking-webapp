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
        <span><a href="add-center.php">Add Center</a></span><br/>
        <span><a href="logout.php">Logout</a></span><br/>
        <span><a href="adminpage.php">Back</a></span>
                <div id="main">
					<h3>Available Centers</h3>
                    	<table cellpadding="0" cellspacing="0" style="width:100%">
							<tr>
                                <td><b>Center ID    </b></td>
                                <td><b>Area    </b></td>
                                <td><b>Dosage    </b></td>
                                <td><b>Start at   </b></td>
                                <td><b>Ends at   </b></td>
                            </tr> 
                            <br/>
                            <?php
								$result=mysqli_query($conn,"SELECT * FROM slots ORDER BY slot_id");
                                $result1=mysqli_query($conn,"SELECT * FROM slot_user");
								while($row=mysqli_fetch_assoc($result))
								{
									echo"<tr class=odd>
                                	<td>$row[slot_id]</td>
                                	<td>$row[slot_area]</td>
                                	<td>$row[slot_dose]</td>
                                    <td>$row[slot_start]</td>
                                    <td>$row[slot_end]</td>
                            		</tr>";
								}
							?>                       
                        </table>
                        <br /><br />
                </div>
                </body>
    <h3>Remove Center</h3>
    <form method="post" class="Nice">
    <label for="slot_id">Enter Center ID: </label>
        <input type="number" id="slot_id" name="slot_id">
        <br/>
        <input type="submit" value="Remove" name="save" />		
    </form>
    <?php
    if(isset($_POST['save'])){
		$slot_id=trim($_POST['slot_id']);
        $query1 = "DELETE FROM slots WHERE slot_id = ?";
        $stmt1 = mysqli_prepare($conn, $query1);
        mysqli_stmt_bind_param($stmt1, "s", $slot_id);
        mysqli_stmt_execute($stmt1);
        $query2 = "UPDATE slot_user SET status = 'cancelled', slot_id = '-', slot_area = 'pls reschedule to another center' WHERE slot_id = ?";
        $stmt2 = mysqli_prepare($conn, $query2);
        mysqli_stmt_bind_param($stmt2, "s", $slot_id);
        mysqli_stmt_execute($stmt2);
        echo "Removed successfully";
        Redirect('adminpage.php');
    }
        
    ?>
    </center>
</html>
<style>
table, th, td {
  border:1px solid black;
}
</style>