<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TechSavy</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
     <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="16x16" href="images/main.png">
    <!-- Styles -->
    <style>
        html, body {
            background-image: url('images/bg.jpg');
            background-color: #ffffff;
            color: #333;
            font-family: 'Nunito', sans-serif;
            font-weight: 400;
            height: 100vh;
            margin: 0;
            position: relative;
            justify-content: center;
            align-items: center;
            background-size: cover;
        }

        .content {
            text-align: center;
        }

        .logo {
            width: 150px; /* Adjust the width as needed */
            height: auto;
        }

        .title {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #FF5733;
        }

        .links {
            margin-top: 2rem;
        }

        .links>a {
            color: #fff;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: 0.1rem;
            text-decoration: none;
            text-transform: uppercase;
            transition: background-color 0.3s, color 0.3s;
            border: 2px solid #fff; /* Orange border color */
            border-radius: 5px;
            margin: 0.5rem;
            position: relative;
            top: 250px;
        }

        .links>a:hover {
            background-color: #fb6340;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="content">
        <img class="logo" src="images/main.png" alt="TechSavy Logo" style="position: relative;
            top: 200px;"> 
        <div class="title" style="position: relative;
            top: 200px;">
            TECH SAVY
        </div>

        <div class="links">
            <a href="admin/">Admin Log In</a>
         
        </div>
    </div>
</body>

</html>
