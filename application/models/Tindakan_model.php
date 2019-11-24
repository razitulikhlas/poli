<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tindakan_model extends MY_Model {
    public function __construct(){
        $table = 'tbl_tindakan';
        parent::__construct($table);
    }
}
