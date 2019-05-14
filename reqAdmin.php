<?php
//Used by being required in other files. Redirects to login page if user is not dshop. Redirects to login page after 10 minutes.
	session_start();
	header("refresh: 601"); 
    if (!isset($_SESSION['userUid'])||$_SESSION['userUid']!=="dshop") {
        header('Location: ../CateringApp/form.php?error=noaccess');
        exit();
    }
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 600)) {
    session_unset();
    session_destroy();
    header("Location:../CateringApp/login_page.php?sessiontimeout");
}
$_SESSION['LAST_ACTIVITY'] = time();
?>