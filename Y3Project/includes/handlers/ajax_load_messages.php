<?php
include("../../config/config.php");
include("../classes/User.php");
include("../classes/Message.php");

$limit = 50; 

$message = new Message($con, $_REQUEST['userLoggedIn']);
echo $message->getconversationsDropdown($_REQUEST, $limit);

?>