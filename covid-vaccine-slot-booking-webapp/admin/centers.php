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
        <br/>
        <span><a href="adminpage.php">Back</a></span>
        <h2>View All Centers</h2>
                
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
        </center>
    </body>
</html>
<style>
table, th, td {
  border:1px solid black;
}
</style>