    <?php
    
    function clean($input){
        $input = trim($input);
        $input = htmlspecialchars($input);
        $input = stripcslashes($input);

        return $input;

        stripcslashes(htmlspecialchars(trim($input)));
    }
    
    ?>