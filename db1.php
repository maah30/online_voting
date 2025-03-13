<tbody>
<?php
   
     include("session_check.php");
     include("connect.php");

     

     if (!isset($_SESSION['username'])) {
        header("Location: home.php");
        exit();
    }
    
       // Fetch the voting results from the 'candidates' table including position
       $query_candidates = "SELECT candidates.cand_name, candidates.position, IFNULL(COUNT(votes.cand_ID), 0) AS total_votes FROM candidates LEFT JOIN votes ON votes.cand_ID = candidates.cand_ID GROUP BY candidates.cand_ID";
       $result_candidates = mysqli_query($conn, $query_candidates);
   
       // Fetch the voting results from the 'candidatess' table including position
       $query_candidatess = "SELECT candidatess.cand_name, candidatess.position, IFNULL(COUNT(votes.cand_ID), 0) AS total_votes FROM candidatess LEFT JOIN votes ON votes.cand_ID = candidatess.cand_ID GROUP BY candidatess.cand_ID";
       $result_candidatess = mysqli_query($conn, $query_candidatess);
   
       // Combine the voting results from both tables
       $voting_results = mysqli_fetch_all($result_candidates, MYSQLI_ASSOC);
       $voting_results1 = mysqli_fetch_all($result_candidatess, MYSQLI_ASSOC);
   
       // Calculate total votes
       $total_votes = array_reduce($voting_results, function ($carry, $item) {
           return $carry + $item['total_votes'];
       }, 0);
   
       $total_votes1 = array_reduce($voting_results1, function ($carry, $item) {
           return $carry + $item['total_votes'];
       }, 0);

     function getTotaluser($conn)
    {
        $query = "SELECT COUNT(*) AS total_voters FROM users";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['total_voters'];
    }

    function getTotalbrgy($conn)
    {
        $query = "SELECT COUNT(*) AS total_brgy FROM candidatess";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['total_brgy'];
    }

    function getTotalsk($conn)
    {
        $query = "SELECT COUNT(*) AS total_sk FROM candidates";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['total_sk'];
    }

    function getTotalnew($conn)
    {
        $query = "SELECT COUNT(*) AS total_new FROM register";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['total_new'];
    }



        if(isset($_SESSION['username']))
         {
             $username = $_SESSION['username'];
             $query = "SELECT * FROM admin";

             $mng = mysqli_prepare($conn, $query);
             mysqli_stmt_execute($mng);
             $result = mysqli_stmt_get_result($mng);

              if(mysqli_num_rows($result) > 0)
              {
                   
              } 
              else 
              {
                  echo "<br><center><tr><p style='font-size: 20px; color: white; font-family: times new roman'; colspan='4'>No student information found.</p></tr></center>";
              }

            

              $query1 = "SELECT * FROM admin";

             $mng1 = mysqli_prepare($conn, $query1);
             mysqli_stmt_execute($mng1);
             $result1 = mysqli_stmt_get_result($mng1);

              if(mysqli_num_rows($result1) > 0)
              {
                   
              } 
              else 
              {
                  echo "<br><center><tr><p style='font-size: 20px; color: white; font-family: times new roman'; colspan='4'>No user information found.</p></tr></center>";
              }

         }
          else
           {
              header("Location: login.php");
              exit();
           }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ONLINE VOTING SYSTEM</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">



    <style>
        body
        {
            background-color: beige;  
        }

        .container 
        {
            background-color: lightcoral;
            width: 90%;
            height: 400px;
            margin: 0 auto;
            display:flex;
            border: 1px solid #ddd;
            border-color: black;
            border-radius: 8px;
            overflow: hidden;    
        }
        
        .panel 
        {
            background-color: bisque ;
            padding: 20px;
            flex: 1;
            border-right: 1px solid #ddd;    
        }
        
        .panel:last-child 
        {
            border-right:none; 
        }
        
        table 
        {
            width: 100%;
            border-collapse: collapse;
        }

        th, td 
        {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            border-color: black;
        }

        th
        {
            background-color: skyblue;
        }
        
        .options-panel 
        {
            padding: 20px;
            border-right: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
            border-radius: 8px;
            flex: 0 0 200px; 
        }
        
        .options-panel button 
        {
            display:block;
            margin-bottom: 1px;
            background-color: lightcoral;
            border: 0px solid #ddd; 
            border-radius: 5px;
            border-width: 1px;
            height: 55px;
            border-color: lightcoral;
            font-family: 'Georgia Pro Black';
            font-size: 20px;
        }
        
        .options-panel button.selected 
        {
            background-color: peachpuff ; 
            color: black;
        }
        
        .tbl_contain
        {
            width: 100%;
            display: flex;
            justify-content: center; 
            margin-top: 100px;

        }

        .sign_up
        {
            margin-top: 80px;
            position: absolute;
            right: 120px;
        }

        .add_course
        {
            margin-top: 80px;
            position: absolute;
            right: 200px;
        }

        .add_user
        {
            margin-top: 80px;
            position: absolute;
            right: 180px;
        }

        .voters
        {
            position: absolute;
            top: 240px;
            border: 1px solid;
            width: 180px;
            height: 180px;
            background-color: beige;
        }

        .voters h5
        {
            margin-top: 25px;
            margin-left: 27px;
            font-family: 'Times New Roman', Times, serif;
            font-size: 20px;
        }

        .voters p
        {
            margin-top: 35px;
            margin-left: 80px;
            font-family: 'Times New Roman', Times, serif;
            font-size: 50px;
        }
        
        .voters:hover
        {
           color: palevioletred;
        }

        .list
        {
            position: absolute;
            left: 540px;
            top: 240px;
            border: 1px solid;
            width: 180px;
            height: 180px;
            background-color: beige;
        }

        .list h5
        {
            margin-top: 25px;
            margin-left: 27px;
            font-family: 'Times New Roman', Times, serif;
            font-size: 20px;
        }

        .list p
        {
           margin-top: 35px;
            margin-left: 80px;
            font-family: 'Times New Roman', Times, serif;
            font-size: 50px;
        }

        .list:hover
        {
           color: palevioletred;
        }

        .brgy
        {
            position: absolute;
            left: 750px;
            top: 240px;
            border: 1px solid;
            width: 180px;
            height: 180px;
            background-color: beige;
        }

        .brgy h5
        {
            margin-top: 10px;
            margin-left: 10px;
            font-family: 'Times New Roman', Times, serif;
            font-size: 20px;
        }

        .brgy p
        {
            margin-top: 30px;
            margin-left: 13px;
            font-family: 'Times New Roman', Times, serif;
            font-size: 45px;
        }

        .brgy:hover
        {
           color: palevioletred;
        }

        .sk
        {
            position: absolute;
            left: 960px;
            top: 240px;
            border: 1px solid;
            width: 180px;
            height: 180px;
            background-color: beige;
        }

        .sk h5
        {
            margin-top: 8px;
            margin-left: 10px;
            font-family: 'Times New Roman', Times, serif;
            font-size: 22px;
        }

        .sk p
        {
            margin-top: 30px;
            margin-left: 13px;
            font-family: 'Times New Roman', Times, serif;
            font-size: 45px;
        }

        .sk:hover
        {
           color: palevioletred;
        }

        .scroll-table
        {
           height: 400px; /* Adjust the height as needed */
           width: 900px;
           overflow-y: auto;
        }

        .admin
        {
           height: 400px;
           width: 820px;
           overflow-y: auto;
        }

        .db
        {
           width: 820px;
        }

    </style>
