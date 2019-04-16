<?php 

    printf("Porter id is: %d\n", $_SESSION['Porter_ID']);
    $Porter_ID = $_SESSION['Porter_ID'];

    $db = mysqli_connect('localhost', 'root', '', 'assignment_schema');

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    if ($result = mysqli_query($db, "SELECT * FROM Students")) {
        printf("Select returned %d rows.\n", mysqli_num_rows($result));
        mysqli_free_result($result);
    }
    $sql = "SELECT * FROM Students where Porter_ID ='$Porter_ID'";

    if($result = mysqli_query($db, $sql)) {
         while ($row = mysqli_fetch_assoc($result)) {
             printf ("%d | %d\n", $row["student_id"], $row["Porter_ID"]); 
         }
    }

    mysqli_free_result($result);
    mysqli_close($db);
?>
