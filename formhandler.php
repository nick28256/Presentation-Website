<?php

if ($_SERVER["REQUEST_METHOD"]== "POST") {
    $lname= $_POST["lname"];
    $fname= $_POST["fname"];
    $email= $_POST["email"];
    $number= $_POST["number"];
    $yn1= $_POST["yn1"];
    $facultate= $_POST["facultate"];
    $yn2= $_POST["yn2"];
    $asociatie= $_POST["asociatie"];

    try {
        require_once "db.con.php";

        $query = "INSERT INTO inscriere (nume, prenume, email, nr_telefon, statut_student, facultatea, voluntar, asociatia) VALUES (:lname, :fname, :email, :number, :yn1, :facultate, :yn2, :asociatie);";

        $stmt = $pdo->prepare($query);
        
        $stmt->bindParam(":lname", $lname);
        $stmt->bindParam(":fname", $fname);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":number", $number);
        $stmt->bindParam(":yn1", $yn1);
        $stmt->bindParam(":facultate", $facultate);
        $stmt->bindParam(":yn2", $yn2);
        $stmt->bindParam(":asociatie", $asociatie);

        $stmt->execute();

        $stmt=null;
        $conn=null;
        
        header("Location: submit-message.html");
        
        die();

    } catch (PDOException $e) {
       die("Error: " . $e->getMessage());
    }
} else {
    echo "Eroare la metoda de preluare date";
    /*header("Location: FormUniFEST.html");*/
}
