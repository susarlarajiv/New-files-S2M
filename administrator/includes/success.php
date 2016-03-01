     
<div style="padding-top:20px;">
<?php 

if(isset($_GET['err']) && $_GET['err']!=""){

?>

<div class="success" a><img src="img/error.png" width="20px" height="20px;" />Success: <?=$_GET['err']?>!</div>

<?php } if(isset($_GET['ferr']) && $_GET['ferr']!=""){?>

<div class="warning">Fail: <?=$_GET['ferr']?>.</div>

<?php }?>

</div>