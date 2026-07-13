<!DOCTYPE html>
<html lang="en" data-theme="btob">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Bombay to Britain — contemporary Indian dining in Royton, Oldham.">
  <meta name="theme-color" content="#170f19">
  <title>@yield('title', 'Bombay to Britain — Contemporary Indian Dining')</title>
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
<body class="font-sans antialiased">
  <header class="site-header" x-data="{ open: false, scrolled: false }" x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 24, { passive: true })" :class="{ 'is-scrolled': scrolled }">
    <a href="#main-content" class="skip-link">Skip to content</a>
    <div class="announcement"><span class="announcement-star">✦</span> Bombay energy. British produce. Royton nights. <span class="announcement-star">✦</span></div>
    <nav class="site-container nav-shell" aria-label="Main navigation">
      <a href="{{ route('home') }}" class="nav-brand" aria-label="Bombay to Britain home">
        <img src="{{ asset('assets/mark.png') }}" alt="" width="56" height="56">
        <span><strong>Bombay</strong><i>to</i><strong>Britain</strong></span>
      </a>
      <div class="nav-links">
        @foreach([['Menu','menu'],['Our Story','about'],['Gallery','gallery'],['Private Dining','events'],['Visit','contact']] as [$label,$r])
          <a href="{{ route($r) }}" class="{{ request()->routeIs($r) ? 'is-active' : '' }}">{{ $label }}</a>
        @endforeach
      </div>
      <div class="nav-actions">
        <a href="{{ route('order') }}" class="nav-order">Order online</a>
        <a href="{{ route('reserve') }}" class="btn btn-primary btn-sm">Reserve</a>
        <button class="nav-toggle" type="button" @click="open = !open" :aria-expanded="open" aria-label="Toggle navigation">
          <span></span><span></span>
        </button>
      </div>
    </nav>
    <div class="mobile-panel" x-show="open" x-cloak x-transition.opacity @click.outside="open = false">
      <nav aria-label="Mobile navigation">
        @foreach([['Home','home'],['Menu','menu'],['Order Online','order'],['Our Story','about'],['Gallery','gallery'],['Private Dining','events'],['Visit Us','contact']] as [$label,$r])
          <a href="{{ route($r) }}" @click="open = false"><span>0{{ $loop->iteration }}</span>{{ $label }}</a>
        @endforeach
        <a href="{{ route('reserve') }}" class="mobile-reserve">Reserve a table <span>↗</span></a>
      </nav>
    </div>
  </header>

  <main id="main-content">@yield('content')</main>

  <footer class="site-footer">
    <div class="footer-marquee" aria-hidden="true">Bombay soul <span>✦</span> British poise <span>✦</span> One table</div>
    <div class="site-container footer-grid">
      <div class="footer-brand">
        <img src="{{ asset('assets/mark.png') }}" alt="" width="72" height="72">
        <h2>Come hungry.<br><em>Leave transported.</em></h2>
        <a href="{{ route('reserve') }}" class="text-link">Reserve your table <span>↗</span></a>
      </div>
      <div class="footer-column">
        <p class="footer-label">Find us</p>
        <address>Unit 5, Market Square<br>Royton, Oldham<br>OL2 5QD</address>
        <a href="tel:07487244838">07487 244 838</a>
      </div>
      <div class="footer-column">
        <p class="footer-label">Opening hours</p>
        <p>Mon–Thu <span>5–11pm</span></p>
        <p>Fri–Sat <span>12pm–midnight</span></p>
        <p>Sunday <span>12–10pm</span></p>
      </div>
      <div class="footer-column">
        <p class="footer-label">Follow along</p>
        <a href="#">Instagram ↗</a>
        <a href="#">Facebook ↗</a>
        <a href="mailto:reservations@btob.co.uk">Email us ↗</a>
      </div>
    </div>
    <div class="site-container footer-bottom">
      <p>© {{ date('Y') }} Bombay to Britain</p>
      <p>Indian heritage, served in Britain.</p>
      <a href="{{ route('admin.login') }}">Admin</a>
    </div>
  </footer>
  @include('components.theme-toggle')
</body>
</html>
