<?php
session_start();
setcookie('user','',time()-1,"/");
setcookie('savecode','',time()-1,"/");
session_destroy();
echo"<script>alert('成功登出');parent.location.href=\"../../index.php\";</script>";

?>