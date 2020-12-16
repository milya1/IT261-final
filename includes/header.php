<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Final Project - <?php echo htmlspecialchars($title);?> </title>
<link rel="stylesheet" type="text/css" href="css/styles.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display+SC&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Crimson+Text&display=swap" rel="stylesheet">

</head>
   
<body class="<?php echo $body; ?>">
    <header>
        <div class="inner-header">
        <nav>
               
            <ul>
                <?php echo makeLinks($nav); ?>
            </ul>
                
        </nav>
        </div> <!--closing inner header -->


        <?php // >>>>>>>>>>>>>>>>>>>>>SWITCH<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
date_default_timezone_set('America/Los_Angeles');

if(isset($_GET['timeNow'])) {
    $timeNow = $_GET['timeNow'];
} else {
    $timeNow = date('H:i a');
}


if ($timeNow < 4) {
    $timeNow = 'Night';
} elseif ($timeNow < 12) {
    $timeNow = 'Morning';
} elseif($timeNow < 18) {
    $timeNow = 'Afternoon';
} else {
    $timeNow = 'Evening';
}


switch($timeNow) {
    case 'Night' : 
        $greeting = 'Good night!';
        $pic = 'night.jpg';
        $alt = 'Night Seattle';
        $content = 'Today on Morning we are gonna focus on our abs! Total Abs is an ab tone and definition oriented program based on some of the best rious muscles of your midsection and how they work, you can better create a workout that addresses your strengths and weaknesses.';
        break;

    case 'Morning' : 
        $greeting = 'Good morning!';
        $pic = 'morning.jpg';
        $alt = 'Morning Seattle';
        $content = 'Today on Morning we are gonna focus on our abs! Total Abs is an ab tone and definition oriented program based on some of the best nuscles of your midsection and how they work, you can better create a workout that addresses your strengths and weaknesses.';
        break;

    case 'Afternoon' : 
        $greeting = 'Good afternoon!';
        $pic = 'afternoon.jpg';
        $alt = 'Midday Seattle';
        $content = 'Todes, even while at rest!
        For optimal results, it is recommended that you perform the workout below 2-5 times per week. Keep in mind that this workout is designed for the gym or home gym, as you will need some extra equipment.';
        break;
        
    case 'Evening' : 
        $greeting = 'Good evening!';
        $pic = 'evening.jpg';
        $alt = 'Evening Seattle';
        $content = 'Today on Evening we are gonna focus on our core and arms! We\'re working our upper body, arms and core in this workout routine. you in every direction. Think about screwing a Christmas tree into the base of a tree stand. It’s about stability in all directions.';
        break;
}



?>
    </header>

