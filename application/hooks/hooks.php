<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Function to bold capitalized words on quote page.
 */
function starFourLetterWords() {
        //getting the instance of the display page and putting it into a buffer for
        //modification
        $CI = & get_instance();
        $buffer = $CI->output->get_output();
        //finds a <p> tag that has the class 'lead' and gets the tags contents
        preg_match_all('/<\s*p class=\"lead\"[^>]*>([^<]*)<\s*\/\s*p\s*>/', $buffer, $string);
        
        $shortString = $string[0]; //getting the subarray from $string
        
        //loops through all matches and adds bold tags
        foreach ($shortString as &$match)
        {
            $match = preg_replace("/\b((?<!<p class=\")[A-z]{4})\b/", "****", $match);
        }

        //ensures that the variable is not undefined
        $shortString = $shortString + array(null);
        
        //replaceds the old section with the modified section of code
        $buffer = preg_replace('/<p[^>]*class="lead"[^>]*>([^>]*)<\s*\/\s*p\s*>/', $shortString[0], $buffer);
        //send the page onward to be displayed
        $CI->output->set_output($buffer);
        $CI->output->_display();
}