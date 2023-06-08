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
            <br/>
            <br/>
        <h1>Welcome, <?php echo $_SESSION['name']; ?></h1>
        <br/>
        <span><a href="bookslot.php">Book slot</a></span>
        <br/>
        <a href="cancelslot.php">Cancel slot</a>
        <br/>
        <a href="filter.php">Search Centers</a>
        <br/>
        <span><a href="logout.php">Logout</a></span>
        <div id="main">
					<h3>Booked slots</h3>
                    	<table cellpadding="0" cellspacing="0" style="width:100%">
							<tr>
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
        </center>
    </body>
</html>
<style>
table,td,th{
		border:1px solid black;
	}
</style>
