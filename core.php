<?php

class Input {

    /**
     * Check if request is an AJAX 
     * 
     */
    function is_ajax_request() {
        return $isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
    }

}

class Response {

    protected $input;
    protected $data;

    public function __construct() {
        $this->input = new Input();
    }

    /**
     * Add callback Javascript
     *
     * @access  public
     * @param   string  $script
     * @return  void
     */
    public function script($script) {
        $this->data['scripts'][] = $script;
    }

    /**
     * Send response to CIS.Ajax.response() Javascript function
     *
     * @access  public
     * @param   boolean $data
     * @return  void
     */
    public function send($return = FALSE) {
        if (!empty($this->data) && $this->input->is_ajax_request()) {
            $json_data = json_encode($this->data);
            if ($return) {
                return $json_data;
            } else {
                echo $json_data;
                exit;
            }
        }
    }

}

$script = "var count = parseInt($(this).find('.badge').text());
    $(this).find('.badge').text(count + 1);";
$response = new Response();
$response->script($script);

$html = "<p><strong>Title: </strong>Name</p><p><strong>Content: </strong>Bonnie</p>";
$json_html = json_encode($html);
$response->script("$('#response').html({$json_html})");


$response->send();
?>