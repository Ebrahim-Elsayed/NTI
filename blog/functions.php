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

    // function imgValidation($file_tmp , $file_name){
    //     $file_tmp  = $_FILES['image']['tmp_name'];
    //     $file_name = $_FILES['image']['name'];
    //     $file_size = $_FILES['image']['size'];
    //     $file_type = $_FILES['image']['type'];
    //   if(!empty($_FILES['image']['name'])){
    //     $file_extention =  explode('.' , $file_name);  //explode --> change tring to array
    //     $final_ext = strtolower(end($file_extention)); //end --> last part of string
    //     // $file_extention[count($file_extentions)-1]

    //     $extentions = ['png' , 'jpg' , 'gif' , 'pdf'];
    //     if(in_array($final_ext , $extentions)){
    //         // upload code
    //         $finalName = time().rand(). "." . $final_ext;
            
    //         $finalPath = '../uploads/'.$finalName;

    //         if(move_uploaded_file($file_tmp , $finalPath)){
    //             echo "file uploaded succesfuly";
    //         }else{
    //             echo 'error try again';
    //         }
    //     }else{
    //         echo "*this extention is not allowed";
    //     }
    //   }else{    
    //       echo '*_image is required' . "<br>";
    //   }
    // //   return $finalPath;
    // }
    
?>