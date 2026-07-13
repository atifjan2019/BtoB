<!DOCTYPE html>
<html lang="en" data-theme="btob">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#160d08">
  <title>@yield('title', 'Admin — Bombay to Britain')</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:opsz,wght@6..96,400;6..96,500;6..96,600&family=Manrope:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script>
    (() => {
      try { document.documentElement.dataset.theme = localStorage.getItem('btob-theme') || 'btob'; }
      catch (error) { document.documentElement.dataset.theme = 'btob'; }
    })();
  </script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-body" x-data="{ menuOpen: false }">
  <p class="admin-ticker">{{ now()->format('l j F') }} &nbsp;·&nbsp; Evening service &nbsp;·&nbsp; Closes 11pm</p>

  <header class="admin-masthead">
    <div class="admin-mastrow">
      <a href="{{ route('admin.dashboard') }}" class="admin-brand">
        <img src="{{ asset('assets/mark.png') }}" alt="" width="44" height="44">
        <span class="admin-wordmark">Bombay <i>to</i> Britain</span>
        <span class="admin-brand-desk">Operations desk</span>
      </a>

      <nav class="admin-nav" aria-label="Admin navigation">
        <a href="{{ route('admin.dashboard') }}" class="is-active">Overview</a>
        <a href="#orders">Orders <b>8</b></a>
        <a href="#reservations">Reservations <b>12</b></a>
        <a href="#menu-performance">Menu</a>
        <a href="#" class="is-quiet" title="Coming soon">Reports</a>
      </nav>

      <div class="admin-mast-actions">
        <a href="{{ route('home') }}" target="_blank" class="admin-viewsite">View site&nbsp;↗</a>
        <form method="POST" action="{{ route('admin.logout') }}">
          @csrf
          <button type="submit" class="admin-signout">Sign out</button>
        </form>
        <button type="button" class="admin-menu-toggle" @click="menuOpen = !menuOpen" :aria-expanded="menuOpen" aria-label="Toggle navigation">
          <span></span><span></span>
        </button>
      </div>
    </div>

    <nav class="admin-mobile-panel" x-show="menuOpen" x-cloak @click.outside="menuOpen = false" aria-label="Admin navigation (mobile)">
      <a href="{{ route('admin.dashboard') }}">Overview <span>01</span></a>
      <a href="#orders" @click="menuOpen = false">Orders <span>02</span></a>
      <a href="#reservations" @click="menuOpen = false">Reservations <span>03</span></a>
      <a href="#menu-performance" @click="menuOpen = false">Menu <span>04</span></a>
      <div class="admin-mobile-foot">
        <a href="{{ route('home') }}" target="_blank">View site ↗</a>
        <form method="POST" action="{{ route('admin.logout') }}">
          @csrf
          <button type="submit">Sign out →</button>
        </form>
      </div>
    </nav>
  </header>

  <main class="admin-main">@yield('content')</main>

  <footer class="admin-colophon">
    <span>Bombay to Britain — Operations</span>
    <span>Unit 5, Market Square, Royton</span>
    <span>{{ now()->format('Y') }}</span>
  </footer>
</body>
</html>
