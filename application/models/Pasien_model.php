<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_model extends MY_Model {
    public function __construct(){
        $table = 'pasien';
        parent::__construct($table);
    }
}