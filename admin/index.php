<?php 
$base_url=$_SERVER['DOCUMENT_ROOT'];
include_once($base_url.'/db/connection.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>App</title>
    <link rel="stylesheet" href="<?=$base_url?>/assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?=$base_url?>/assets/css/bootstrap-theme.min.css"/>
    <script src="<?=$base_url?>/assets/js/jquery.min.js"></script>
    <script src="<?=$base_url?>/assets/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
    <table class="table">
        <tr>
            <th>
                Id
            </th>
            <th>Name</th>
            <th>Accept</th>
            <th>Status</th>
        </tr>
        <?php
        $db=connect();
        $sql="select * from enquiries";
        $result=query($db,$sql);
        while($row=fetch_record($result)):
        ?>
        <tr id="row-<?=$row['id']?>">
            <td><?=$row['id']?></td>
            <td><?=$row['first_name']?> <?=$row['last_name']?></td>
            <td style="text-align:left">
                <span class="choice-button">
                    <a href="javascript:void(0)"
                    data-row-id="<?=$row['id']?>" class="accept-btn btn btn-success">Accept</a>
                    <a href="javascript:void(0)"
                data-row-id="<?=$row['id']?>" class="reject-btn btn btn-danger">Reject</a>
                </span>
            </td>
            <td>
                <span class="row-status"></span>
            </td>
        </tr>
        <?php
        endwhile;
        ?>
    </table>

    </div>

    <script>
        $(document).ready(function(){
            $(".accept-btn").on('click',function(){
                var $this=$(this);
                var $id=$this.attr('data-row-id');
                changeStatus($this,$id,1);
                
            });
            $(".reject-btn").on('click',function(){
                var $this=$(this);
                var $id=$this.attr('data-row-id');
                changeStatus($this,$id,0);
            });
        });

        function changeStatus($row,id,status){
            $.post('page',{id:id,accept:status},function(res){
                $row=$("#row-"+id);
                var $rowStatus=$row.find(".row-status");
                $rowStatus.html((status==1)?"Accepted":"Rejected");
                $row.find(".choice-button").hide();

            });
        }
    </script>
</body>
</html>