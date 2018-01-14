<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
    <link href="{{mix('/css/app.css')}}" rel="stylesheet" type="text/css">
    
</head>

<body >


<div id="wrapper">
    
    <div class="content-page">
        @yield('content')
    </div>
    
</div>

{{--<script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>--}}
{{--<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>--}}
{{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>--}}
{{--<script type="text/javascript" charset="utf8" src="/js/jquery.dataTables.js"></script>--}}
<script src="{{mix('/js/app.js')}}"></script>
@yield('javascript')


</body>
</html>