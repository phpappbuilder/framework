<?php
use App\phpappbuilder\template\Tag;
?>
<div class="checkbox">
    <label>
        <?php echo Tag::Get('input', $attr,'',false).' '.$name; ?>
    </label>
</div>