<?php
include("connect.php");

if (isset($_GET['id'])) 
{
    $id = $_GET['id'];


    mysqli_begin_transaction($conn);

    try {
        
        $query = "SELECT * FROM register WHERE voter_ID = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) 
        {
            $row = mysqli_fetch_assoc($result);

     
            if (!empty($row['voter_ID']) && !empty($row['firstname']) && !empty($row['lastname']) && !empty($row['age']) && !empty($row['email']) && !empty($row['address'])) 
            {

                $insertQuery = "INSERT INTO users (voters_ID, fname, lname, age, email, address, profile_picture) VALUES (?, ?, ?, ?,?,?,?)";
                $insertStmt = mysqli_prepare($conn, $insertQuery);
                mysqli_stmt_bind_param($insertStmt, "issssss", $row['voter_ID'], $row['firstname'], $row['lastname'], $row['age'], $row['email'], $row['address'], $row['profile_picture']);
                mysqli_stmt_execute($insertStmt);

                $deleteQuery = "DELETE FROM register WHERE voter_ID = ?";
                $deleteStmt = mysqli_prepare($conn, $deleteQuery);
                mysqli_stmt_bind_param($deleteStmt, "i", $id);
                mysqli_stmt_execute($deleteStmt);
                mysqli_commit($conn);

                header("Location: db.php");
                exit();
            } 
            else 
            {
                throw new Exception("Voter details are incomplete or invalid.");
            }
        } 
        else
        {
            throw new Exception("No voter found with the provided ID.");
        }
    } 
    catch (Exception $e) 
    {
        mysqli_rollback($conn);
        echo "Error occurred: " . $e->getMessage();
    }
} 
else 
{
    echo "No voter ID provided.";
}
?>
