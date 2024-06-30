<?php
include('connect.php');
if($_POST['name'] == "" or $_POST['text'] == ""){
    echo 'Заполните форму';
} else {
    $datetimenow = date("d.m.Y H:i");
    
    $sql = 'INSERT INTO `subcomment`(`idcomment`, `name`, `text`, `datetime`) VALUES ('.$_POST['idcomment'].', "'.addslashes($_POST['name']).'", "'.addslashes($_POST['text']).'", "'.$datetimenow.'")';
    $result = mysqli_query($link, $sql);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    } else {
        echo 'Запись добавлена';
    }
}
mysqli_close($link);
?>