<?php

    $host        = "host = ec2-54-225-200-15.compute-1.amazonaws.com";
    $port        = "port = 5432";
    $dbname      = "dbname = d4hp0k6fjs4fo6";
    $credentials = "user = mbznicikditsid password=a2522df0b17934987f4830f1664e1524cda020fab91a17b4f005e20215b1170c";

    $db = pg_connect( "$host $port $dbname $credentials"  );

    $sql="insert into enquiries(first_name,last_name,email,contact_no,course_id,
    message,status) values($1,$2,$3,$4,$5,$6,$7)";

    pg_prepare($db,'insert-query',$sql);
    $result = pg_execute($db,'insert-query',array('Anish','Pokherel',
                                        'anil@gmail.com','9796996','1',
                                        'NA','true'));

    echo $result;                                    