<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Last extends Application{
    
    function __construct(){
        parent::__construct();
    }
    
    public function index(){
        $this->data['pagebody'] = 'justone';
        
        #$this->data += $this->quotes->end($this->quotes);
        
        // build the list of authors, to pass on to our view
		$source = $this->quotes->all();
		$authors = array ();
		foreach ($source as $record)
		{
			$authors[] = array ('who' => $record['who'], 'mug' => $record['mug'], 'what' => $record['what']);
		}
		$this->data += end($authors);
        
        
		$this->render();
    }
}