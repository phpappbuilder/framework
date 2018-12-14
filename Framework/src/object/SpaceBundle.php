<?php return [
    ["path" => 'collection/phpappbuilder/object/checking_parent' , "name" => 'alow', "value" => ['object'=>App\phpappbuilder\object\RootObject::class, 'all_except'=>App\phpappbuilder\object\RootObject::class] ],
    ["path" => 'collection/phpappbuilder/object/checking_child' , "name" => 'alow', "value" => ['object'=>App\phpappbuilder\object\RootObject::class, 'none_but'=>null] ],
    ["path" => 'collection/phpappbuilder/object/object' , "name" => 'This is root object', "value" => App\phpappbuilder\object\RootObject::class ]
];