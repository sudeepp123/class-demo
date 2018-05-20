<?php include_once("shared/header.php")?>
<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $db=connect();
        $sql="insert into enquiries(first_name,last_name,email,
              contact_no,course_id,message,status) 
              values($1,$2,$3,$4,$5,$6,$7)";
        $params=[
            $_POST['first_name'],$_POST['last_name'],$_POST['email'],
            $_POST['contact_no'],$_POST['course_id'],$_POST['message'],
            'false'
        ];
        $result=execute($db,$sql,$params);
        close($db);

    }
?>

    <div class="page-header">
        <h1>Enquiry Form</h1>
    </div>

    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="first_name" class="form-control" required="required"/>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="last_name" class="form-control" required="required"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required="required"/>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Contact No</label>
                    <input type="text" name="contact_no" class="form-control" required="required"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Interested Course</label>
                    <select name="course_id" class="form-control" required="required">
                        <option value="">Select Interested Course</option>
                        <?php
                            $db=connect();
                            $sql="select * from courses";
                            $query=query($db,$sql);
                    
                            while(($row=fetch_record($query))){
                        ?>
                            <option value="<?=$row['id']?>"><?=$row['course_name']?></option>
                        <?php
                            }
                    
                            close($db);
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Preferred Timing</label>
                    <input type="text" name="timing" class="form-control" required="required"/>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-md-8">
                <div class="form-group">
                    <label>Message (if Any)</label>
                    <textarea name="message" class="form-control" style="height:150px"></textarea>
                    
                </div>
            </div>
        </div>
        
            <button type="submit" class="btn btn-primary">Send</button>
        
    </form>
<?php include_once("shared/footer.php")?>