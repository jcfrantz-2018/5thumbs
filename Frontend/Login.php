<?php

require_once '../Backend/common.php';

?>

<?php

// $T_dollars = new T_DollarsDAO;
// $Leaderboard = $T_dollars->getUsername_T_Dollars();


// $userObj = new UserDAO;
// $Fullname = $userObj->getFullName('alice');

// echo $Fullname;
// echo '<br>';
// print_r($Leaderboard);

?>



<html>
<head>
    <title> BIOS </title>

    <style>
        html * {
            font-family: Arial !important;
        }

        p {
            font-size: 20px;
        }

        table {
            border-collapse: collapse;
            border: solid 2px #ccc;
            font-size: 18px;
        }

        table td {
            padding: 10px;
        }

        .submit {
            height: 30px;
            width: 65px;
            font-size: 16px;
        }

        #submitrow {
            background-color: rgb(235, 235, 235);
        }
    </style>

</head>
<body>

<h1>BIOS</h1>
    <hr>
    <br>
    <div id='standard'>
    <p align=center> <b>Login</b> </p>
    <form action='Login_process.php' method='POST'>
        <table align=center>
            <tr>
                <td>Username: </td>
                <td><input type='text' name='username'></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type='password' name='password'></td>
            </tr>
            <tr>
                <td colspan=2 align=center id=submitrow>
                <input type='submit' class=submit value='Login'>
                </td>
            </tr>
        </table>
        <br>
        
    </form></div>
</body>
</html>

<?php
    printErrors();
?>