<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Gestion Stagiaire')</title>
  @vite('resources/css/app.css')
</head>
<body>
<header class="flex justify-between items-center w-full px-4 py-2">
  <div class="flex items-center gap-1 px-4 py-2 cursor-pointer" onclick="window.location.href='{{ route('home') }}'">
    <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        stroke="currentColor"
        class="w-6 h-6"
    >
      <path
          stroke-linecap="round"
          stroke-linejoin="round"
          d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"
      />
    </svg>
    <span class="text-lg font-semibold">Filière</span>
  </div>
  <div class="flex items-center gap-1">
    <button
        type="button"
        class="px-5 py-1.5 text-base border rounded font-bold uppercase border-black hover:bg-gradient-to-r from-red-600 to-red-800 hover:text-white hover:border-none"
    >
      sing up
    </button>
    <button
        type="button"
        class="px-5 py-1.5 text-base border rounded font-bold uppercase text-white bg-gradient-to-r from-red-600 to-red-800 border-red-800"
    >
      log in
    </button>
  </div>
</header>

@yield('content')

</body>
</html>