<?php
    //Throw Error
    function checkData($data) {
        if (!is_numeric($data)) {
            throw new Exception("Data format error: harus angka!");
        }
        return true;
    }

    //Catch the Error
    try {
        checkData("abc");
        echo "Data valid!";
    } catch (Exception $e) {
        echo "Error ditangkap: " . $e->getMessage();
    }
?>