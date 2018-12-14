<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

        <span class="hidden-xs">@<?=$user?></span>
    </a>
    <ul class="dropdown-menu" style="width:auto;">
        <!-- User image -->
        <li class="user-header" style="height:auto;">
            <div class="img-circle" style="border-width:2px; border-color: #ffcc66; background-color: #fff; width:50px; height:50px; text-align: center; margin: auto; vertical-align: middle;"><b style="font-size:30px;"><?=mb_strtoupper(substr($user,0,1))?></b></div>
            <p>
                @<?=$user?>
            </p>
        </li>

        <!-- Menu Footer-->
        <li class="user-footer">
            <?php if(isset($actions) && is_array($actions) && count($actions)>0) {?>
                <?php foreach($actions as $action) {?>
                    <a href="<?php echo $action['href']; ?>" class="btn btn-default btn-flat"><?php echo $action['name']; ?></a>
                <?php } ?>
            <?php } ?>
        </li>
    </ul>
</li>