</head>
<body>
<div class="tbl_contain">
    <div class="container">

        <div class="options-panel">
            <center>
            <h2 align="center" style="font-family: 'Georgia Pro Black'; font-size: 25px; color: white;"> MAIN ADMIN </h2>
            <br>
            </center>
            <button onclick="showDashboard()" id="db_btn"> DASHBOARD </button>
            <button onclick="showAdminInfo()" id="admininfo_btn"> ADMIN </button>
            <button onclick="showResults()" id="result_btn"> RESULT </button>

            <button onclick="out()" id="out_btn"> LOGOUT </button>
              
        </div>
        
    <div class="panel" id="db_panel">
        <div class="db">
    <?php
    echo "<center><p style='font-size: 30px; color: purple;'><b>WELCOME " . $_SESSION['username'] . ", GOOD DAY!</b></p></center>";
    
    echo"<a href='old_voters.php' onclick='showStudInfo()'>";
    $totaluser = getTotaluser($conn);
    echo "<div class='voters'>";
    echo "<p> $totaluser </p>";
    echo "<h5> OLD VOTERS </h5>";
    echo "</div>";
    echo"</a>";

    echo"<center>";
    echo"<a href='brgy_cand.php' onclick='showStudInfo()'>";
    $totalbrgy = getTotalbrgy($conn);
    echo "<div class='brgy'>";
    echo "<p> $totalbrgy </p>";
    echo "<h5> BRGY CANDIDATES </h5>";
    echo "</div>";
    echo"</a>";

    echo"<a href='sk_cand.php' onclick='showStudInfo()'>";
    $totalsk = getTotalsk($conn);
    echo "<div class='sk'>";
    echo "<p> $totalsk </p>";
    echo "<h5> SK CANDIDATES </h5>";
    echo "</div>";
    echo"</a>";
    echo"</center>";

    echo"<a href='new_voters.php' onclick='showStudInfo()'>";
    $totalnew = getTotalnew($conn);
    echo "<div class='list'>";
    echo "<p> $totalnew </p>";
    echo "<h5> NEW VOTERS </h5>";
    echo "</div>";
    echo"</a>";
    
    ?>
    </div>
    </div>

         
    <div class="panel" id="admininfo_panel">
   
    
   <div class = sign_up>
   <a href="add_admin.php"><input type="submit" value="ADD ADMIN"></a>
   </div>

   <div class="admin">
   <h3 align="center" style="font-family: 'times new roman'; font-size: 25px"><b><br> ADMIN ACCOUNT </b></h3>
   <table>
       <thead>
           <tr>
               <th> Admin ID </th>
               <th> Firstname </th>
               <th> Lastname </th>
               <th> Option </th>
           </tr>
       </thead>
   
   <tbody>
     <?php
       while($row1 = mysqli_fetch_assoc($result1)) 
       {
         echo "<tr>";
         echo "<td>" . $row1['admin_ID'] . "</td>";
         echo "<td>" . $row1['fname'] . "</td>";
         echo "<td>" . $row1['lname'] . "</td>";
         echo "<td>";
         echo"<a href='view_admin.php?id=" . $row1['admin_ID'] . "' class='btn btn-info'><i class='bi bi-eye' style='color: black';> </i></a>";
         echo"<a href='edit_admin.php?id=" . $row1['admin_ID'] . "' class='btn btn-info'><i class='bi bi-pen' style='color: black';> </i></a>";
         echo"<a href='dlt_admin.php?id=" . $row1['admin_ID'] . "' class='btn btn-info'><i class='bi bi-trash3' style='color: black';></i></a>";
         echo "</td>";
         echo "</tr>";
       }
      ?>               
   </tbody>
   </table>
