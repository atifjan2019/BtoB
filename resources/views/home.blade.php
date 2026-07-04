@extends('layouts.app')
@section('title', 'Bombay to Britain — Fine Indian Dining')
@section('content')

{{-- HERO --}}
<section class="home-hero relative overflow-hidden">
  <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?fm=jpg&q=80&w=2200&auto=format&fit=crop"
       alt="" class="home-hero-image">
  <div class="home-hero-scrim"></div>

  <div class="site-container home-hero-content relative z-10">
    <div class="home-hero-copy">
      <p class="section-kicker mb-5">Bombay spice · British ceremony</p>
      <h1 class="display-serif home-hero-title font-light">
        Fine Indian dining, made for unhurried evenings.
      </h1>
      <p class="home-hero-text">
        Fire-led plates, hand-ground masalas and old family recipes, served with the polish of a modern dining room.
      </p>
      <div class="home-hero-actions">
        <a href="{{ route('reserve') }}" class="btn btn-primary btn-lg">Book a Table</a>
        <a href="{{ route('order') }}" class="btn btn-outline btn-lg">Order Online</a>
      </div>
    </div>

    <div class="home-hero-meta" aria-label="Restaurant highlights">
      <div>
        <span>Open Daily</span>
        <strong>10am - 11pm</strong>
      </div>
      <div>
        <span>Kitchen</span>
        <strong>Tandoor &amp; Dum</strong>
      </div>
      <div>
        <span>Location</span>
        <strong>Royton, Oldham</strong>
      </div>
    </div>
  </div>
</section>

{{-- PHILOSOPHY --}}
<section class="site-container py-24 text-center">
  <div class="max-w-4xl mx-auto">
  <p class="section-kicker mb-5">Our Philosophy</p>
  <blockquote class="display-serif text-3xl lg:text-4xl font-light leading-relaxed text-base-content/90">
    “The soul of Bombay’s street kitchens, plated with the restraint and rhythm of a modern British dining room.”
  </blockquote>
  <div class="divider max-w-xs mx-auto"></div>
  </div>
</section>

{{-- SIGNATURE DISHES --}}
<section class="site-container py-10 pb-24">
  <div class="text-center mb-16">
    <p class="section-kicker mb-4">Signature Plates</p>
    <h2 class="display-serif text-5xl font-light">The Icons</h2>
  </div>
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    @foreach([
      ['Hyderabadi Dum Biryani','Signature','1559528896-c5310744cce8','Aged basmati layered with saffron, slow-sealed with tender lamb over dum.'],
      ['Old Delhi Butter Chicken','House Favourite','1742599361498-79824d24e355','Charred tandoori chicken folded into velvet tomato, fenugreek & cream.'],
      ['Rogan Josh','Kashmiri','1768179669433-bd9d52949c20','Slow-braised lamb shank in a fragrant Kashmiri chilli & clove gravy.'],
      ['Tandoori King Prawns','From the Fire','1742599361498-79824d24e355','Jumbo prawns marinated in ajwain & yoghurt, kissed by the clay oven.'],
    ] as [$name,$tag,$img,$desc])
    <div class="dish-card card h-full">
      <figure class="relative h-56 overflow-hidden">
        <img src="https://images.unsplash.com/photo-{{ $img }}?fm=jpg&q=80&w=700&auto=format&fit=crop" alt="{{ $name }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-700">
      </figure>
      <div class="card-body p-5">
        <div class="badge badge-primary badge-sm tracking-widest uppercase text-[9px]">{{ $tag }}</div>
        <h3 class="display-serif card-title text-2xl mt-2">{{ $name }}</h3>
        <p class="text-sm text-base-content/60 font-light leading-relaxed">{{ $desc }}</p>
      </div>
    </div>
    @endforeach
  </div>
</section>

{{-- HERITAGE SPLIT --}}
<section class="border-t border-b border-base-300">
  <div class="site-container grid grid-cols-1 lg:grid-cols-2 py-10">
  <figure class="overflow-hidden min-h-80">
    <img src="https://images.unsplash.com/photo-1601050690597-df0568f70950?fm=jpg&q=80&w=1200&auto=format&fit=crop" alt="" class="w-full h-full object-cover">
  </figure>
  <div class="surface-panel flex flex-col justify-center p-8 lg:p-16">
    <p class="section-kicker mb-4">The Craft</p>
    <h2 class="display-serif text-4xl font-light mb-6">Spice, Fire &amp; Ceremony</h2>
    <p class="text-sm font-light leading-loose text-base-content/70 mb-8">Our masalas are ground each dawn, our tandoor never sleeps, and every dish is finished by hand. What arrives at your table is a ritual generations in the making — the warmth of Bombay carried with British poise.</p>
    <div class="stats stats-horizontal bg-transparent">
      <div class="stat p-0 pr-8">
        <div class="display-serif stat-value text-primary">28</div>
        <div class="stat-desc tracking-widest uppercase text-[10px]">Hand-ground spices</div>
      </div>
      <div class="stat p-0">
        <div class="display-serif stat-value text-primary">1991</div>
        <div class="stat-desc tracking-widest uppercase text-[10px]">Family recipes since</div>
      </div>
    </div>
  </div>
  </div>
</section>

{{-- CTA --}}
<section class="site-container py-24 text-center">
  <div class="max-w-2xl mx-auto">
  <p class="section-kicker mb-4">An Evening Awaits</p>
  <h2 class="display-serif text-5xl font-light mb-10">Join us at the table</h2>
  <div class="flex gap-4 justify-center flex-wrap">
    <a href="{{ route('reserve') }}" class="btn btn-primary btn-lg tracking-widest text-xs uppercase">Book a Table</a>
    <a href="{{ route('order') }}" class="btn btn-outline btn-lg tracking-widest text-xs uppercase">Order Online</a>
  </div>
  </div>
</section>

@endsection
