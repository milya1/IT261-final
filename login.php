<?php
include('server.php');
include('includes/header.php');


?>

<h1 style="text-align:center; color: rgb(236, 236, 236);">Login</h1>

<form style="max-width: 480px; margin: 0 auto 20px; background: rgba(90, 95, 105, 0.151);" class="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<fieldset>
<label>Username</label>
<input type="text" name="UserName" value="<?php if(isset($_POST['UserName'])) echo $_POST['UserName'];?>">

<label>Password</label>
<input type="password" name="Password">

<?php
    include('includes/errors.php')
?>

<button type="submit" class="btn" name="login_user">Login</button>

<button type="button" onclick="window.location.href = '<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>' ">RESET</button>

</fieldset>

</form>

<p style="text-align:center;color: rgb(236, 236, 236);">Haven't registered yet? <a href="register.php"> Register here</a></p>