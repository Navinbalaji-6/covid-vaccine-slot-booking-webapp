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
        <br/>
        <span><a href="adminpage.php">Back</a></span>
        <form action="" method="GET">
            <div class="col-auto">
            <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="search for place,id or name">
            </div>
            <div class="col-auto">
            <button type="submit" class="btn btn-primary">SEARCH</button>
            </div>
            </div>
        </form>
        <table cellpadding="0" cellspacing="0" style="width:100%">
							<tr>
                                <td><b>User ID</b></td>
								<td><b>Name</b></td>
                                <td><b>Age    </b></td>
                                <td><b>Gender    </b></td>
                                <td><b>Phone   </b></td>
                                <td><b>Area ID    </b></td>
                                <td><b>Area   </b></td>
                            </tr> 
                            <br/>
        <?php
                    if(isset($_GET['search'])){
                        $filtervalues = $_GET['search'];
                        if($filtervalues=="all"){ 
                            $query= "SELECT * FROM slot_user;";
                            $query_run = mysqli_query($conn, $query);
                        }
                        else{$query= "SELECT * FROM slot_user WHERE CONCAT(slot_area,name,slot_id,gender) LIKE '%$filtervalues%' ";
                        $query_run = mysqli_query($conn, $query);
                        }
                        if(mysqli_num_rows($query_run) > 0){
                            foreach($query_run as $items){
                              ?>
                        <div id="main">
                    	
                            <?php
								{
									echo"<tr class=odd>
                                    <td>$items[user_id]</td>
									<td>$items[name]</td>
                                	<td>$items[age]</td>
                                	<td>$items[gender]</td>
                                    <td>$items[phone]</td>
                                    <td>$items[slot_id]</td>
                                    <td>$items[slot_area]</td>
                            		</tr>";
								}
                            	}}}	?>                       
                        </table>
        </center>
    </body>
</html>
<style>
table,td,th{
		border:1px solid black;
	}
</style>