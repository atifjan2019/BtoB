@extends('layouts.app')
@section('title', 'Menu — Bombay to Britain')
@section('content')
<div class="page-hero">
<div class="site-container py-20">
  <div class="text-center mb-16">
    <p class="section-kicker mb-4">À la Carte</p>
    <h1 class="display-serif text-6xl font-light">The Menu</h1>
    <p class="text-sm font-light text-base-content/60 mt-4 max-w-md mx-auto leading-relaxed">A curated passage from Bombay’s streets to Britain’s dining halls.</p>
  </div>
</div>
</div>
<div class="site-container py-16 min-h-screen">
  <div class="space-y-20">
    @foreach($menu as $section)
    <section>
      <div class="flex items-center gap-4 mb-8">
        <div>
          <h2 class="display-serif text-3xl font-semibold text-primary whitespace-nowrap">{{ $section['title'] }}</h2>
          <p class="tracking-widest uppercase text-[10px] text-base-content/40 mt-1">{{ $section['note'] }}</p>
        </div>
        <div class="divider flex-1"></div>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        @foreach($section['items'] as $item)
        <article class="dish-card card h-full">
          <figure class="relative aspect-[4/3] overflow-hidden bg-base-300">
            <img src="https://images.unsplash.com/photo-{{ $item['img'] }}?fm=jpg&q=80&w=760&auto=format&fit=crop"
                 alt="{{ $item['name'] }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-700">
            <span class="absolute top-4 left-4 badge badge-sm tracking-widest uppercase text-[8px] border-0"
                  style="background-color:{{ $item['badgeColor'] }};color:#111">{{ $item['badge'] }}</span>
          </figure>
          <div class="card-body p-6">
            <div class="flex items-start justify-between gap-4">
              <h3 class="display-serif text-2xl font-semibold leading-tight">{{ $item['name'] }}</h3>
              <span class="display-serif text-2xl font-semibold text-primary whitespace-nowrap">{{ $item['price'] }}</span>
            </div>
            <p class="text-sm font-light text-base-content/60 leading-relaxed">{{ $item['desc'] }}</p>
          </div>
        </article>
        @endforeach
      </div>
    </section>
    @endforeach
    <p class="text-center text-xs text-base-content/40 tracking-wider pt-4">A discretionary 12.5% service charge applies. Please inform us of any allergies.</p>
  </div>
</div>
@endsection
