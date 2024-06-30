<?php
include('connect.php');
if($_POST['delid'] == ""){
    echo 'Заполните форму';
} else {    
    $sql = 'DELETE FROM `subcomment` WHERE `id`='.$_POST['delid'];
    $result = mysqli_query($link, $sql);
    $sql1 = 'DELETE FROM `subcomment` WHERE `idcomment`='.$_POST['delid'];
    $result1 = mysqli_query($link, $sql1);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    } else {
        echo 'Запись удалена';
    }
}
mysqli_close($link);
?>