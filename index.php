<?php include_once("shared/header.php")?>
    <?php
        
        //$db=connect();
        $db=new mysqli('localhost','root','admin','php18002_hr');

        $sql="select * from courses";
        $stmt=$db->prepare($sql);
        $stmt->execute();
        //$query=query($db,$sql);
        $result=$stmt->get_result();

        while(($row=$result->fetch_assoc())){
            echo "<li>".$row['course_name'] ."</li>";
        }
        $db->close();
        //close($db);
    ?>
<?php include_once("shared/footer.php")?>