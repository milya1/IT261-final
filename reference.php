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
    <h3>
        <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
        ?>
    </h3>
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
        <div class="main2">
            <h1><?php echo $mainHeadline; ?></h1>
                <h3>Project References</h3>
                <p><a href="https://seattle.curbed.com/maps/most-expensive-homes-for-sale">The 25 most expensive Seattle homes for sale right now</a></p>
                <p><a href="https://unsplash.com/photos/1mFSRB6SBQw"> Seattle at dawn by Nitish Meena </a></p>
                <p><a href="https://unsplash.com/photos/CKD2uFQOPWc"> Seattle at Night by Jesse Collins</a></p>
                <p><a href=""> Seattle morning pic by Kyler Boone</a></p>
                <p><a href=""> Seattle day pic by Abigail Keenan</a></p>
                <p><a href="https://www.elithecomputerguy.com/2020/03/php-project-simple-dynamic-photo-gallery/"> PHP Gallery </a></p>
                
        </div>

</div> <!-- END WRAPPER -->

<?php include ('includes/footer.php'); ?>
