<?php
use App\phpappbuilder\template\Tag;
/**
 * $title
 * $submit = true|false
 * $content = ''
 * $description = ''
 * $form = []
 */
?>

    <div class="box box-default">
        <form <?php echo Tag::GetParams($form); ?>>
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo isset($title)?$title:''; ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $submit?Tag::Get('button',[ 'type'=>"submit", 'class'=>"btn btn-sm"],'Сохранить '.Tag::Get('i', ['class'=>'fa fa-save'])):''; ?>
                </div>
            </div>
            <div class="box-body">

                    <?php echo $content; ?>

            </div>

        </form>
    </div>
