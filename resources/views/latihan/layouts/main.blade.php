<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Selamat datang di @yield('title')</title>
    <style>
        nav {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        nav .header {
            height: 75px;
            width: 100%;
            background-color: blueviolet;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        nav .header a {
            text-decoration: none;
            color: white;
            font-size: 23px;

        }

        button {
            background-color: rgb(90, 90, 232);
            margin: 10px 0;
            border: 1px solid rgb(90, 90, 232);
            height: 25px;
            border-radius: 4px;
        }


        button a {
            text-decoration: none;
            color: white;
        }

        input {
            width: 250px;
        }

        table {
            width: 95%;
            margin: auto;
            text-align: center;
        }

        table a {
            display: inline-block;
            color: white;
            width: 4rem;
            height: 15px;
            text-align: center;
            text-decoration: none;
            background-color: blueviolet;
        }

        .mt-10 {
            margin-top: 10px;
        }

        .mb-10 {
            margin-buttom: 10px;
        }

        .between {
            display: flex;
            justify-content: space-between;
        }

        .table {
            width: 65%;
            margin: auto;
        }

        .notif {
            background-color: rgb(81, 242, 6);
            width: 25%;
            height: 20px;
            text-align: center;
            line-height: 20px;
            border-radius: 4px;
        }

        .error {
            background-color: rgb(225, 73, 73);
            margin-top: 10px;
            width: 25%;
            height: 20px;
            text-align: center;
            line-height: 20px;
            border-radius: 4px;
        }

        .danger {
            background-color: rgb(245, 63, 63);
            color: white;
        }

        table,
        tr,
        th,
        td {
            border: 1px solid black;
            padding: 5px;
        }


        {{--  Media Queri  --}} {{--  Laptop  --}} @media (max-width: 1366px) {
            html {
                font-size: 75%;
            }
        }

        {{--  Tablet  --}} @media (max-width: 768px) {
            html {
                font-size: 62.5%;
            }
        }

        {{--  Mobile Phone  --}} @media (max-width: 450px) {
            html {
                font-size: 55%;
            }
        }
    </style>
</head>

<body>


    <nav>

        <div class="header">
            <a href="/home">Home</a>
            <a href="/students">students</a>
            <a href="/class">Class</a>
            <a href="/ekstracullicurars">Ekstracurricular</a>
            <a href="/teachers">Teacher</a>
        </div>

    </nav>

    @yield('content')

</body>

</html>
