<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        ul li {
            width: 500px;
            border-bottom: 1px solid #aaa;
            margin: 3px 0px 3px 0px;
        }

        ul li img {
            float: left;
            margin-right: 8px;
        }

        ul li p {
            padding: 15px 0px 15px 0px;
        }
    </style>
</head>

<body>
    <ul>
        @foreach($posts as $post)
        <li>
            @if(isset( $post['volumeInfo']['imageLinks']['thumbnail'] ))
            <img src="{{$post['volumeInfo']['imageLinks']['thumbnail']}}">
            @endif
            <p>{{$post['volumeInfo']['title']}}</p>
        </li>
        @endforeach
    </ul>

</body>

</html>