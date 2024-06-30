<?php
include('connect.php');
if($_POST['text'] == ""){
    echo 'Заполните форму';
} else {
    $datetimenow = date("d.m.Y H:i");
    
    $sql = 'UPDATE `subcomment` SET `text`="'.addslashes($_POST['text']).'" WHERE id='.$_POST['idcomment'];
    $result = mysqli_query($link, $sql);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    } else {
        echo 'Запись обновлена';
    }
}
mysqli_close($link);
?>