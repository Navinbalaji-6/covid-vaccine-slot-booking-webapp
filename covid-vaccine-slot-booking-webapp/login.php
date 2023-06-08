<?php
require('footer.php')
?>
<html>
    <body>
        <center>
    <div id="containerHolder">
			<div id="container">
                <br/>
                <h2>User Login</h2>
                <br/>
                <div id="main">
                <form method="post" class="Nice" name="form1">
					<h3>Login Form</h3>
                    <?php
						if(isset($_POST['save']))
						{
							$uname=$_POST['uname'];
							$pword=$_POST['pword'];
							
							if($uname==""){ $error="<br><span class=error>Please enter a username</span><br><br>"; }
							elseif($pword==""){ $error="<br><span class=error>Please enter the password</span><br><br>"; }
							else
							{
								$result=mysqli_query($conn,"SELECT * FROM users WHERE username='$uname' AND password='$pword' AND role!=1;");
								if(mysqli_num_rows($result)==0){ $error="<br><span class=error>Invalid Username/Password</span><br><br>"; }
								else
								{
									$row=mysqli_fetch_array($result);
									session_start();
									$_SESSION['user_id']=$row['user_id'];
									$_SESSION['name']=$row['name'];
									Redirect('mainpage.php'); 
								}
							}
							if($error!=""){ echo $error; }
						}
					?>
                    	<fieldset>
                            <br/>
                            <p><label>Username : </label> <input type="text" name="uname"   /></p>
                            <p><label>Password : </label> <input type="password" name="pword"  /></p>
                            <input type="submit" value="Log In" name="save" />
                        </fieldset>
                    </form>
                        <br /><br />
                </div>
                <a href="signup.php">Signup</a><br/>
				<br/>
				<a href="admin/login.php">Login As Admin</a>
                </center>
    </body>
</html>