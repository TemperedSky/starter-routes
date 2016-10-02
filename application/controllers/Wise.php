<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Wise extends Application{
    
    function __construct(){
        parent::__construct();
    }
    
    public function bingo(){
        $this->data['pagebody'] = 'justone';
        
        $this->data += $this->quotes->get(6);
		$this->render();
    }
}