<?php
use App\phpappbuilder\template\Tag;
?>
<div class="form-group">
    <div class="checkbox">
        <label>
            <?php echo Tag::Get('input', $attr,'',false).' '.$label; ?>
        </label>
    </div>
</div>