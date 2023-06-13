<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="p-5">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Пользователь
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Роль
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Редактировать
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Удалить
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($get as $user)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$user->fio}}
                    </th>
                    <td class="px-6 py-4">
                        {{$user->email}}
                    </td>
                    <td class="px-6 py-4">
                        {{$user->name}}
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                    <td class="px-6 py-4">
                        <form action="{{route('destroy', $user->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-block btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</body>

</html>