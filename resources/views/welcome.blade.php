<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="antialiased">

    <header class="w-full h-16 bg-indigo-600 drop-shadow-lg">
        <div class="container px-4 md:px-0 h-full mx-auto flex justify-between items-center">
            <!-- Logo Here -->
            <a class="text-yellow-400 text-xl font-bold italic" href="/">Substan<span
                    class="text-white">tive</span></a>

            <!-- Menu links here -->
            <ul id="menu"
                class="hidden fixed top-0 right-0 px-10 py-16 bg-gray-800 z-50
                    md:relative md:flex md:p-0 md:bg-transparent md:flex-row md:space-x-6">

                <li class="md:hidden z-90 fixed top-4 right-6">
                    <a href="javascript:void(0)" class="text-right text-white text-4xl"
                        onclick="toggleMenu()">&times;</a>
                </li>

                <li>
                    <a class="text-white opacity-70 hover:opacity-100 duration-300" href="#">Home</a>
                </li>
                <li>
                    <a class="text-white opacity-70 hover:opacity-100 duration-300" href="#">Something</a>
                </li>
                <li>
                    <a class="text-white opacity-70 hover:opacity-100 duration-300" href="#">Forums</a>
                </li>

                <li>
                    <a class="text-white opacity-70 hover:opacity-100 duration-300" href="#">About</a>
                </li>
                <li>
                    <a class="text-white opacity-70 hover:opacity-100 duration-300" href="#">Contact</a>
                </li>
            </ul>

            <!-- This is used to open the menu on mobile devices -->
            <div class="flex items-center md:hidden">
                <button class="text-white text-4xl font-bold opacity-70 hover:opacity-100 duration-300"
                    onclick="toggleMenu()">
                    &#9776;
                </button>
            </div>

    </header>

    <main>
        <a class="mt-4 flex justify-center text-2xl hover:text-blue-400 text-center"
            href="https://www.substantiveresearch.com">substantiveresearch.com</a>
    </main>

    <div class="flex flex-col mt-4">
        <div>
            <form>
                @csrf
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:p b-4 flex justify-center">
                    <div>
                        <input name="search" type="text" value="{{ request()->search ?? '' }}"
                            class="w- bg-gray-100 p-2 mt-2 mb-3" placeholder="Search For Task" required />
                        <button type="submit"
                            class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-700 mr-2"><i
                                class="fas fa-plus"></i> Search </button>
                    </div>
                </div>
            </form>

        </div>
        <div class="py-2 my-2 flex justify-center">
            @if (session()->has('message'))
                <h4 class="text-green-600 flex justify-center mb-4"> {{ session()->get('message') }} </h4>
            @endif

            <div class="inline-block w-2/3 align-middle border-b border-gray-100 shadow sm:rounded-lg">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th
                                class="text-center border-r text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-100 bg-gray-50">
                                Sector ID</th>

                            <th
                                class="py-3 text-center border-r text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-100 bg-gray-50">
                                Sector Name </th>
                            <th
                                class="py-3 text-center border-r text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-100 bg-gray-50">
                                Date </th>
                            <th
                                class="border-r text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-100 bg-gray-50">
                                Interactions % </th>
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        @foreach ($clients as $client)
                            <tr class="even:bg-gray-200 hover:bg-gray-300">

                                <td class="border-r whitespace-no-wrap border-b text-center border-gray-100">
                                    <div class="text-sm leading-5 text-gray-500">
                                        {{ $client->sector_id ?? '' }}
                                    </div>
                                </td>

                                <td class="border-r whitespace-no-wrap border-b text-center border-gray-100">
                                    <div class="text-sm leading-5 text-gray-500">
                                        {{ $client->name ?? '' }}
                                    </div>
                                </td>

                                <td class=" border-r whitespace-no-wrap border-b text-center border-gray-100">
                                    <div class="text-sm leading-5 text-gray-500">
                                        {{ date('d/m/Y', strtotime($client->date)) ?? '' }}
                                    </div>
                                </td>

                                <td class="border-r whitespace-no-wrap border-b text-center border-gray-100">
                                    <div class="text-sm leading-5 text-gray-500">
                                        {{ round($client->percent, 0) ?? '' }} %
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>


            <div class="col-12 mt-10">
                <div class="text-center">
                    <ul class="">
                        {{-- {{ $tasks->links() }} --}}
                    </ul>
                </div>
            </div>

        </div>

    </div>

    <!-- Javascript Code -->
    <script>
        var menu = document.getElementById('menu');

        function toggleMenu() {
            menu.classList.toggle('hidden');
            menu.classList.toggle('w-full');
            menu.classList.toggle('h-screen');
        }
    </script>

</body>

</html>
