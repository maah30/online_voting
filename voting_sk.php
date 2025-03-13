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
            font-size: 45px;
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

    <form action="submit_vote_sk.php" method="post">

    <div class="brgy_voting">
    <h1  style="position: absolute; left: 40px; top: 10px;">Sangguniang Kabataan Election </h1>
    <h4 style="position: absolute; right: 130px; top: 25;">( 15-30 of age can vote )</h4>
    <img src="7.jpg" alt="">
    <h4 style="position: absolute; left: 90px; top: 110px;"> SK CHAIRMAN ( Select only one Candidate ) :</h4>
       
        <p style="position:absolute;  top: 170px; left: 190px;" ><input type="checkbox" name="candidate[]" value="11"> 11 - ISABEL JUNGOY <br></p>
        <p style="position:absolute;  top: 170px; left: 520px" ><input type="checkbox" name="candidate[]" value="12"> 12 - KIENH VINH NGUYEN <br></p>

        <h4 style="position: absolute; left: 90px; top: 215px;"> SK KAGAWAD ( You can Select multiple Candidate ) :</h4>

        <p style="position:absolute; top: 280px; left: 190px" ><input type="checkbox" name="candidate[]" value="13"> 13 - JHON DAYOC <br></p>
        <p style="position:absolute; top: 320px; left: 190px" ><input type="checkbox" name="candidate[]" value="14"> 14 - KEITH CONCEPCION <br></p>
        <p style="position:absolute; top: 360px; left: 190px" ><input type="checkbox" name="candidate[]" value="15"> 15 - SELLORIA DANSELL <br></p>
        <p style="position:absolute; top: 440px; left: 190px" ><input type="checkbox" name="candidate[]" value="16"> 16 - JEAN PORTICOS <br></p>
        <p style="position:absolute; top: 400px; left: 190px" ><input type="checkbox" name="candidate[]" value="17"> 17 - JESSA LEGASPI <br></p>
        <p style="position:absolute; top: 280px; left: 520px" ><input type="checkbox" name="candidate[]" value="18"> 18 - TIFFANY MONTERDE <br></p>
        <p style="position:absolute; top: 320px; left: 520px" ><input type="checkbox" name="candidate[]" value="19"> 19 - TRISHA AVENIDO <br></p>
        <p style="position:absolute; top: 360px; left: 520px" ><input type="checkbox" name="candidate[]" value="20"> 20 - PAUL XANDER SELMA <br></p>
        <p style="position:absolute; top: 400px; left: 520px" ><input type="checkbox" name="candidate[]" value="21"> 21 - NASHRIA USO <br></p>
        </div>

    <table border = 0 style="background-color: transparent; height: 250px; width: 270; position:absolute; right: 110px; border-radius: 10px; top: 385px;">
        <tr>
        <td align = "center"><br><input type="submit" value=" SUBMIT VOTE " style="width: 180px; height: 50px; background-color: transparent; border-radius: 15px; font-family:'georgia pro black'; font-size: 20px; color: white;"></b></></td>
        </tr>
    </table>

    </form>
    


</body>
</html>
