<?php
/**
 * $title
 * $description
 * $breadcrumbs = [
 *  ['active'=>false|true , 'value'=>'<tags/>']
 * ]
 */
?>
<section class="content-header">
    <h1>
        <?php echo $title; ?>
        <small><?php echo $description; ?></small>
    </h1>
    <ol class="breadcrumb">
        <?php foreach($breadcrumbs as $value) {?>
            <li<?php if(isset($value['active']) && $value['active']) {echo ' class="active"';}?>><?php echo $value['value']; ?></li>
        <?php } ?>
    </ol>
</section>
