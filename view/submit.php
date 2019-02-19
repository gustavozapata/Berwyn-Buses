<?php

echo "<pre>";
print_r($_FILES);
echo "</pre>";

if(move_uploaded_file($_FILES['file']['tmp_name'], "{$_FILES['file']['name']}")){
    echo "file uploaded";
}

?>