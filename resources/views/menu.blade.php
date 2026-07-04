@extends('layouts.app')
@section('title', 'Menu — Bombay to Britain')
@section('content')
<div class="py-20 px-6 min-h-screen">
  <div class="text-center mb-16">
    <p class="tracking-widest uppercase text-primary text-xs mb-4">À la Carte</p>
    <h1 class="text-6xl font-light" style="font-family:'Cormorant Garamond',serif">The Menu</h1>
    <p class="text-sm font-light text-base-content/60 mt-4 max-w-md mx-auto leading-relaxed">A curated passage from Bombay’s streets to Britain’s dining halls.</p>
  </div>
  <div class="max-w-3xl mx-auto space-y-16">
    @foreach($menu as $section)
    <div>
      <div class="flex items-center gap-4 mb-8">
        <h2 class="text-3xl font-semibold text-primary whitespace-nowrap" style="font-family:'Cormorant Garamond',serif">{{ $section['title'] }}</h2>
        <div class="divider flex-1"></div>
        <span class="tracking-widest uppercase text-[10px] text-base-content/40">{{ $section['note'] }}</span>
      </div>
      <div class="space-y-2">
        @foreach($section['items'] as $item)
        <div class="flex items-center gap-4 py-4 border-b border-base-300">
          <img src="https://images.unsplash.com/photo-{{ $item['img'] }}?fm=jpg&q=80&w=240&auto=format&fit=crop"
               alt="{{ $item['name'] }}" class="w-20 h-20 flex-shrink-0 object-cover rounded-lg border border-base-300">
          <div class="flex-1">
            <div class="flex items-center gap-2 flex-wrap">
              <span class="text-xl font-semibold" style="font-family:'Cormorant Garamond',serif">{{ $item['name'] }}</span>
              <span class="badge badge-sm badge-outline tracking-widest text-[8px] uppercase" style="border-color:{{ $item['badgeColor'] }};color:{{ $item['badgeColor'] }}">{{ $item['badge'] }}</span>
            </div>
            <p class="text-xs font-light text-base-content/60 mt-1 leading-relaxed">{{ $item['desc'] }}</p>
          </div>
          <span class="text-xl font-semibold text-primary whitespace-nowrap" style="font-family:'Cormorant Garamond',serif">{{ $item['price'] }}</span>
        </div>
        @endforeach
      </div>
    </div>
    @endforeach
    <p class="text-center text-xs text-base-content/40 tracking-wider pt-4">A discretionary 12.5% service charge applies. Please inform us of any allergies.</p>
  </div>
</div>
@endsection
