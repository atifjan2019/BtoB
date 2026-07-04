@extends('layouts.app')
@section('title', 'Bombay to Britain — Fine Indian Dining')
@section('content')

{{-- HERO --}}
<div class="hero min-h-screen" style="background-image:url('https://images.unsplash.com/photo-1414235077428-338989a2e8c0?fm=jpg&q=80&w=2000&auto=format&fit=crop')">
  <div class="hero-overlay bg-black/65"></div>
  <div class="hero-content text-center text-neutral-content py-20">
    <div class="max-w-2xl">
      <img src="{{ asset('assets/mark.png') }}" alt="" class="w-28 h-28 object-contain mx-auto mb-6">
      <p class="tracking-[8px] uppercase text-primary text-xs mb-5">Est. Bombay · Reborn in London</p>
      <h1 class="text-6xl font-light mb-6" style="font-family:'Cormorant Garamond',serif">
        Two Cities.<br><em class="text-primary">One Table.</em>
      </h1>
      <p class="text-base-content/80 font-light leading-relaxed mb-10 max-w-xl mx-auto">A journey from the spice bazaars of Bombay to the grand dining rooms of Britain — timeless Indian cuisine, reimagined with quiet elegance.</p>
      <div class="flex gap-4 justify-center flex-wrap">
        <a href="{{ route('reserve') }}" class="btn btn-primary btn-lg tracking-widest text-xs uppercase">Reserve a Table</a>
        <a href="{{ route('menu') }}" class="btn btn-outline btn-lg tracking-widest text-xs uppercase">Explore Menu</a>
      </div>
    </div>
  </div>
</div>

{{-- PHILOSOPHY --}}
<section class="py-24 px-6 text-center max-w-4xl mx-auto">
  <p class="tracking-widest uppercase text-primary text-xs mb-5">Our Philosophy</p>
  <blockquote class="text-3xl font-light leading-relaxed text-base-content/90" style="font-family:'Cormorant Garamond',serif">
    “We carry the soul of Bombay’s street kitchens and the ceremony of the British table — plated as one unforgettable evening.”
  </blockquote>
  <div class="divider max-w-xs mx-auto"></div>
</section>

{{-- SIGNATURE DISHES --}}
<section class="py-10 px-6 pb-24 max-w-6xl mx-auto">
  <div class="text-center mb-16">
    <p class="tracking-widest uppercase text-primary text-xs mb-4">Signature Plates</p>
    <h2 class="text-5xl font-light" style="font-family:'Cormorant Garamond',serif">The Icons</h2>
  </div>
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    @foreach([
      ['Hyderabadi Dum Biryani','Signature','1559528896-c5310744cce8','Aged basmati layered with saffron, slow-sealed with tender lamb over dum.'],
      ['Old Delhi Butter Chicken','House Favourite','1742599361498-79824d24e355','Charred tandoori chicken folded into velvet tomato, fenugreek & cream.'],
      ['Rogan Josh','Kashmiri','1768179669433-bd9d52949c20','Slow-braised lamb shank in a fragrant Kashmiri chilli & clove gravy.'],
      ['Tandoori King Prawns','From the Fire','1742599361498-79824d24e355','Jumbo prawns marinated in ajwain & yoghurt, kissed by the clay oven.'],
    ] as [$name,$tag,$img,$desc])
    <div class="card bg-base-200 shadow-xl overflow-hidden">
      <figure class="h-56 overflow-hidden">
        <img src="https://images.unsplash.com/photo-{{ $img }}?fm=jpg&q=80&w=700&auto=format&fit=crop" alt="{{ $name }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-700">
      </figure>
      <div class="card-body p-5">
        <div class="badge badge-primary badge-sm tracking-widest uppercase text-[9px]">{{ $tag }}</div>
        <h3 class="card-title text-xl mt-2" style="font-family:'Cormorant Garamond',serif">{{ $name }}</h3>
        <p class="text-sm text-base-content/60 font-light leading-relaxed">{{ $desc }}</p>
      </div>
    </div>
    @endforeach
  </div>
</section>

{{-- HERITAGE SPLIT --}}
<section class="grid grid-cols-1 lg:grid-cols-2 border-t border-b border-base-300">
  <figure class="overflow-hidden min-h-80">
    <img src="https://images.unsplash.com/photo-1601050690597-df0568f70950?fm=jpg&q=80&w=1200&auto=format&fit=crop" alt="" class="w-full h-full object-cover">
  </figure>
  <div class="flex flex-col justify-center p-12 lg:p-20 bg-base-200">
    <p class="tracking-widest uppercase text-primary text-xs mb-4">The Craft</p>
    <h2 class="text-4xl font-light mb-6" style="font-family:'Cormorant Garamond',serif">Spice, Fire &amp; Ceremony</h2>
    <p class="text-sm font-light leading-loose text-base-content/70 mb-8">Our masalas are ground each dawn, our tandoor never sleeps, and every dish is finished by hand. What arrives at your table is a ritual generations in the making — the warmth of Bombay carried with British poise.</p>
    <div class="stats stats-horizontal bg-transparent">
      <div class="stat p-0 pr-8">
        <div class="stat-value text-primary" style="font-family:'Cormorant Garamond',serif">28</div>
        <div class="stat-desc tracking-widest uppercase text-[10px]">Hand-ground spices</div>
      </div>
      <div class="stat p-0">
        <div class="stat-value text-primary" style="font-family:'Cormorant Garamond',serif">1991</div>
        <div class="stat-desc tracking-widest uppercase text-[10px]">Family recipes since</div>
      </div>
    </div>
  </div>
</section>

{{-- CTA --}}
<section class="py-24 text-center max-w-2xl mx-auto px-6">
  <p class="tracking-widest uppercase text-primary text-xs mb-4">An Evening Awaits</p>
  <h2 class="text-5xl font-light mb-10" style="font-family:'Cormorant Garamond',serif">Join us at the table</h2>
  <div class="flex gap-4 justify-center flex-wrap">
    <a href="{{ route('reserve') }}" class="btn btn-primary btn-lg tracking-widest text-xs uppercase">Book a Table</a>
    <a href="{{ route('contact') }}" class="btn btn-outline btn-lg tracking-widest text-xs uppercase">Order Online</a>
  </div>
</section>

@endsection
