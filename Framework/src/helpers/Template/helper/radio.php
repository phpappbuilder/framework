<?php
use App\phpappbuilder\template\Tag;
?>
<div class="form-group">
    <?php echo Tag::Get('label', [], $label); ?>
    <?php echo $content; ?>
</div>