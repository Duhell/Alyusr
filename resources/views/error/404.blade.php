<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alyusr</title>
    <style>
        * {
            font-family: sans-serif;
            color: rgba(0, 0, 0, 0.75);
        }

        body {
            margin: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100vh;
            padding: 0px 30px;
            background: #ddd;
        }

        .wrapper {
            max-width: 960px;
            width: 100%;
            margin: 30px auto;
            transform: scale(0.8);
        }

        .landing-page {
            max-width: 960px;
            height: 475px;
            margin: 0;
            box-shadow: 0px 0px 8px 1px #ccc;
            background: #fafafa;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }


        h1 {
            font-size: 48px;
            margin: 0;
        }

        p {
            font-size: 16px;
            width: 35%;
            margin: 16px auto 24px;
            text-align: center;
        }

        a {
            border-radius: 50px;
            padding: 8px 24px;
            font-size: 16px;
            cursor: pointer;
            background: #62AD9B;
            color: #fff;
            border: none;
            box-shadow: 0 4px 8px 0 #ccc;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="landing-page">
            <div style="max-width: 400px; height: auto;" class="icon__download">
                <img style="width: 100%; height: 100%; object-fit: cover;" src="{{ asset('images/alyusr-logo.png') }}" alt="">
            </div>

            <h1> 404 </h1>
            <p> This page is under maintenance or has been removed!</p>
            <a href="/">Back to home</a>
        </div>
    </div>

</body>

</html>
