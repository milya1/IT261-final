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
    <h3> Welcome, 
    <?php echo $_SESSION['UserName']; ?>
    </h3>
    <br>
    <p><a href="index.php?logout='1' ">Log out!</a></p>
    </div>
    <?php endif ?>
</div>

<!-- >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> END LOGIN <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< -->


<div id="wrapper">
        <main>

        <h1><?php echo $mainHeadline; ?></h1>
        </main>
        <aside>
                <h3>This is my aside</h3>
        </aside>
</div> <!-- END WRAPPER -->

<?php include ('includes/footer.php'); ?>