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
        <h1>Welcome, Admin <?php echo $_SESSION['name']; ?></h1>
        <span><a href="logout.php">Logout</a></span>
        		<div id="sidebar">
                    <br/>
                    	<a href="centers.php">View All Centers</a>
                        <br/>
                        <br/>
                    	<a href="add-center.php" class="active">Add Vaccination Center</a>
                        <br/>
                        <br/>
                    	<a href="remove-center.php">Remove Vaccination Center</a>
                        <br/>
                        <br/>
                        <a href="see-users.php">See users</a>
                        <br/>
                        <br/>
                        <a href="stats.php">Check Availability</a>
                        <br/>
                        <br/>
                        <a href="updatestatus.php">Update status</a>
                        <br/>
                </div>
        </center>
    </body>
</html>
