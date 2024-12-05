<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Template
{
    protected $_ci;
    public function __construct()
    {
        $this->_ci = &get_instance();
     }

    public function display($content, $header, $params = null)
    {

        $data['content'] = $this->_ci->load->view($content, $params, TRUE);
        $this->_ci->load->view($header, $data);
    }
}
/* Location: ./application/libraries/TemplateNew.php */
