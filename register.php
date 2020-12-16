<?php
include('server.php');
include('includes/header.php');


?>

<h1 style="text-align: center;">Register today!</h1>
<form style="max-width: 480px; margin: 0 auto 20px; background: rgba(90, 95, 105, 0.151);" class= "register" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<fieldset>
<label>First Name</label>
<input type="text" name="FirstName" value="<?php if(isset($_POST['FirstName'])) echo $_POST['FirstName'];?>">

<label>Last Name</label>
<input type="text" name="LastName" value="<?php if(isset($_POST['LastName'])) echo $_POST['LastName'];?>">

<label>User Name</label>
<input type="text" name="UserName" value="<?php if(isset($_POST['UserName'])) echo $_POST['UserName'];?>">

<label>Email</label>
<input type="text" name="Email" value="<?php if(isset($_POST['Email'])) echo $_POST['Email'];?>">

<label>Password</label>
<input type="password" name="Password1" >

<label>Confirm Password</label>
<input type="password" name="Password2" >

<button type="submit" class="btn" name="reg_user">Register</button>

<button type="button" onclick="window.location.href = '<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>' ">RESET</button>

<?php include('includes/errors.php') ?>
</fieldset>
</form>

<p class="center" style="color: white;">Already a member? <a href="login.php">Please sign in!</a></p>

</div> <!-- end wrapper -->