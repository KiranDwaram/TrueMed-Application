<?php
    $con = new PDO("mysql:host=localhost; dbname=medicine_test",
                    "root","");
    $con->setAttribute(PDO::ATTR_ERRMODE,
                        PDO::ERRMODE_EXCEPTION);

    $query = "SELECT name from constituents";
    $ps = $con->prepare($query);

    // Fetch matching row.
    $ps->execute();
    $data = $ps->fetchAll(PDO::FETCH_ASSOC);
    
    $dname_list = array();
    foreach($data as $row)
    {
        $dname_list[] = $row['name'];
    }
    echo json_encode($dname_list);
?>