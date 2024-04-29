<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 10 CRUD APP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        label{
            @apply block uppercase text-slate-700 mb-2
        }

        input,textarea{
            @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
        }

        .error{
            @apply text-sm text-red-700 text-center
        }
    </style>
    {{-- blade-formatter-enable --}}
    @yield('styles')
</head>
    <div >
<body class="container mx-auto mt-10 mb-10 max-w-lg">
        <h1 class="mb-4 text-2xl">@yield('title','Official Title')</h1>
        <div>
            @if (session()-> has('success'))
                <p style="color: Green">{{ session('success')}}</p>
            @endif
        </div>
        <div class="row">
            <div>
                @yield('content')                                                                             
            </div>
        </div>
    </div>
</body>
</html>