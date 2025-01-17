<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'My App')</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-screen flex overflow-hidden">

  <!-- Sidebar -->
  <aside class="w-64 bg-gray-800 text-white flex-shrink-0">
    <div class="p-4 border-b border-gray-700">
      <h2 class="text-2xl font-bold">My App</h2>
    </div>
    <nav class="flex-1 p-4 overflow-y-auto">
      <ul>
        <li class="mb-2">
          <a href="#" class="block p-2 rounded hover:bg-gray-700">Dashboard</a>
        </li>
        <li class="mb-2">
          <a href="#" class="block p-2 rounded hover:bg-gray-700">Profile</a>
        </li>
        <li class="mb-2">
          <a href="#" class="block p-2 rounded hover:bg-gray-700">Settings</a>
        </li>
        <li class="mb-2">
          <a href="#" class="block p-2 rounded hover:bg-gray-700">Logout</a>
        </li>
      </ul>
    </nav>
  </aside>

  <!-- Main Content -->
  <div class="flex-1 flex flex-col overflow-y-auto">
    <!-- Navbar -->
    <header class="bg-white shadow p-4 flex justify-between items-center">
      <h1 class="text-lg font-bold text-gray-800">Dashboard</h1>
      <div>
        <button class="p-2 bg-gray-200 rounded-full hover:bg-gray-300">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
          </svg>
        </button>
      </div>
    </header>
    
    <!-- Main Content Area -->
    <main class="flex-1 p-6 overflow-y-auto">
      @yield('content')
    </main>
  </div>

</body>
</html>
