<?php
/**
 * $fa_icon
 * $name
 * $href
 * $badges = [
 *  ['color'=>'yellow|green|red|blue' , 'value'=>'text']
 * ]
 * $child = []
 */
?>
<li<?php if(isset($child) && is_array($child) && count($child)>0) {echo ' class="treeview"';}?>>
    <a href="<?php if(!isset($child) or $child == '') { echo $href; } else {echo "#";} ?>">
        <i class="<?php echo $fa_icon; ?>"></i>
        <span><?php echo $name; ?></span>
        <span class="pull-right-container">
                                        <?php if(!isset($child) or $child == '') {?>
                                            <?php if(isset($badges) && is_array($badges) && count($badges)>0) { foreach($badges as $badge) {?>
                                                <small class="label pull-right bg-<?php echo $badge['color'] ?>"><?php echo $badge['value'] ?></small>
                                            <?php }} ?>
                                        <?php } else { ?>
                                            <i class="fa fa-angle-left pull-right"></i>
                                        <?php } ?>
                                    </span>
    </a>
    <?php if(isset($child) && is_array($child) && count($child)>0) { ?>
        <ul class="treeview-menu">
            <?php foreach($child as $value) {?>
                <?php echo $value; ?>
            <?php } ?>
        </ul>
    <?php } ?>

</li>
