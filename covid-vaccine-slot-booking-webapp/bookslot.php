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
<center>
<h2>Vaccine slot Booking</h2>
<span><a href="mainpage.php">Back</a></span>
<span><a href="logout.php">Logout</a></span>
				<div id="main">
					<h3>Available Centers</h3>
                    	<table cellpadding="0" cellspacing="0" style="width:100%">
							<tr>
								<td><b>Slot ID</b></td>
                                <td><b>Area    </b></td>
                                <td><b>Dosage    </b></td>
                                <td><b>Start at   </b></td>
                                <td><b>Ends at   </b></td>
                            </tr> 
                            <br/>
                            <?php
								$result=mysqli_query($conn,"SELECT * FROM slots WHERE slot_dose > 0 ORDER BY slot_id");
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
                
                <div id="main">
                <form method="post" class="Nice">
                    <?php
						if(isset($_POST['save']))
						{   
                            $user_id=$_SESSION['user_id'];
							$name=trim($_POST['name']);
							$age=trim($_POST['age']);
							$gender=$_POST['gender'];
							$phone=trim($_POST['phone']);
                            $slot_id=trim($_POST['slot_id']);
							$slot_area=trim($_POST['slotarea']);
							
							if($name==""){ $error="<br><span class=error>Please enter a name</span><br><br>"; }
							elseif($age==""){ $error="<br><span class=error>Please enter the age</span><br><br>"; }
							elseif($age<16){ $error="<br><span class=error>Not a valid age for covid vaccination..book for other persons..</span><br><br>"; }
							elseif(!is_numeric($age)){ $error="<br><span class=error>Age must be a number</span><br><br>"; }
							elseif($gender=="none"){ $error="<br><span class=error>Please select the sex</span><br><br>"; }
							elseif($phone==""){ $error="<br><span class=error>Please enter the phone number</span><br><br>"; }
							else
							{
								mysqli_query($conn,"INSERT INTO slot_user(su_id,user_id,name,age,gender,phone,slot_id,slot_area) VALUES ('','$user_id','$name','$age','$gender','$phone','$slot_id','$slot_area')");
								$query1 = "SELECT * FROM slots WHERE slot_id = '$slot_id'";
								$result1 = mysqli_query($conn, $query1);
								if ($result1) {
    							while ($row = mysqli_fetch_assoc($result1)) {
        							$slotdose = $row['slot_dose'];
        							$slotdose = $slotdose - 1;
        							mysqli_query($conn, "UPDATE slots SET slot_dose = '$slotdose' WHERE slot_id = '$slot_id'");
    						}
							} else {
    							echo "Error fetching slot data: " . mysqli_error($conn);
							}
								echo $msg;
							}
							$error="";
							if($error==""){  }
							else{
								echo $error;
							}
						}
					?>
                    	<fieldset>
                        	<p><label>Name:</label><input type="text" name="name" class="text-long" autofocus value="" /></p>
                            <p><label>Age:</label><input type="number" name="age" class="text-long" value="" /></p>
                            <p><label>Sex:</label>
                            <select name="gender">
                            	<option value="none">[--------SELECT--------]</option>
                            	<option value="Male">Male</option>
                            	<option value="Female">Female</option>
                            	<option value="Other">Others</option>
                            </select>
                            </p>
                            <p><label>slot-id:</label><input type="text" name="slot_id" class="text-long" value="" /></p>
                            <p><label>slot-Area:</label><input type="text" name="slotarea" class="text-long" value="" /></p>
							<p><label>Phone Number:</label><input type="text" name="phone" class="text-long" value="" /></p>
                            <input type="submit" value="Save" name="save" />
                        </fieldset>
                    </form>
                        <br /><br />
                </div>
                </center>
<style>
	table,td,th{
		border:1px solid black;
	}
</style>