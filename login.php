<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Student Management</title>


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .heading {
            width: 100%;
            /* height: 100px; */
            background-color: green;
            font-size: 48px;
            color: white;
            text-align: center;
            padding: 20px;

        }

        #school {
            font-size: 48px;
            color: deeppink;
            text-align: center;
            padding: 20px;
            font-family: sans-serif;
            font-weight: 700;
        }


        /* --------------login form ----  */
        .login {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 400px;
            grid-gap: 20px;
            margin: 20px;

        }

        .image {
            width: 100%;
            height: 100%;

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }

        .right {
            background-color: rgb(189, 211, 218);
            border-radius: 20px;
        }

        #form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-top: 10%;


        }

        #form input {

            padding: 12px 20px;
            margin: 10px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 5px;
        }

        #submit:hover {
            background-color: teal;
            color: black;
            border-radius: 5px;
        }

        .login_head {
            width: 80%;
            margin: auto;
            margin-top: 20px;
            font-size: 38px;
            background-color: green;
            color: white;
            text-align: center;
            padding: 10px;
            border-radius: 20px;
        }


        /* --------------student form -------------- */

        table,
        td,
        th {
            border: 1px solid #ddd;
            text-align: left;

        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin: auto;
            margin-top: 50px;


        }

        th,
        td {
            padding: 15px;
            text-align: center;
        }

        tr>th {
            background-color: teal;
            color: white;
        }

        .studentData {
            width: 100%;
            background-color: green;
            padding: 15px;

        }

        #form1 {
            margin: auto;
            width: 80%;

        }

        #form1 input {
            padding: 10px;
            margin-right: 15px;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 5px;
        }

        #form1 input:focus {
            outline: none;
        }

        .td6 {
            display: flex;
            align-items: center;
            justify-content: center;


        }

        .td6>button {
            margin-right: 10px;
            color: white;
            border-radius: 5px;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }

        .td6>button:nth-child(1) {
            background-color: green;
        }

        .td6>button:nth-child(2) {
            background-color: red;
        }

        #absent {
            background-color: red;
        }
    </style>


</head>
<body>

    

    <div class="heading">
        <h1>Attendance Management System</h1>
    </div>
    <h1 id="school">Delta Computer Science College, Rangpur </h1>

    <div class="login">
        <div class="image">
            <img src="./assets/img/delta.jpg" alt="">
        </div>
        <div class="right">
            <h2 class="login_head">Teacher login </h2>
  
            <form action="./action/loginAction.php" id="form" method="POST">

                <input type="text" id="name" name="username" placeholder="username">
                <input type="password" id="password"  name="password" placeholder="Password">

                <input type="submit" class="btn btn-warning" id="submit" value="Submit" name="log">

            </form>

        </div>
    </div>




    <script src="assets/js/student.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>
</html>