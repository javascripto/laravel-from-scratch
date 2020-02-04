<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="/about">About</a>
    <a href="/tasks">Tasks</a>
    <h1><?= $title; ?></h1>
    <h2><?= $subtitle; ?></h2>
    <a href="<?= $link ?>"><?= $video; ?></a>


    <h3>Watched Videos:</h3>
    <ul>
    @foreach ($watched as $w_video)
        <li>
        @if ($w_video == $video)
            <a href="{{ $link }}">{{ $video }}</a>
        @else
            {{ $w_video }}
        @endif
        </li>  
    @endforeach
    </ul>


</body>
</html>