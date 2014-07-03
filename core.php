<?php

require_once './libraries/class.Input.php';
require_once './libraries/class.Dialog.php';
require_once './libraries/class.Response.php';


$script = "var count = parseInt($(this).find('.badge').text()); $(this).find('.badge').text(count + 1);";
$response = new Response();
$response->script($script);

$html = "<p><strong>Title: </strong>Name</p><p><strong>Content: </strong>Bonnie</p>";
$json_html = json_encode($html);
$response->script("$('#response').html({$json_html})");

$response->dialog(array(
                    'title' => 'Basic Dialog',
                    'content' => "<p>This is the default dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>",
                ));

$response->send();
?>