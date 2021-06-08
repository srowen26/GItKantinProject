<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
@foreach ($menu as $menu)
<p>{{$menu->id}}</p>
<p>{{$menu->list[0]}}</p>
@endforeach
</body>


</html>
