<?php
use App\phpappbuilder\template\Tag;
/**
 * $name
 * $last_id
 * $JsTemplater = ''
 * $content = ''
 * $description = ''
 */
?>
<div class="box box-success centurion-helper-collection" style="border-left-style: dotted; border-left-color:#000; border-right-style: dotted; border-right-color:#000; border-bottom-style: dotted; border-bottom-color:#000;" last_id="<?php echo isset($last_id)?$last_id:'-1'; ?>" number="<?php echo $number; ?>" count="<?php echo $count; ?>">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo $name; ?></h3>
        <div class="box-tools pull-right">
            <?php echo Tag::Get('button',[ 'type'=>"button", 'class'=>"btn btn-sm centurion-helper-add-collection-item", 'onclick'=>'CenturionCollectionHelperAdd(this)'],'Добавить эллемент '.Tag::Get('i', ['class'=>'fa fa-plus-circle'])); ?>
        </div>
    </div>
    <div class="box-body">
        <?php echo isset($content)?$content:''; ?>
    </div>

        <script type="text/html" class="helper-collection-template">
            <?php echo $JsTemplater; ?>
        </script>
</div>

