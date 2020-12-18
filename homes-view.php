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
<?php

//isset for the $_GET['today']

if (isset($_GET['id'])){
    $id = (int)$_GET['id'];
}
else {
    header('Location:homes.php');
}

$sql = 'SELECT * FROM Homes WHERE HouseID='.$id.'';

//connect to database
$iConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or
die(myError(__FILE__, __LINE__, mysqli_connect_error())) ;
//we extract the data here

$result = mysqli_query($iConn, $sql) or
die (myError(__FILE__, __LINE__, mysqli_error($iConn)));
//end connect

//do we have more than 0 rows (if statement)
if (mysqli_num_rows($result) > 0) { //show the records
    while ($row = mysqli_fetch_assoc($result)) {
        //this array will display the contents or the row
        $Price =  stripslashes($row['Price']);
        $Type =  stripslashes($row['Type']);
        $Beds =  stripslashes($row['Beds']);
        $Baths =  stripslashes($row['Baths']);
        $Sqft =  stripslashes($row['Sqft']);
        $Year =  stripslashes($row['Year']);
        $Heating =  stripslashes($row['Heating']);
        $Cooling =  stripslashes($row['Cooling']);
        $Parking =  stripslashes($row['Parking']);
        $HOA =  stripslashes($row['HOA']);
        $Description =  stripslashes($row['Description']);
        
        $Feedback = '';

    } //closing the while statement
}
else {
    $Feedback = 'Sorry, no houses to display!';
    }


?>
<div id="wrapper">
    <main>
    <h2><?php echo $Price; echo ' ' . $Type;?> </h2>
    <br>
    
    <?php 
    if ($Feedback == ''){
        echo '<table>';
        echo '<tr>';
            echo '<td> Beds:  '.$Beds.' </td>';
            echo '<td> Baths: '.$Baths.' </td>';
            echo '<td> Size: '.$Sqft.'</td>';
            echo '<td> Year: '.$Year.'</td>';
        echo '</tr>';
        echo '<tr>';
            echo '<td> Heating: '.$Heating.' </td>';
            echo '<td> Cooling: '.$Cooling.'</td>';
            echo '<td> Parking: '.$Parking.'</td>';
            echo '<td> HOA: '.$HOA.'</td>';
        echo '</tr>';
        echo '<tr>';
            echo '<td colspan="4"> </td>';
        echo '</tr>';
        echo '<tr>';
            echo '<td colspan="4"> Description: '.$Description.'</td>';
        echo '</tr>';

        echo '</table>';
        echo '<br>';
        echo '<p><a href="homes.php">Go back to the property list!</a></p>';
    }//ends if
    else {
        echo $Feedback;
    }//ends else
    ?>

  <!-- >>>>>>>>>>>>>>>>>>>>>>>>>>>>> GALLERY <<<<<<<<<<<<<<<<<<<<<<<<<<<<<< -->
    <div class="galleryDiv">
        <link rel="stylesheet" href="css/picStyle.css" />
        <?php
            $directory = "uploads/".$id."/";
            $filelist = glob($directory."*.jpg");
            foreach($filelist as $filename){
                echo "<a href='galleryScript.php?picture=".$filename."'>
                <img class='galleryPic' src='".$filename."' alt='property image'></a>";
                echo '<br>';
            }
            $image = $_GET['picture'];
            echo '<img class="bigPic" src=" '.$image.' " alt="enlarged property image">';
        ?>

    </div>
    
    </main>

    <aside>
        <?php
        
        
            if ($Feedback==''){
                echo '<img src="uploads/'.$id.'/1.jpg" alt="'.$Price.'">';
            }
            else {
                echo $Feedback;
            }

            //release the web server
            @mysqli_free_result($result);

            //close the connection
            @mysqli_close($iConn);

        ?>
    </aside>
</div> <!-- END WRAPPER -->

<?php include('includes/footer.php');?>