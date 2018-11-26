<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        // echo 'filename '.$filename.' '.$_FILES["photo"]["tmp_name"]; 
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 3MB maximum
        $maxsize = 3 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        if(in_array($filetype, $allowed)) {
            // Check whether file exists before uploading it
            if(file_exists("upload/" . $filename)){
                echo $filename . " is already exists.";
            } 
            else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "/opt/lampp/htdocs/upload/" . $filename);
                echo "Your file was uploaded successfully.";
                
                // include_once('pdo.php');
                // mysql_connect("127.0.0.1", "root", "", "data") or die(mysql_error()) ;
                // mysql_select_db("data") or die(mysql_error()) ;

                // header('location:get-details-of-uploaded-file.php');
            } 
        } 
        else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } 
    else{
        echo "Error: " . $_FILES["photo"]["error"];
    }

    if(isset($_FILES["document"]) && $_FILES["document"]["error"] == 0){
        // $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
        $filename = $_FILES["document"]["name"];
        // echo 'filename '.$filename.' '.$_FILES["photo"]["tmp_name"]; 
        // $filetype = $_FILES["document"]["type"];
        $filesize = $_FILES["document"]["size"];
    
        // Verify file extension
        // $ext = pathinfo($filename, PATHINFO_EXTENSION);
        // if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 10MB maximum
        $maxsize = 10 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("upload/" . $filename)){
                echo $filename . " is already exists.";
            } 
            else{
                move_uploaded_file($_FILES["document"]["tmp_name"], "/opt/lampp/htdocs/upload/" . $filename);
                echo "Your file was uploaded successfully.";
                $my_file = "/opt/lampp/htdocs/upload/" . $filename;
                $handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);
                $data = 'Together we change the world, just one random act of kindness at a time';
                fwrite($handle, $data);
                // include_once('pdo.php');
                // mysql_connect("127.0.0.1", "root", "", "data") or die(mysql_error()) ;
                // mysql_select_db("data") or die(mysql_error()) ;

                // header('location:get-details-of-uploaded-file.php');
            } 
        } 
        else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } 
    else{
        echo "Error: " . $_FILES["document"]["error"];
    }
}
?>