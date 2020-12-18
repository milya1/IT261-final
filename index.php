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

<div class="imageMain">
    <img src="images/<?php echo $pic; ?>" alt ="<?php echo $alt; ?>" style="background-size: cover; background-position: center top 72px;">
</div>

<div id="wrapper"> <!--  WRAPPER -->
    <main>
        <h2 class="<?php echo $center; ?>"><?php echo $mainHeadline; ?></h2>

        <blockquote>
            <?php echo $greeting; ?> Welcome to our website! It is dedicated to some property in Seattle area, that is over $1mil.
        </blockquote>

        <p><?php echo $timeNow; ?></p> 

        <ul class="timeDate" style="list-style-type:none;"> 
            <li><a href="index.php?timeNow=3">Night</a></li>
            <li><a href="index.php?timeNow=11">Morning</a></li>
            <li><a href="index.php?timeNow=14">Afternoon</a></li>
            <li><a href="index.php?timeNow=22">Evening</a></li>
        </ul>

        <p><a href="https://github.com/milya1/IT261-final">This website code on Github</a></p>
    </main>

    <aside>
        <h3>Hi! It's <?php echo date('H:i a');?> in Seattle, and local weather is:</h3>
        <div class="weather">
            <a class="weatherwidget-io" href="https://forecast7.com/en/47d61n122d33/seattle/" data-label_1="SEATTLE" data-label_2="WEATHER" data-icons="Climacons Animated" data-days="3" data-theme="weather_one" >SEATTLE WEATHER</a>
            <script>
            !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
            </script>
        </div>                
    </aside>
</div> <!-- END WRAPPER -->

<?php include ('includes/footer.php'); ?>




