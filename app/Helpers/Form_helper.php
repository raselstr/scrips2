<?php 
    function display_error($valid,$field){
        if($valid->hasError($field)){
            return $valid->getError($field);
        }else{
            return false;
        }
    }


?>