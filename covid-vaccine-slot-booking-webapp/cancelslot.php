<?php
session_start();
if(!isset($_SESSION['user_id'])){ 
    require('connection.php');
    Redirect('login.php'); }
else
{
	$msg="Saved successfully";
    require('footer.php');
}
?>
<html>
    <body>
        <center>
            <br/>
            <br/>
        <h1>Welcome, <?php echo $_SESSION['name']; ?></h1>
        <br/>
        <span><a href="bookslot.php">Book slot</a></span>
        <br/>
        <span><a href="logout.php">Logout</a></span>
        <br/>
        <span><a href="mainpage.php">Back</a></span>
        <div id="main">
					<h3>Booked slots</h3>
                    	<table cellpadding="0" cellspacing="0" style="width:100%">
							<tr>
                                <td><b>Slot ID  </b></td>
                                <td><b>Name    </b></td>
                                <td><b>Age    </b></td>
                                <td><b>Phone   </b></td>
                                <td><b> Area  </b></td>
                                <td><b>Status    </b></td>
                            </tr> 
                            <br/>
                            <?php
                            $user_id=$_SESSION['user_id'];
								$result=mysqli_query($conn,"SELECT * FROM slot_user WHERE user_id=$user_id");
								while($row=mysqli_fetch_assoc($result))
								{
									echo"<tr class=odd>
                                    <td>$row[su_id]</td>
                                	<td>$row[name]</td>
                                    <td>$row[age]</td>
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
        <input type="submit" value="Remove" name="save" />		
    </form>
    <?php
    if(isset($_POST['save'])){
		$slot_id=trim($_POST['slot_id']);
        $query1 = "DELETE FROM slot_user WHERE su_id = ?";
        $stmt1 = mysqli_prepare($conn, $query1);
        mysqli_stmt_bind_param($stmt1, "s", $slot_id);
        mysqli_stmt_execute($stmt1);
        echo "slot cancelled successfully";
        Redirect('mainpage.php');
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