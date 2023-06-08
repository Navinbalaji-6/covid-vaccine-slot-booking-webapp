<?php
require('footer.php')
?>
<html>
    <body>
        <center>
            <h2>Signup</h2>
            <form method="post" class="Nice" name="form1">
            <?php
						if(isset($_POST['signup']))
						{
                            $name=$_POST['name'];
							$uname=$_POST['uname'];
							$pword=$_POST['pword'];
							
							if($uname==""){ $error="<br><span class=error>Please enter a username</span><br><br>"; }
							elseif($pword==""){ $error="<br><span class=error>Please enter the password</span><br><br>"; }
							else
							{
								$result=mysqli_query($conn,"SELECT * FROM users WHERE username='$uname'");
								if(mysqli_num_rows($result)==0){ 
                                    $query="INSERT INTO users(user_id,name,username,password,role) VALUES('','$name','$uname','$pword','');";
                                    $result=mysqli_query($conn,$query);
                                    Redirect('index.php');
                                 }
								else
								{
									$error="<br><span class=error>Username already exists..</span><br><br>"; 
								}
							}
							if($error!=""){ echo $error; }
						}
					?>
            <fieldset>
                <br/>
                <p><label>Name : </label> <input type="text" name="name"  /></p>
                <p><label>Username : </label> <input type="text" name="uname"   /></p>
                <p><label>Password : </label> <input type="password" name="pword"  /></p>
                <input type="submit" value="Signup" name="signup" />
            </fieldset>
            </form>
            <a href="login.php">Login</a>
        </center>
    </body>
</html>