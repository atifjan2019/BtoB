@extends('layouts.app')
@section('title', 'Bombay to Britain — Contemporary Indian Dining')
@section('content')

<section class="home-hero">
  <div class="hero-media">
    <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?fm=jpg&q=88&w=2200&auto=format&fit=crop" alt="An intimate restaurant table set for dinner">
  </div>
  <div class="hero-overlay"></div>
  <div class="site-container hero-inner">
    <div class="hero-copy">
      <p class="eyebrow"><span></span> Contemporary Indian dining</p>
      <h1>Bombay<br>by way of<br><em>Britain.</em></h1>
      <p class="hero-lede">Old recipes, new rituals. A vibrant meeting of Indian warmth and British seasonality in the heart of Royton.</p>
      <div class="hero-actions">
        <a href="{{ route('reserve') }}" class="btn btn-primary btn-lg">Reserve a table <span>↗</span></a>
        <a href="{{ route('menu') }}" class="btn btn-quiet btn-lg">Explore the menu</a>
      </div>
    </div>
    <div class="hero-note"><span>Tonight</span><strong>Tables from 5:30pm</strong><a href="{{ route('reserve') }}">Check availability →</a></div>
  </div>
  <div class="scroll-cue">Scroll to discover <span>↓</span></div>
</section>

<section class="intro-section site-container reveal-section">
  <p class="section-number">01 / The story</p>
  <div class="intro-grid">
    <h2 class="display-serif">Two cultures.<br><em>One generous table.</em></h2>
    <div>
      <p class="intro-lead">We cook with the memory of Bombay and the produce of Britain.</p>
      <p>Our kitchen begins with family recipes: masalas ground by hand, breads pulled from the tandoor, curries given time. Then we let the British seasons have their say.</p>
      <a href="{{ route('about') }}" class="text-link">Discover our story <span>→</span></a>
    </div>
  </div>
</section>

<section class="signature-section">
  <div class="site-container section-heading-row">
    <div><p class="section-number">02 / From the kitchen</p><h2 class="display-serif">House signatures</h2></div>
    <a href="{{ route('menu') }}" class="text-link">View full menu <span>→</span></a>
  </div>
  <div class="dish-rail site-container">
    @foreach([
      ['Hyderabadi Dum Biryani','Saffron · lamb · aged basmati','1559528896-c5310744cce8','01'],
      ['Old Delhi Butter Chicken','Tomato · fenugreek · charcoal','1742599361498-79824d24e355','02'],
      ['Kashmiri Rogan Josh','Lamb · clove · red chilli','1768179669433-bd9d52949c20','03'],
    ] as [$name,$desc,$img,$num])
      <article class="signature-card">
        <figure><img src="https://images.unsplash.com/photo-{{ $img }}?fm=jpg&q=86&w=900&auto=format&fit=crop" alt="{{ $name }}"></figure>
        <div><span>{{ $num }}</span><h3>{{ $name }}</h3><p>{{ $desc }}</p></div>
      </article>
    @endforeach
  </div>
</section>

<section class="craft-section">
  <div class="craft-image"><img src="https://images.unsplash.com/photo-1601050690597-df0568f70950?fm=jpg&q=86&w=1400&auto=format&fit=crop" alt="Indian spices and freshly prepared food"></div>
  <div class="craft-copy">
    <p class="section-number">03 / Our craft</p>
    <p class="craft-quote">“Flavour has no shortcuts.”</p>
    <h2 class="display-serif">Ground daily.<br>Fired fiercely.<br><em>Served graciously.</em></h2>
    <p>Every morning begins at the masala box. Every service begins at the fire. What follows is instinct, patience and a little theatre.</p>
    <div class="craft-stats"><div><strong>28</strong><span>spices in our pantry</span></div><div><strong>450°</strong><span>inside our tandoor</span></div></div>
  </div>
</section>

<section class="visit-strip" id="visit">
  <div class="site-container visit-shell">
    <div class="visit-topline">
      <p class="section-number">04 / Come and see us</p>
      <p>Royton · Greater Manchester</p>
    </div>
    <div class="visit-main">
      <div class="visit-heading">
        <span>Dinner begins here</span>
        <h2 class="display-serif">Your table<br><em>is waiting.</em></h2>
      </div>
      <div class="visit-details">
        <div>
          <span>Find us</span>
          <p>Unit 5, Market Square<br>Royton, Oldham OL2 5QD</p>
          <a href="{{ route('contact') }}">Get directions ↗</a>
        </div>
        <div>
          <span>Opening hours</span>
          <p>Monday–Thursday · 5–11pm<br>Friday–Saturday · 12pm–midnight<br>Sunday · 12–10pm</p>
        </div>
      </div>
    </div>
    <div class="visit-action-row">
      <p>Good food. Good company.<br>Nothing rushed.</p>
      <a href="{{ route('reserve') }}" class="visit-reserve">Reserve a table <span>↗</span></a>
    </div>
  </div>
</section>
@endsection
