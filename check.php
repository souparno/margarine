<?php


$json=json_encode(
        array(
            'a'=>'this is a',
            'b'=>'this is b',
            'c'=>array(
                'group1'=>'this is group 1',
                'group2'=>'this is group 2'
            ),
            'd'=>'this is d'
        )
        );


echo $json;

?>
