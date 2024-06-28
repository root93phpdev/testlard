<?php
include('connect.php');
if($_POST['delid'] == ""){
    echo 'Заполните форму';
} else {    
    $sql = 'DELETE FROM `comment` WHERE `id`='.$_POST['delid'];
    $result = mysqli_query($link, $sql);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    } else {
        echo 'Запись удалена';
    }
}
mysqli_close($link);
?>