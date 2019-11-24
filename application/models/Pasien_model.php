<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_model extends MY_Model {
    public function __construct(){
        $table = 'pasien';
        $detail = '';
        parent::__construct($table,$detail);
    }
}