</div>
</div>

<div class="scroll-table">
<div class="panel" id="result_panel">

    <h1>BARANGAY ELECTION RESULT</h1>
    <table>
        <thead>
            <tr>
                
                <th>Candidate Name</th>
                <th>Position</th>
                <th>Total Votes</th>
                <th>Percentage of Votes</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($voting_results1 as $result) : ?>
                <tr>
                    
                    <td><?php echo $result['cand_name']; ?></td>
                    <td><?php echo $result['position']; ?></td>
                    <td><?php echo $result['total_votes']; ?></td>
                    <td><?php echo round(($result['total_votes'] / $total_votes1) * 100, 2); ?>%</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h1>SK ELECTION RESULT</h1>
    <table>
        <thead>
            <tr>
                
                <th>Candidate Name</th>
                <th>Position</th>
                <th>Total Votes</th>
                <th>Percentage of Votes</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($voting_results as $result) : ?>
                <tr>
                    
                    <td><?php echo $result['cand_name']; ?></td>
                    <td><?php echo $result['position']; ?></td>
                    <td><?php echo $result['total_votes']; ?></td>
                    <td><?php echo round(($result['total_votes'] / $total_votes) * 100, 2); ?>%</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>

</div>

<script>
    document.getElementById("db_panel").style.display = "none";
    document.getElementById("admininfo_panel").style.display = "block";
    document.getElementById("result_panel").style.display = "none";

    function showDashboard() {
        document.getElementById("db_panel").style.display = "block";
        document.getElementById("admininfo_panel").style.display = "none";
        document.getElementById("result_panel").style.display = "none";
        document.getElementById("db_btn").classList.add("selected");
        document.getElementById("admininfo_btn").classList.remove("selected");
        document.getElementById("result_btn").classList.remove("selected");
    }

    function showAdminInfo() {
        document.getElementById("db_panel").style.display = "none";
        document.getElementById("admininfo_panel").style.display = "block";
        document.getElementById("result_panel").style.display = "none";
        document.getElementById("db_btn").classList.remove("selected");
        document.getElementById("admininfo_btn").classList.add("selected");
        document.getElementById("result_btn").classList.remove("selected");
    }

    function showResults() {
        document.getElementById("db_panel").style.display = "none";
        document.getElementById("admininfo_panel").style.display = "none";
        document.getElementById("result_panel").style.display = "block";
        document.getElementById("db_btn").classList.remove("selected");
        document.getElementById("admininfo_btn").classList.remove("selected");
        document.getElementById("result_btn").classList.add("selected");
    }

    function out() {
        window.location.href = 'logout.php';
    }
</script>


</div>    
</body>
</html>
