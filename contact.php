<?php 
//in order to view this page a user must have registered and logged in. Otherwise must be directed to do so

session_start();

if(!isset($_SESSION['UserName'])) {
    $_SESSION['msg'] = 'You must log in first!';
    header('Location: login.php');
}//end if

if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['UserName']);
    header('Location: login.php');
}
include('config.php');
include('includes/header.php');

?>

<div class="welcommen">
    <?php 
    //notification message

    if(isset($_SESSION['success'])) :?>
    <div class="error success">
    <h4>
        <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
        ?>
    </h4>
    </div>
    <?php endif ?>

    <div class="error success">
    <?php
    if(isset($_SESSION['UserName'])) : ?> 
    Welcome, 
    <?php echo $_SESSION['UserName']; ?>
    <p><a href="index.php?logout='1' ">Log out!</a></p>
    </div>
    <?php endif ?>
</div>

<!-- >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> END LOGIN <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< -->

<div id="wrapper">
        <main>

        <h1><?php echo $mainHeadline; ?></h1>
        
        <?php include('includes/form.php')?>
        </main>

        <aside>
                <h2 class = "hereHelp" style="padding: 7px;"> We're here to help</h2>
                <div class="help" style="padding: 10px; border:0.5px solid rgba(210, 180, 140, 0.37); ">
                    <p>(800)888-8888</p>
                    <p>123 Elf Road North Pole, 88888</p>
                    <p>support@noname.no</p>
                </div>
        </aside>
</div><!-- END WRAPPER -->

<?php include ('includes/footer.php'); ?>