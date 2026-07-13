<!DOCTYPE html>
<html lang="en" data-theme="btob">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Admin — Bombay to Britain')</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:opsz,wght@6..96,400;6..96,500;6..96,600&family=Manrope:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script>
    (() => {
      try {
        document.documentElement.dataset.theme = localStorage.getItem('btob-theme') || 'btob';
      } catch (error) {
        document.documentElement.dataset.theme = 'btob';
      }
    })();
  </script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased admin-shell">
  <div class="min-h-screen grid grid-cols-1 lg:grid-cols-[18rem_1fr]">
    <aside class="site-chrome relative text-neutral-content border-r border-base-300 lg:min-h-screen">
      <div class="p-6 border-b border-neutral-content/10">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
          <img src="{{ asset('assets/mark.png') }}" alt="Bombay to Britain" class="w-11 h-11 object-contain">
          <div class="leading-none">
            <p class="brand-wordmark text-primary font-bold text-base">BOMBAY <em class="font-medium text-secondary">to</em> BRITAIN</p>
            <p class="text-neutral-content/40 tracking-[3px] text-[9px] uppercase mt-1">Admin</p>
          </div>
        </a>
      </div>
      <nav class="p-4">
        <ul class="menu w-full gap-1">
          <li><a class="active tracking-widest uppercase text-xs">Dashboard</a></li>
          <li><a class="tracking-widest uppercase text-xs text-neutral-content/60">Orders</a></li>
          <li><a class="tracking-widest uppercase text-xs text-neutral-content/60">Menu</a></li>
          <li><a class="tracking-widest uppercase text-xs text-neutral-content/60">Reservations</a></li>
          <li><a class="tracking-widest uppercase text-xs text-neutral-content/60">Settings</a></li>
        </ul>
      </nav>
      <div class="p-4 lg:absolute lg:bottom-0 lg:left-0 lg:w-72">
        <form method="POST" action="{{ route('admin.logout') }}">
          @csrf
          <button class="btn btn-outline btn-sm w-full tracking-widest text-xs uppercase">Logout</button>
        </form>
      </div>
    </aside>

    <main class="min-w-0">
      @yield('content')
    </main>
  </div>
  @include('components.theme-toggle')
</body>
</html>
