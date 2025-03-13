<?php
require 'connect.php';
session_start();


date_default_timezone_set('Asia/Manila');


if (!isset($_SESSION['user_id'])) 
{
    http_response_code(401);
    echo 'User not authenticated';
    exit;
}

$userId = $_SESSION['user_id'];

function isUserEligibleToVote($pdo, $userId) 
{
    $stmt = $pdo->prepare('SELECT age FROM users WHERE voters_ID = :voters_ID');
    $stmt->execute(['voters_ID' => $userId]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user) 
    {
        $age = $user['age'];
        return $age >= 15 && $age <= 30; 
    }
    return false;
}


if (!isUserEligibleToVote($pdo, $userId)) 
{
    http_response_code(403);
    header("Location: sk_age.php");
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    if (isset($_POST['candidate']) && is_array($_POST['candidate']) && count($_POST['candidate']) > 0)
     {
        $candidates = array_filter($_POST['candidate'], 'is_numeric'); 

        if (count($candidates) === 0) 
        {
            http_response_code(400);
            echo 'Invalid candidate selection';
            exit;
        }

        try 
        {
            $pdo->beginTransaction();
            $timestamp = date('Y-m-d H:i:s'); 

            $stmt = $pdo->prepare('INSERT INTO votes (voter_id, cand_ID, vote_timestamp) VALUES (:voter_id, :candidate, :vote_timestamp)');

            foreach ($candidates as $candidate) 
            {
                $stmt->execute([
                    'voter_id' => $userId, 
                    'candidate' => $candidate, 
                    'vote_timestamp' => $timestamp
                ]);
            }

            $pdo->commit();
            http_response_code(200);
            header("Location: success.php");
            exit;

        } 
        catch (Exception $e) 
        {
            $pdo->rollBack();
            http_response_code(500);    
            echo 'Failed to submit votes. Please try again later.';
            error_log('Failed to submit votes: ' . $e->getMessage());
        }
    } 
    else 
    {
        http_response_code(400);
        header("Location: no_slctsk.php");
    }
} 
else
 {
    http_response_code(405);
    echo 'Method not allowed';
}
?>
