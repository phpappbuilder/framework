<?php
use App\phpappbuilder\template\Tag;
?>
    <div class="radio">
        <label>
            <input <?php echo Tag::GetParams($input); ?>>
            <?php echo $text; ?>
        </label>
    </div>