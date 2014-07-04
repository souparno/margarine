<?php

require_once '../libraries/class.Input.php';
require_once '../libraries/class.Dialog.php';
require_once '../libraries/class.Response.php';


$response = new Response();

$script = "var count = parseInt($(context.this).find('.badge').text()); $(context.this).find('.badge').text(count + 1);";
$response->script($script);

$html = "<p><strong>Title: </strong>Name</p><p><strong>Content: </strong>Bonnie</p>";
$json_html = json_encode($html);
$response->script("$(context.response2).html({$json_html})");

$response->dialog(array(
                    'title'   => 'Basic Dialog',
                    'content' => "<p>
                                    This is the default dialog which is useful for displaying information. 
                                    The dialog window can be moved, resized and closed with the 'x' icon.
                                  </p>",
                ));

$response->send();
?>