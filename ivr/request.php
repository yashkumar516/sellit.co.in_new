<?php
header('Content-type: text/xml');
?>
<Response>
    <Dial callerId="+17139097406"><?php  echo $_POST['To'];?></Dial>
</Response>
