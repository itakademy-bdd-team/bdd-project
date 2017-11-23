<?php
if ($book->id) {
    $route = ['books/' . $book->id];
    $method = 'PUT';
} else {
    $route = ['books'];
    $method = 'POST';
}
?>
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
        {!! Form::model($book, array('url' => $route, 'method' => $method)) !!}
            <ul>
                <li>
                    {!! Form::label('isbn', 'ISBN : ') !!}
                    {!! Form::text('isbn') !!}
                    {!! $errors->first('isbn', '<small class="help-block">:message</small>') !!}
                </li>
                <li>
                    {!! Form::label('title', 'TITLE : ') !!}
                    {!! Form::text('title') !!}
                    {!! $errors->first('title', '<small class="help-block">:message</small>') !!}
                </li>
                <li>
                    {!! Form::label('author', 'AUTHOR : ') !!}
                    {!! Form::text('author') !!}
                    {!! $errors->first('author', '<small class="help-block">:message</small>') !!}
                </li>
                <li>
                    {!! Form::label('summary', 'SUMMARY : ') !!}
                    {!! Form::textarea('summary') !!}
                    {!! $errors->first('summary', '<small class="help-block">:message</small>') !!}
                </li>
                <li>
                    {!! Form::label('publisher', 'PUBLISHER : ') !!}
                    {!! Form::text('publisher') !!}
                    {!! $errors->first('publisher', '<small class="help-block">:message</small>') !!}
                </li>
                <li>
                    {!! Form::label('year', 'YEAR : ') !!}
                    {!! Form::text('year') !!}
                    {!! $errors->first('year', '<small class="help-block">:message</small>') !!}
                </li>
            </ul>
            {!! Form::submit('Sauvegarder') !!}
            {!! link_to('books', 'Annuler') !!}
        {!! Form::close() !!}
    </div>
</div>
</body>
</html>
