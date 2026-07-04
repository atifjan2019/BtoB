@extends('layouts.app')
@section('title', 'Private Events — Bombay to Britain')
@section('content')
<div class="page-hero">
<div class="site-container py-20">
  <div class="text-center">
    <p class="section-kicker mb-4">Private Dining &amp; Catering</p>
    <h1 class="display-serif text-6xl font-light">Occasions, Elevated</h1>
    <p class="text-sm font-light text-base-content/60 mt-4 max-w-md mx-auto leading-relaxed">From intimate celebrations to grand receptions, our team crafts bespoke experiences with the same care we bring to every plate.</p>
  </div>
</div>
</div>
<div class="site-container py-16 min-h-screen">
  <div>
    <figure class="dish-card overflow-hidden mb-16">
      <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?fm=jpg&q=80&w=1600&auto=format&fit=crop" alt="" class="w-full h-80 object-cover">
    </figure>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      @foreach([
        ['Up to 20 guests','The Private Room','From £65 pp','An intimate dining room with a dedicated maître d’, bespoke menu and curated wine pairing.'],
        ['Up to 80 guests','Full Restaurant','On request','Exclusive hire of the entire space for receptions, launches and grand celebrations.'],
        ['Anywhere','Bespoke Catering','On request','Our kitchen brought to your venue — from canapé receptions to seated banquets.'],
      ] as [$kicker,$title,$price,$text])
      <div class="surface-panel card">
        <div class="card-body">
          <p class="tracking-widest uppercase text-primary text-[10px]">{{ $kicker }}</p>
          <h3 class="display-serif card-title text-2xl mt-1">{{ $title }}</h3>
          <p class="display-serif text-xl text-secondary">{{ $price }}</p>
          <p class="text-sm font-light text-base-content/60 leading-relaxed">{{ $text }}</p>
        </div>
      </div>
      @endforeach
    </div>
    <div class="text-center mt-16">
      <a href="{{ route('contact') }}" class="btn btn-primary btn-lg tracking-widest text-xs uppercase">Enquire About Your Event</a>
    </div>
  </div>
</div>
@endsection
