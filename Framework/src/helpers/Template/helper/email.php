<?php
use App\phpappbuilder\template\Tag;
/**
 * $name
 * $input_name
 * $placeholder = ''
 */
?>

<?php
echo Tag::Get('div', ['class'=>'form-group'],
    Tag::Get('label', [], $label).
    Tag::Get('input', $attr,'',false)
);
?>
