@include('layouts.app')
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>List of books</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                   {{  $book['title'] }}
                </div>
                <ul>
                    <li><b>ISBN :</b> {{  $book['isbn'] }}</li>
                    <li><b>AUTHOR :</b> {{  $book['author'] }}</li>
                    <li><b>SUMMARY :</b> {{  $book['summary'] }}</li>
                    <li><b>PUBLISHER :</b> {{  $book['publisher'] }}</li>
                    <li><b>YEAR :</b> {{  $book['year'] }}</li>
                    <li><b>CREATED AT :</b> {{  $book['created_at'] }}</li>
                    <li><b>UPDATED AT :</b> {{  $book['updated_at'] }}</li>
                </ul>

            </div>
        </div>
    </body>
</html>
