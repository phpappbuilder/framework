<?php
use App\phpappbuilder\template\Tag;
?>

<?php
echo Tag::Get('div', ['class'=>'form-group'],
    Tag::Get('label', [], $label).
    Tag::Get('textarea', $attr, $value)
);
?>