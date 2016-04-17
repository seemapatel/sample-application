<?php

/** 
 * PHP handler saves entries to a single daily log file.  Each calendar day should have its own log file
 * Datahandler class:
 * - Constructor to initialize date and log file.
 * - contains get_submission to get the POST Data and append public methods.
 * - message is written with the following format: [F j, Y, g:i a] Name: Message:
 */
 
    Class DataHandler {
        
        Private $log;
        Private $name;
        Private $message;

        Public function __construct() {
            
                $this->date = date("j.n.Y");
                $this->log=  date("F j, Y, g:i a").PHP_EOL;     
        }
       Public function get_submission() {
           if(isset($_POST['name'])) {
                $this->name = $_POST['name'];
                $this->message = $_POST['message'];
           }
	}
        
        Public function append(){
            
            $this->log .= "Name: ".$this->name.PHP_EOL."Message: ".$this->message.PHP_EOL."-------------------------".PHP_EOL;
            
            //Save string to log, use FILE_APPEND to append.
            
            file_put_contents('./log_'.$this->date.'.txt', $this->log, FILE_APPEND);
            
            echo "Thank you";
            
        }
           
    }
       
       $handlerObj = new DataHandler();
       
       $handlerObj->get_submission();
      
       $handlerObj->append();
?>

