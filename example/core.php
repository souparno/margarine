<?php
require_once '../libraries/class.Input.php';
require_once '../libraries/class.Dialog.php';
require_once '../libraries/class.Response.php';
require_once '../libraries/class.Url.php';

class App {


    public $response;

    public function __construct() {
        $this->response = new Response();
    }

    public function run($type) {

        switch ($type) {

            case 'a':

                $script = <<< JS
var count = parseInt($(context.abc).find('.badge').text());
$(context.abc).find('.badge').text(count + 1);
JS;
                $this->response->script($script);
                break;

            case 'a-trigger':
                $script = <<< JS
var count = parseInt($(context.this).find('.badge').text());
$(context.this).find('.badge').text(count + 1);
                    
var count2 = parseInt($(context.target).find('.badge').text());
$(context.target).find('.badge').text(count2 + 1);
JS;
                $this->response->script($script);

                break;

            case 'form':

                $title = $_POST['title'];
                $content = $_POST['content'];

                $html = "<p><strong>Title: </strong>" . $title . "</p><p><strong>Content: </strong>" . $content . "</p>";
                $json_html = json_encode($html);
                $this->response->script("$(context.form_respose).html({$json_html})");

                break;

            case 'dialog':
                $this->response->confirm(array(
                    'title' => 'Basic Dialog',
                    'content' => "<p>The content of every dialog box can be generated dynamically
                        on the server side</p>",
                ));
                break;
        }

        $this->response->send();
    }

}

$app = new App();
if (isset($_GET['type']))
    $app->run($_GET['type']);







/*
  $html = "<p><strong>Title: </strong>Name</p><p><strong>Content: </strong>Bonnie</p>";
  $json_html = json_encode($html);
  $response->script("$(context.response2).html({$json_html})");


  $html = "<p>Helo there how you doing</p>";
  $json_html = json_encode($html);

  $response->script("$(context.response3).html({$json_html})"); */
?>