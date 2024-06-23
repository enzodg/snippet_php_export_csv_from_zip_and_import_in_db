<?php
// controller
if(isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'extract_csv':
            extract_csv();
            break;

        case 'save_csv':
            save_csv();
            break;
    }
}   

function get_db_connection(){
    $host = 'localhost';
    $db = 'erp';
    $username = 'root';
    $password = 'root';

    $conn = new mysqli($host, $username, $password, $db);
    if ($conn)
        // echo 'Connected successfully';
    if ($conn->connect_error)
        die('Connection failed: ' . $conn->connect_error);
    return $conn;
}

function extract_csv(){
    $result = '';
    $zip = new ZipArchive;
    $res = $zip->open('employees.zip');
    if ($res === true) {
        $zip->extractTo(realpath(__DIR__));
        $zip->close();
        $result = 'success. csv extracted from zip';
    } else {
        $result = 'error. csv not extracted';
    }
    echo $result;
}

function save_csv(){
    $conn = get_db_connection();
    
    try {
        $file = fopen('employees.csv', 'r');
        fgetcsv($file);  // read one line for nothing (skip header)
        while (($line = fgetcsv($file)) !== FALSE) {
            $id          = $line[0];
            $surname     = $line[1];
            $name        = $line[2];
            $extension   = $line[3];
            $email       = $line[4];
            $office_code = $line[5];
            $title       = $line[7];

            $query = "INSERT INTO employees (employeeNumber, lastName, firstName, extension, email, officeCode, jobTitle) VALUES ($id, '$surname', '$name', '$extension', '$email', $office_code, '$title')";
            mysqli_query($conn, $query);
        }
        fclose($file);
        echo 'success. csv saved in db';
    } catch(Exception $e) {
        echo $e->getMessage();
    }

    mysqli_close($conn);
    
}
