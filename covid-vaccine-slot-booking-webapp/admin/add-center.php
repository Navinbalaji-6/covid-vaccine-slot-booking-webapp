<?php
session_start();
if(!isset($_SESSION['user_id'])){ 
    require('connection.php');
    Redirect('login.php'); }
else
{
    require('footer.php');
    $msg="<br><span class=msg>Patient Added Successfully</span><br><br>";
}
?>
<html>
    <body>
        <center>
        <form method="post" class="Nice">
					<h3>Add Center</h3>
                    <span><a href="logout.php">Logout</a></span><br/>
                    <span><a href="adminpage.php">Back</a></span>
                    <?php
						if(isset($_POST['save']))
						{
							$area=trim($_POST['area']);
							$dosage=trim($_POST['dosage']);
							$startdate=$_POST['startdate'];
                            $enddate=$_POST['enddate'];
							
							if($area==""){ $error="<br><span class=error>Please enter area name</span><br><br>"; }
							elseif($dosage==""){ $error="<br><span class=error>Please enter valid dosage</span><br><br>"; }
							elseif(!is_numeric($dosage)){ $error="<br><span class=error>Dosage must be a number</span><br><br>"; }
							else
							{
								mysqli_query($conn,"INSERT INTO slots (slot_id,slot_area,slot_dose,slot_start,slot_end) VALUES ('','$area','$dosage','$startdate','$enddate')");
								echo $msg;
                                Redirect('adminpage.php');
							}
						}
					?>
                    	<fieldset>
                        	<p><label>Center Area:</label><input type="text" name="area" class="text-long" autofocus value="  " /></p>
                            <p><label>Dosage:</label><input type="number" name="dosage" class="text-long" value="<?php echo $dosage; ?>" /></p>
                            <label for="startdate">Center available from: </label>
                            <input type="datetime-local" id="startdate" name="startdate">
                            <br/>
                            <label for="enddate">Center available to: </label>
                            <input type="datetime-local" id="enddate" name="enddate">
                            <br/>
                            <input type="submit" value="Save" name="save" />
                        </fieldset>
                    </form>
        </center>
    </body>
</html>