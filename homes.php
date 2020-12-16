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
<h1><?php echo $mainHeadline; ?></h1>
    <main style="padding: 20px;">
        <p>Seattle has a notoriously hot real estate market, so it’s not much of a surprise that we’d have a robust list of most-expensive listings. Still, most of Seattle’s top 25 most expensive homes seem to operate on a whole different level—one floating even further above a high-priced market driven higher by competition. There’s money, and then there’s yacht moorage money.</p>

        <p>Past a certain threshold, the market starts to cool off, and homes aren’t flying off the market as quickly as your ordinary Craftsman. Some of these homes have been on the list for a while, like Ryan Lewis’s Magnolia home, on the market for just over a year now—or a fancy Belltown condo with perfect views, on the market for even longer.</p>

        <p>Many neighborhoods appear more on this list than others, too—especially exclusive beachfront communities like Windermere and Laurelhurst. Waterfront is a big theme here in general, from Washington Park mansions to downtown condos with views of Elliott Bay.</p>
    </main>
    <aside>
        <?php
            //CONNECTING TO DATABASE!
            $sql = 'SELECT * FROM Homes';

            $iConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or
            die(myError(__FILE__, __LINE__, mysqli_connect_error())) ;
            //we extract the data here

            $result = mysqli_query($iConn, $sql) or
            die (myError(__FILE__, __LINE__, mysqli_error($iConn)));

            //do we have more than 0 rows (if statement)
            if (mysqli_num_rows($result) > 0) { //show the records
                while ($row = mysqli_fetch_assoc($result)) {
                    //this array will display the contents or the row
                    echo '<ul class="list">';
                    echo ' <li class="bold">
                                <a href="homes-view.php?id='.$row['HouseID'].' " > '.$row['Price'].' '.$row['Type'].' </a>
                            </li>';
                    echo '<li class="old">  Beds: '.$row['Beds'].'  Baths: '.$row['Baths'].' Sqft: '.$row['Sqft'].'</li>';
                    echo '</ul>';
                } //closing the while statement

            } //close the if statement

            else { //what if there's no people
                echo 'No estate to display!';

            } //close else statement

            //release the web server
            @mysqli_free_result($result);

            //close the connection
            @mysqli_close($iConn);
        ?>
    </aside>
</div><!-- END WRAPPER -->
<?php
include('includes/footer.php');

?>