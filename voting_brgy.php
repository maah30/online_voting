
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONLINE VOTING SYSTEM</title>
</head>
<body>

    <style>

       body 
        {
            background-color: #7469B6;
        }

        .brgy_voting h1
        {
            font-family: Georgia pro black;
            font-size: 50px;
        }

        .brgy_voting h4
        {
            font-family: 'Times New Roman', Times, serif;
            font-size: 22px;
            color: beige;
        }

        .brgy_voting p
        {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 22px;
            color: black;
        }

        .brgy_voting img
        {
            position: absolute;
            top: 210px;
            right: 0px;
            width: 900px;
        }

    </style>
    <br>

    <form action="submit_vote_brgy.php" method="post">

    <div class="brgy_voting">
    <h1  style="position: absolute; left: 40px; top: 10px;">Barangay Election</h1>
    <h4 style="position: absolute; right: 450px; top: 35px;">( 18 above can vote )</h4>
    <img src="7.jpg" alt="">
    <h4 style="position: absolute; left: 90px; top: 110px;"> BARANGAY CHAIRMAN ( Select only one Candidate ) :</h4>
       
        <p style="position:absolute;  top: 170px; left: 190px;" ><input type="checkbox" name="candidate[]" value="1"> 1 - JUSTINE CANONES <br></p>
        <p style="position:absolute;  top: 170px; left: 520px" ><input type="checkbox" name="candidate[]" value="2"> 2 - BRUCE RUFINO <br></p>

        <h4 style="position: absolute; left: 90px; top: 215px;"> BARANGAY KAGAWAD ( You can Select multiple Candidate ) :</h4>

        <p style="position:absolute; top: 280px; left: 190px" ><input type="checkbox" name="candidate[]" value="3"> 3 - SHERNAN WASQUIN <br></p>
        <p style="position:absolute; top: 320px; left: 190px" ><input type="checkbox" name="candidate[]" value="4"> 4 - NICOLE GABUCAN <br></p>
        <p style="position:absolute; top: 360px; left: 190px" ><input type="checkbox" name="candidate[]" value="5"> 5 - MARK RIVERA <br></p>
        <p style="position:absolute; top: 440px; left: 190px" ><input type="checkbox" name="candidate[]" value="6"> 6 - APRIL REY BUHIAN <br></p>
        <p style="position:absolute; top: 400px; left: 190px" ><input type="checkbox" name="candidate[]" value="7"> 7 - HUMAIDA AMPASO <br></p>
        <p style="position:absolute; top: 280px; left: 520px" ><input type="checkbox" name="candidate[]" value="8"> 8 - PETER CAITONA <br></p>
        <p style="position:absolute; top: 320px; left: 520px" ><input type="checkbox" name="candidate[]" value="9"> 9 - TRISIA NICHOLE MOLINA <br></p>
        <p style="position:absolute; top: 360px; left: 520px" ><input type="checkbox" name="candidate[]" value="10"> 10 - CRISTILLE MAE ALBURO <br></p>
        <p style="position:absolute; top: 400px; left: 520px" ><input type="checkbox" name="candidate[]" value="11"> 11 - NADJMAH PASCAN <br></p>
        </div>

    <table border = 0 style="background-color: transparent; height: 250px; width: 270; position:absolute; right: 110px; border-radius: 10px; top: 385px;">
        <tr>
        <td align = "center"><br><input type="submit" value=" SUBMIT VOTE " style="width: 180px; height: 50px; background-color: transparent; border-radius: 15px; font-family:'georgia pro black'; font-size: 20px; color: white;"></b></></td>
        </tr>
    </table>

    </form>


</body>
</html>
