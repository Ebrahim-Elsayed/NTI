<?php
    
    function clean($input){
        $input = trim($input);
        $input = htmlspecialchars($input);
        $input = stripcslashes($input);

        return $input;

        stripcslashes(htmlspecialchars(trim($input)));
    }

    function validate($input , $flag){
        $status = true;
        switch ($flag) {
            case 1:
                if (empty($input)) {
                    $status = false;
                }
                break;

            case 2:
                if (!filter_var($input , FILTER_VALIDATE_EMAIL)) {
                    $status = false;
                }
                break;

            case 3:
                if (!filter_var($input , FILTER_VALIDATE_URL)) {
                    $status = false;
                }
                break;

            case 4:
                if (strlen($input) < 6) {
                    $status = false;
                }
                break;
            case 5: 
                if(!filter_var($input,FILTER_VALIDATE_INT)){
                    $status = false;
                }
                break;
        }

        return $status;
    }
    
?>