<?php
//config page that is linked to credentals.php

ob_start(''); //prevents header errors before reading the whole page!!

define('DEBUG', 'TRUE'); //we want to see our errors!

include('credentials.php');

define('THIS_PAGE', basename($_SERVER['PHP_SELF']));

//switch >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> NAVIGATION SWITCH <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
switch(THIS_PAGE){
    case 'index.php':
    $title = 'Homepage';
    $mainHeadline = 'Welcome to our home page!';
    $center = 'center';
    $body = 'home';
    break;

    case 'about.php':
    $title = 'About page';
    $mainHeadline = 'Welcome to our about page!';
    $center = 'center';
    $body = 'about inner';
    break;

    case 'homes.php':
    $title = '$1million houses';
    $mainHeadline = 'Find your dream home here';
    $center = 'center';
    $body = 'homes inner';
    break;

    case 'contact.php':
    $title = 'Contact us';
    $mainHeadline = 'Contact us today!';
    $body = 'contact inner';
    $center = 'center';
    break;

    case 'reference.php':
    $title = 'References';
    $mainHeadline = 'References used in this website';
    $body = 'reference inner';
    $center = 'center';
    break;

    case 'homes-view.php':
    $title = 'Property page';
    $body = 'property inner';
    $center = 'center';
    break;
}//end switch
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> NAVIGATION <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

$nav['index.php']='Home';
$nav['about.php']='About';
$nav['homes.php']='Property';
$nav['contact.php']='Contact';
$nav['reference.php']='References';


function makeLinks($nav) {
    $myReturn = '';
    foreach($nav as $key => $value) {
        if(THIS_PAGE == $key) {
            $myReturn .= '<li><a href="'.$key.' " class="active"> '.$value.' </a></li>';
        }
        else {
            $myReturn .= '<li><a href=" '.$key.' "> '.$value.' </a></li>';
        }
    }//end foreach brace close

    //always rememebr to return  myReturn
    return $myReturn;

}//end function

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> END NAVIGATION <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> FORM <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

$firstName = '';
$lastName = '';
$email = '';
$contact = '';
$privacy = '';
$comments = '';
$tel = '';
$property='';

$firstNameErr = '';
$lastNameErr = '';
$emailErr = '';
$contactErr = '';
$privacyErr = '';
$commentsErr = '';
$telErr = '';
$propertyErr = '';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

//>>>>>>>>>>>> First Name <<<<<<<<<<<<
if (empty($_POST['firstName'])) {
    $firstNameErr = 'Please fill out your first name';
} else {
    $firstName = $_POST['firstName'];
}
//>>>>>>>>>>>> Last Name <<<<<<<<<<<<
if (empty($_POST['lastName'])) {
    $lastNameErr = 'Please fill out your last name';
} else {
    $lastName = $_POST['lastName'];
}
//>>>>>>>>>>>> Email <<<<<<<<<<<<
    if (empty($_POST['email'])) {
        $emailErr = 'Please fill out your email';
    } else {
        $email = $_POST['email'];
    }

//>>>>>>>>>>>> Contact  <<<<<<<<<<<<
    if (empty($_POST['contact'])) {
        $contactErr = 'Don\'t want to be contacted?';
    } else {
        $contact = $_POST['contact'];
    }
//>>>>>>>>>>>> Property  <<<<<<<<<<<<
if (empty($_POST['property'])) {
    $propertyErr = 'Not interested in anything?';
} else {
    $property = $_POST['property'];
}
//>>>>>>>>>>>> Comments <<<<<<<<<<<<
    if (empty($_POST['comments'])) {
        $commentsErr = 'Please include your comments';
    } else {
        $comments = $_POST['comments'];
    }
//>>>>>>>>>>>> Privacy <<<<<<<<<<<<    
    if (empty($_POST['privacy'])) {
    $privacy = 'Please agree to our privacy terms';
    } else {
    $privacy = $_POST['privacy'];
    }


//if end user check check boxes, all of them, we want to know
//function implode the array of wines

function myContact() {
    $myReturn = '';
    if (!empty($_POST['contact'])) {
        $myReturn = implode(',', $_POST['contact']);
    } 
    return $myReturn; //end if
}
//end function myWInes

//>>>>>>>>>>>> Phone num format and error <<<<<<<<<<<<   if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $_POST['tel']))

if(empty($_POST['tel'])) {  // if empty, type in your number
    $telErr = 'Your phone number please!';
    } elseif(array_key_exists('tel', $_POST)){
    if(!preg_match('/^[0-9]{3}[0-9]{3}[0-9]{4}$/', $_POST['tel']))
    { // if you are not typing the requested format of xxx-xxx-xxxx, display Invalid format
    $telErr = 'Invalid format!';
    } else{
    $tel = $_POST['tel'];
    }
    }

    //>>>>>>>>>>>>>>>>>>> Emailable part <<<<<<<<<<<<<<<<<<

if (isset($_POST['firstName'],
          $_POST['lastName'],
          $_POST['contact'],
          $_POST['property'],
          $_POST['comments'],
          $_POST['tel'],
          $_POST['privacy'])) {
   $to = 'szemeo@mystudentswa.com' ;
   $subject = 'Test email'.date('m/d/y');
   $body = ' '.$firstName.' '.$lastName.'has filled out your form. '.PHP_EOL.'';
   $body .= 'Email: '.$email.' '.PHP_EOL.'';
   $body .= 'Phone: '.$tel .' '.PHP_EOL.'';
   $body .= 'Contact method: ' .myContact().' '.PHP_EOL.'';
   $body .= 'Interested in: '.$property.' '.PHP_EOL.' ';
   $body .= 'Comments: '.$comments.' ';

   $headers = array(
       'From' => 'no-reply@mywebsite.com',
       'Reply-to' => ''.$email.''
   );


mail($to, $subject, $body, $headers);
header('Location: thx.php');

}//end isset

} //close if $_server request method

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> ENDFORM <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

//Please remember this is placed at the very bottom of the config file!
function myError ($myFile, $myLine, $errorMsg) {
    if(defined('DEBUG') && DEBUG) {
        echo 'Error in file: <b> '.$myFile.' </b> on line: <b> '.$myLine.' </b>';
        echo 'Error message: <b> '.$errorMsg.' </b>';
        die();
    }
    else {
        echo 'Houston, we have a problem!';
        die();
    }
}
//////??????
?>