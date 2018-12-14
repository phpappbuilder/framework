<header class="main-header">
    <!-- Logo -->
    <a href="/App/phpappbuilder/admin/assets/index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><?=$LogoSmall?></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><?=$LogoBig?></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
                <?php if (isset($dropdown) && is_array($dropdown)) {
                    foreach ($dropdown as $key => $value) { ?>
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="<?php echo $value['fa_icon'];?>"></i>
                                <?php if (isset($value['label']) && $value['label']!='') {?>
                                <span class="label label-<?php if(isset($value['label_type']) && $value['label_type']!='') { echo $value['label_type']; } else {echo "success"; }?>"><?php echo $value['label']; ?></span>
                                <?php } ?>
                            </a>
                            <ul class="dropdown-menu">
                                <?php if (isset($value['header'])) {?>
                                    <li class="header"><?php echo $value['header']; ?></li>
                                <?php } ?>
                                <?php if (isset($value['content'])) {?>
                                    <li>
                                        <ul class="menu">
                                            <li>
                                                <?php echo $value['content']; ?>
                                            </li>
                                        </ul>
                                    </li>
                                <?php } ?>
                                <?php if (isset($value['footer'])) {?>
                                    <li class="footer"><?php echo $value['footer']; ?></li>
                                <?php } ?>

                            </ul>
                        </li>
                <?php }}?>

                <!-- User Account: style can be found in dropdown.less -->
                <?=$auth?>
                <!-- Control Sidebar Toggle Button -->
            </ul>
        </div>
    </nav>
</header>