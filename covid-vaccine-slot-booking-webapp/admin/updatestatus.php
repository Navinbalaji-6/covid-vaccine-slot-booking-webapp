<?php
session_start();
if(!isset($_SESSION['user_id'])){ 
    require('connection.php');
    Redirect('login.php'); }
else
{
    require('footer.php');
    $msg="<br><span class=msg>Updated Successfully</span><br><br>";
}
?>
<html>
    <body>
        <center>
        <span><a href="logout.php">Logout</a></span><br/>
        <span><a href="adminpage.php">Back</a></span>
        <div id="main">
					<h3>Available Centers</h3>
                    	<table cellpadding="0" cellspacing="0" style="width:100%">
							<tr>
								<td><b>Slot ID</b></td>
                                <td><b>Name   </b></td>
                                <td><b>Phone    </b></td>
                                <td><b>Slot Area   </b></td>
                                <td><b>Ends at   </b></td>
                            </tr> 
                            <br/>
                            <?php
								$result=mysqli_query($conn,"SELECT * FROM slot_user;");
								while($row=mysqli_fetch_assoc($result))
								{
									echo"<tr class=odd>
									<td>$row[su_id]</td>
                                	<td>$row[name]</td>
                                	<td>$row[phone]</td>
                                    <td>$row[slot_area]</td>
                                    <td>$row[status]</td>
                            		</tr>";
								}
							?>                       
                        </table>
                        <br /><br />
                </div>
        <form method="post" class="Nice">
    <label for="slot_id">Enter Slot ID: </label>
        <input type="number" id="slot_id" name="slot_id">
        <br/>
        <input type="submit" value="Update" name="save" />		
    </form>
    <?php
    if(isset($_POST['save'])){
		$slot_id=trim($_POST['slot_id']);
        $query1 = "UPDATE slot_user SET status='completed' WHERE su_id = ?";
        $stmt1 = mysqli_prepare($conn, $query1);
        mysqli_stmt_bind_param($stmt1, "s", $slot_id);
        mysqli_stmt_execute($stmt1);
        echo "Updated successfully";
        Redirect('adminpage.php');
    }
    ?>
        </center>
    </body>
</html>
<style>
table,td,th{
		border:1px solid black;
	}
</style>