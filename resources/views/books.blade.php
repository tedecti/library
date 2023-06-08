<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <!-- text - start -->
            <div class="mb-5 md:mb-5">
                <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">Закажите у нас книгу</h2>

                <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, unde et. Doloribus culpa libero eligendi voluptas at reiciendis, ad velit, facilis est, quos in recusandae. Iure sapiente sit dolores ex.</p>
            </div>
            <form action="{{ route('search') }}" method="GET" class="flex items-center justify-center flex-col gap-4 sm:grid-cols-2">
                <div class="flex justify-center">
                    <label for="query" class="inline-block text-sm text-gray-800 sm:text-base">Поиск книг</label>
                </div>
                <div>
                    <input name="query" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                </div>
                <div class="flex items-center justify-center sm:col-span-2">
                    <button type="submit" class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">Send</button>
                </div>
            </form>
            <!-- form - end -->
        </div>
    </div>
    <div class="flex items-center justify-center gap-3">
        @foreach($books as $book)
        <p>{{ $book->name }}</p>
        @endforeach
    </div>
</body>

</html>