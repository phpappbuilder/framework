<?php
/**
 * $section[[
 * 'name' => '',
 * 'collection' => [
 *
 *      ]
 * ],]
 */
?>
<?php if (isset($section) && is_array($section) && count($section)>0) {
    foreach ($section as $value) {?>
        <li class="header"><?php echo $value['name']; ?></li>

        <?php if (isset($value['collection']) && is_array($value['collection']) && count($value['collection'])>0) { ?>
            <?php foreach ($value['collection'] as $item) {?>
                <?php echo $item; ?>
            <?php } ?>
        <?php } ?>
    <?php }} ?>