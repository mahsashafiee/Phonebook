<?php if(count($errors)> 0) { ?>
<div class="alert alert-danger">
    <?php foreach($errors as $error) { 
        echo $error;
    } ?> 
</div>
<?php } ?>