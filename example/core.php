<?php

require_once '../libraries/class.Input.php';
require_once '../libraries/class.Dialog.php';
require_once '../libraries/class.Response.php';

class App {

    public static function validate($type) {

        $response = new Response();

        switch ($type) {

            case 'a':
                
                $script = <<< JS
var count = parseInt($(context.abc).find('.badge').text());
$(context.abc).find('.badge').text(count + 1);
JS;
                $response->script($script);
                break;
            
            case 'a-trigger':
                $script = <<< JS
var count = parseInt($(context.this).find('.badge').text());
$(context.this).find('.badge').text(count + 1);
                    
var count2 = parseInt($(context.target).find('.badge').text());
$(context.target).find('.badge').text(count + 1);
JS;
                $response->script($script);
                $response->script($script);
                break;
            
            case 'form':
                break;
            
            case 'dialog':
                $response->dialog(array(
                    'title' => 'Basic Dialog',
                    'content' => "<p>
  This is the default dialog which is useful for displaying information.
  The dialog window can be moved, resized and closed with the 'x' icon.
  </p>",
                ));
                break;
 
        }

        $response->send();
    }

}

if(isset($_GET['type'])) App::validate($_GET['type']);


/*
$html = "<p><strong>Title: </strong>Name</p><p><strong>Content: </strong>Bonnie</p>";
$json_html = json_encode($html);
$response->script("$(context.response2).html({$json_html})");


$html = "<p>Helo there how you doing</p>";
$json_html = json_encode($html);

$response->script("$(context.response3).html({$json_html})");*/





?>