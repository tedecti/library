<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>
    <div>
        @auth('admin')
        <a href="{{ url('/home') }}" class="px-4 py-2">
            {{ auth('admin')->user()->fio ?? 'Admin' }}
        </a>
        <a href="{{ route('logout') }}" class="px-4 py-2">Выйти</a>
        @elseauth('user')
        <a href="{{ url('/home') }}" class="px-4 py-2">
            {{ auth('user')->user()->fio ?? 'Guest' }}
        </a>
        <a href="{{ route('logout') }}" class="px-4 py-2">Выйти</a>
        @else
        <a href="{{ route('signin') }}" class="px-4 py-2">Вход</a>
        @endauth
    </div>
    <div class="mx-5 my-5">
        @foreach($users as $user)
        <p>{{ $user->id }}. {{$user->fio}}</p>
        @endforeach
    </div>
</body>

</html>