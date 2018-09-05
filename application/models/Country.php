<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Country extends MY_Model {

    public $_table = 'country';
    public $primary_key = 'id';

    protected function data_process($row) {
        $row[$this->callback_parameters[0]] = $this->_process($row[$this->callback_parameters[0]]);

        return $row;
    }

    
   
    

}

/* End of file country_model.php */
/* Location: ./application/modules/account/models/country_model.php */