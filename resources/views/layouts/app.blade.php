<!DOCTYPE html>
<html lang="en" data-theme="btob">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Bombay to Britain — Fine Indian Dining')</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
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
<body class="font-sans antialiased">

<!-- NAVBAR -->
<div class="site-chrome fixed top-0 z-50 w-full border-b border-base-300 transition-all duration-300"
     x-data="{ scrolled: false }"
     :class="scrolled ? 'shadow-lg' : ''"
     x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 40, { passive:true })">
  <div class="navbar site-container">

  <!-- Logo -->
  <div class="navbar-start">
    <a href="{{ route('home') }}" class="flex items-center">
      <img src="{{ asset('assets/mark.png') }}" alt="Bombay to Britain" class="w-11 h-11 object-contain">
    </a>
  </div>

  <!-- Desktop links -->
  <div class="navbar-center hidden lg:flex">
    <ul class="menu menu-horizontal gap-1 p-0">
      @foreach([['Home','home'],['Menu','menu'],['Order Online','order'],['About','about'],['Gallery','gallery'],['Private Events','events'],['Contact','contact']] as [$label,$r])
      <li>
        <a href="{{ route($r) }}" class="tracking-widest text-[11px] uppercase font-medium {{ request()->routeIs($r) ? 'text-primary border-b border-primary rounded-none' : 'text-base-content/70 hover:text-primary' }}">{{ $label }}</a>
      </li>
      @endforeach
    </ul>
  </div>

  <!-- Book a Table + mobile -->
  <div class="navbar-end gap-2">
    <a href="{{ route('reserve') }}" class="btn btn-primary btn-sm hidden sm:inline-flex tracking-widest text-[11px] uppercase">Book a Table</a>
    <div class="dropdown dropdown-end lg:hidden">
      <label tabindex="0" class="btn btn-ghost btn-circle">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/></svg>
      </label>
      <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-50 p-2 shadow-xl bg-base-200 border border-base-300 rounded-box w-56">
        @foreach([['Home','home'],['Menu','menu'],['Order Online','order'],['About','about'],['Gallery','gallery'],['Private Events','events'],['Contact','contact']] as [$label,$r])
        <li><a href="{{ route($r) }}" class="{{ request()->routeIs($r) ? 'active' : '' }} tracking-widest text-xs uppercase">{{ $label }}</a></li>
        @endforeach
        <div class="divider my-1"></div>
        <li><a href="{{ route('reserve') }}" class="btn btn-primary btn-sm tracking-widest text-xs uppercase">Book a Table</a></li>
      </ul>
    </div>
  </div>
  </div>
</div>

<!-- PAGE CONTENT -->
<main class="pt-16">
  @yield('content')
</main>

<!-- FOOTER -->
<footer class="bg-neutral text-neutral-content">

  {{-- Gold top accent line --}}
  <div class="h-px bg-gradient-to-r from-transparent via-primary to-transparent"></div>

  {{-- Main footer body --}}
  <div class="site-container py-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">

    {{-- Brand block --}}
    <div class="lg:col-span-1 flex flex-col gap-5">
      <div class="flex items-center gap-3">
        <img src="{{ asset('assets/mark.png') }}" alt="Bombay to Britain" class="w-12 h-12 object-contain">
        <div class="flex flex-col leading-none">
        <span class="brand-wordmark text-primary font-bold text-lg">BOMBAY <em class="font-medium text-secondary">to</em> BRITAIN</span>
          <span class="text-neutral-content/40 tracking-[4px] text-[9px] uppercase mt-1">Fine Indian Dining</span>
        </div>
      </div>
      <p class="text-sm text-neutral-content/55 leading-relaxed max-w-xs">Timeless Indian cuisine — carried from the spice markets of Bombay to the grand tables of Britain.</p>
      <a href="{{ route('reserve') }}" class="btn btn-primary btn-sm w-fit tracking-widest text-xs uppercase">Book a Table</a>
    </div>

    {{-- Navigation --}}
    <div>
      <h3 class="text-xs tracking-[3px] uppercase text-primary font-semibold mb-5">Explore</h3>
      <ul class="space-y-3">
        @foreach([['Home','home'],['Menu','menu'],['Order Online','order'],['About','about'],['Gallery','gallery'],['Private Events','events'],['Contact','contact']] as [$label,$r])
        <li><a href="{{ route($r) }}" class="text-sm text-neutral-content/60 hover:text-primary transition-colors">{{ $label }}</a></li>
        @endforeach
      </ul>
    </div>

    {{-- Hours --}}
    <div>
      <h3 class="text-xs tracking-[3px] uppercase text-primary font-semibold mb-5">Opening Hours</h3>
      <ul class="space-y-2 text-sm text-neutral-content/60">
        <li class="flex justify-between gap-4"><span>Mon – Thu</span><span>5pm – 11pm</span></li>
        <li class="flex justify-between gap-4"><span>Fri – Sat</span><span>12pm – 12am</span></li>
        <li class="flex justify-between gap-4"><span>Sunday</span><span>12pm – 10pm</span></li>
      </ul>
      <div class="h-px bg-neutral-content/10 my-6"></div>
      <h3 class="text-xs tracking-[3px] uppercase text-primary font-semibold mb-5">Connect</h3>
      <ul class="space-y-2 text-sm text-neutral-content/60">
        <li><span class="hover:text-primary transition-colors cursor-pointer">Instagram</span></li>
        <li><span class="hover:text-primary transition-colors cursor-pointer">Facebook</span></li>
      </ul>
    </div>

    {{-- Contact --}}
    <div>
      <h3 class="text-xs tracking-[3px] uppercase text-primary font-semibold mb-5">Visit Us</h3>
      <address class="not-italic space-y-3 text-sm text-neutral-content/60">
        <p class="leading-relaxed">Unit 5, Market Square<br>Royton, Oldham OL2 5QD</p>
        <p><a href="tel:07487244838" class="hover:text-primary transition-colors">07487 244 838</a></p>
        <p><a href="mailto:reservations@btob.co.uk" class="hover:text-primary transition-colors">reservations@btob.co.uk</a></p>
        <p class="text-neutral-content/40 text-xs">Daily · 10:00 AM – 11:00 PM</p>
      </address>
    </div>

  </div>

  {{-- Gold divider --}}
  <div class="site-container">
    <div class="h-px bg-gradient-to-r from-transparent via-primary/40 to-transparent"></div>
  </div>

  {{-- Bottom bar --}}
  <div class="site-container py-6 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-neutral-content/35">
    <p>© {{ date('Y') }} Mumbai Dining (UK) Ltd · Trading as Bombay to Britain. All rights reserved.</p>
    <p>A discretionary 12.5% service charge applies to all tables.</p>
  </div>

</footer>

@include('components.theme-toggle')

</body>
</html>
