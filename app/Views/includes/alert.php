<?php if(isset($_COOKIE['success'])){?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
<?php echo $_COOKIE['success']; ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php }
if(isset($_COOKIE['faild'])){
?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<?php echo $_COOKIE['faild']; ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php }?>

