@extends('layouts.app')
@section('title', 'About — Bombay to Britain')
@section('content')
<div class="page-hero">
  <div class="site-container py-20">
    <div class="text-center">
      <p class="section-kicker mb-4">Our Story</p>
      <h1 class="display-serif text-6xl font-light">From Bombay, With Love</h1>
    </div>
  </div>
</div>
<div class="about-page site-container py-16 min-h-screen">
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-20">
    <figure class="dish-card overflow-hidden">
      <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?fm=jpg&q=80&w=1100&auto=format&fit=crop" alt="" class="w-full h-[460px] object-cover">
    </figure>
    <div class="surface-panel p-8 lg:p-10">
      <p class="display-serif text-3xl font-light italic text-primary leading-relaxed mb-6">It began at a single stall near Crawford Market, where a family sold spiced kebabs to weary travellers.</p>
      <p class="text-sm font-light leading-loose text-base-content/70 mb-4">Three generations later, that same fire crossed oceans. We brought our grandmother’s masala box to Britain and set a table where two worlds meet.</p>
      <p class="text-sm font-light leading-loose text-base-content/70">Every plate we serve is a passage across that distance: familiar yet transformed, humble yet refined.</p>
    </div>
  </div>
  <div>
    <div class="divider"></div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 pt-8">
      @foreach([
        ['01','Sourced with Care','Spices from single-origin farms, seafood landed daily, produce chosen at dawn.'],
        ['02','Cooked by Hand','No shortcuts — every masala ground fresh, every curry tended over open flame.'],
        ['03','Served with Grace','The warmth of a Bombay home, delivered with the poise of a British dining room.'],
      ] as [$num,$title,$text])
      <div class="surface-panel card p-8 text-center">
        <p class="display-serif text-4xl text-primary mb-3">{{ $num }}</p>
        <h3 class="display-serif text-2xl font-semibold mb-3">{{ $title }}</h3>
        <p class="text-sm font-light text-base-content/60 leading-relaxed">{{ $text }}</p>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
