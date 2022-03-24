<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="signin_style1.css">
</head>
<body>
    <header >
       <img src="back/cmp44.png" width="100%" >
	   
    </header>
	
<form action="signin1.php" method="post">
    <div class="form">
        <h2>Sign In</h2>
        <div class="input">
            <div class="inputBox">
                <label for="">Username</label>
                <input name="t1" type="text" id="t1" placeholder="••••••••">
            </div>
            <div class="inputBox">
                <label for="">Password</label>
                <input name="t2" type="password" id="t2" placeholder="••••••••">
            </div>
           
            <div class="inputBox">
                <input type="submit" name="" value="Sign In">
            </div>
        </div>
        <p class="forget">Don't have an account ? <a href="customerdetails1.php">Sign Up</a></p>
		 <p class="forget"><a href="home.php">Home</a></p>
        
    </div> </form>   
</body>
</html>