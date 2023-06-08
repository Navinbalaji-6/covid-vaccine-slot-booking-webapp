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
        <span><a href="logout.php">Logout</a></span>
        <span><a href="mainpage.php">Back</a></span>
        <form action="" method="GET">
            <div class="col-auto">
            <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="search for place">
            </div>
            <div class="col-auto">
            <button type="submit" class="btn btn-primary">SEARCH</button>
            </div>
            </div>
        </form>
        <h3>Centers</h3>
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
                    if(isset($_GET['search'])){
                        $filtervalues = $_GET['search'];
                        $query= "SELECT * FROM slots WHERE CONCAT(slot_area,slot_start,slot_end) LIKE '%$filtervalues%' ";
                        $query_run = mysqli_query($conn, $query);

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
                                    <td>$items[slot_start]</td>
                                    <td>$items[slot_end]</td>
                            		</tr>";
								}
                            	}}}	?>                       
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