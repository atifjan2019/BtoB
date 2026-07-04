<!DOCTYPE html>
<html lang="en" data-theme="btob">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Bombay to Britain — Fine Indian Dining')</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans">

<!-- NAVBAR -->
<div class="navbar fixed top-0 z-50 px-6 lg:px-10 border-b border-base-300 transition-all duration-300"
     x-data="{ scrolled: false }"
     :class="scrolled ? 'bg-base-100/95 backdrop-blur-sm shadow-lg' : 'bg-base-100/40 backdrop-blur-sm'"
     x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 40, { passive:true })">

  <!-- Logo -->
  <div class="navbar-start">
    <a href="{{ route('home') }}" class="flex items-center gap-3">
      <img src="{{ asset('assets/mark.png') }}" alt="Bombay to Britain" class="w-11 h-11 object-contain">
      <div class="flex flex-col leading-none">
        <span class="text-primary font-bold tracking-widest text-lg whitespace-nowrap" style="font-family:'Cormorant Garamond',serif">BOMBAY <em class="font-medium text-secondary">to</em> BRITAIN</span>
        <span class="text-base-content/50 tracking-[4px] text-[9px] uppercase mt-1">Fine Indian Dining</span>
      </div>
    </a>
  </div>

  <!-- Desktop links -->
  <div class="navbar-center hidden lg:flex">
    <ul class="menu menu-horizontal gap-1 p-0">
      @foreach([['Home','home'],['Menu','menu'],['About','about'],['Gallery','gallery'],['Private Events','events'],['Contact','contact']] as [$label,$r])
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
        @foreach([['Home','home'],['Menu','menu'],['About','about'],['Gallery','gallery'],['Private Events','events'],['Contact','contact']] as [$label,$r])
        <li><a href="{{ route($r) }}" class="{{ request()->routeIs($r) ? 'active' : '' }} tracking-widest text-xs uppercase">{{ $label }}</a></li>
        @endforeach
        <div class="divider my-1"></div>
        <li><a href="{{ route('reserve') }}" class="btn btn-primary btn-sm tracking-widest text-xs uppercase">Book a Table</a></li>
      </ul>
    </div>
  </div>
</div>

<!-- PAGE CONTENT -->
<main class="pt-16">
  @yield('content')
</main>

<!-- FOOTER -->
<footer class="footer p-10 bg-neutral text-neutral-content border-t border-base-300">
  <aside>
    <img src="{{ asset('assets/mark.png') }}" alt="" class="w-10 h-10 object-contain">
    <p class="text-primary font-bold tracking-widest text-lg" style="font-family:'Cormorant Garamond',serif">Bombay <em>to</em> Britain</p>
    <p class="text-sm opacity-60 max-w-xs leading-relaxed">Timeless Indian cuisine, from the spice markets of Bombay to the grand tables of Britain.</p>
  </aside>
  <nav>
    <h6 class="footer-title tracking-widest text-xs">Explore</h6>
    @foreach([['Home','home'],['Menu','menu'],['About','about'],['Gallery','gallery'],['Private Events','events'],['Contact','contact']] as [$label,$r])
    <a href="{{ route($r) }}" class="link link-hover text-sm">{{ $label }}</a>
    @endforeach
  </nav>
  <nav>
    <h6 class="footer-title tracking-widest text-xs">Hours</h6>
    <p class="text-sm opacity-70">Mon – Thu · 5pm – 11pm</p>
    <p class="text-sm opacity-70">Fri – Sat · 12pm – 12am</p>
    <p class="text-sm opacity-70">Sunday · 12pm – 10pm</p>
  </nav>
  <nav>
    <h6 class="footer-title tracking-widest text-xs">Connect</h6>
    <span class="link link-hover text-sm">Instagram</span>
    <span class="link link-hover text-sm">Facebook</span>
    <span class="link link-hover text-sm">reservations@btob.co.uk</span>
  </nav>
</footer>
<div class="footer footer-center p-4 bg-base-300 text-base-content/40 text-xs">
  <p>© {{ date('Y') }} Bombay to Britain. All rights reserved. &nbsp;·&nbsp; Crafted with fire &amp; spice.</p>
</div>

</body>
</html>
