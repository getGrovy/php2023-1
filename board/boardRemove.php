<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionChk.php";
    $boardID = $_GET['boardID'];
    $boardID = $connect -> real_escape_string($boardID);

    $sql = "delete from board where boardid = {$boardID}";
    echo $sql;
    $connect -> query($sql);
?>
<script>
    location.href = "board.php";
</script>