<?php
session_start();
include("connect.php");

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Fetch the voting results from the 'candidates' table
$query_candidates = "SELECT cand_name, COUNT(*) as total_votes FROM votes JOIN candidates ON votes.cand_ID = candidates.cand_ID GROUP BY votes.cand_ID";
$result_candidates = mysqli_query($conn, $query_candidates);

// Fetch the voting results from the 'candidatess' table
$query_candidatess = "SELECT cand_name, COUNT(*) as total_votes FROM votes JOIN candidatess ON votes.cand_ID = candidatess.cand_ID GROUP BY votes.cand_ID";
$result_candidatess = mysqli_query($conn, $query_candidatess);

// Combine the voting results from both tables
$voting_results = array_merge(mysqli_fetch_all($result_candidates, MYSQLI_ASSOC));
$voting_results1 = array_merge(mysqli_fetch_all($result_candidatess, MYSQLI_ASSOC));

// Calculate total votes
$total_votes = array_reduce($voting_results, function ($carry, $item) {
    return $carry + $item['total_votes'];
}, 0);

$total_votes1 = array_reduce($voting_results1, function ($carry, $item) {
    return $carry + $item['total_votes'];
}, 0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONLINE VOTING SYSTEM</title>
    <!-- Add any necessary CSS or Bootstrap -->
</head>
<body>
    <h1>Voting Results</h1>
    <table>
        <thead>
            <tr>
                <th>Candidate Name</th>
                <th>Total Votes</th>
                <th>Percentage of Votes</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($voting_results as $result) : ?>
                <tr>
                    <td><?php echo $result['cand_name']; ?></td>
                    <td><?php echo $result['total_votes']; ?></td>
                    <td><?php echo round(($result['total_votes'] / $total_votes) * 100, 2); ?>%</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p>Total Votes: <?php echo $total_votes; ?></p>

    <h1>Voting Results</h1>
    <table>
        <thead>
            <tr>
                <th>Candidate Name</th>
                <th>Total Votes</th>
                <th>Percentage of Votes</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($voting_results1 as $result) : ?>
                <tr>
                    <td><?php echo $result['cand_name']; ?></td>
                    <td><?php echo $result['total_votes']; ?></td>
                    <td><?php echo round(($result['total_votes'] / $total_votes) * 100, 2); ?>%</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p>Total Votes: <?php echo $total_votes; ?></p>

</body>
</html>
