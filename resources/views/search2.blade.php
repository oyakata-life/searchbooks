<!DOCTYPE html>

<head lang="{{ app()->getLocale() }}">
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
        /*https://love-wave.com/css-waku/*/
        /* スマート　囲み枠　2 */
        .kakomi-smart2 {
            position: relative;
            margin: 2em auto;
            padding: 3em 1em .8em;
            width: 80%;
            /* ボックス幅 */
            border-style: solid;
            border-width: 5px 0 0 0;
            border-color: #907b6e;
            /* 枠の色 */
            background-color: #ede4cd;
            /* 背景色 */
            color: #666;
            /* テキスト色 */
            box-shadow: 0 0 3px #999;
            /* 影の色 */
        }

        .title-smart2 {
            position: absolute;
            top: 8px;
            left: 15px;
            background-color: #ede4cd;
            /* タイトル背景色 */
            color: #907b6e;
            /* タイトル色 */
            font-size: 1.1em;
            font-weight: bold;
            border-style: none none double;
            border-color: #907b6e;
            /*タイトル下線 */
            border-width: 3px;
        }
    </style>
</head>

<body>

    <div class="col-sm-4" style="padding:20px 0; padding-left:0px;">
        <form class="form-inline" action="{{url('/search')}}">
            <div class="form-group">
                <input type="text" name="keyword" value="{{$keyword}}" class="form-control" placeholder="名前を入力してください">
            </div>
            <input type="submit" value="検索" class="btn btn-info">
        </form>
    </div>

    <ul>
        @foreach($posts as $post)
        <div class="kakomi-smart2">
            @if(isset( $post['volumeInfo']['imageLinks']['thumbnail'] ))
            <img src="{{$post['volumeInfo']['imageLinks']['thumbnail']}}">
            @endif
            <span class="title-smart2">{{$post['volumeInfo']['title']}}</span>
            @if(isset( $post['volumeInfo']['description'] ))
            {{$post['volumeInfo']['description']}}
            @endif

        </div>
        @endforeach
    </ul>

</body>

</html>