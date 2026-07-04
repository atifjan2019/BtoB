@extends('layouts.app')
@section('title', 'Gallery — Bombay to Britain')
@section('content')
<div class="py-20 px-6 min-h-screen">
  <div class="text-center mb-16">
    <p class="tracking-widest uppercase text-primary text-xs mb-4">A Look Inside</p>
    <h1 class="text-6xl font-light" style="font-family:'Cormorant Garamond',serif">Gallery</h1>
  </div>
  <div class="max-w-6xl mx-auto grid grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach([
      ['1559528896-c5310744cce8','Signature dish','col-span-2 row-span-2',1000,600],
      ['1414235077428-338989a2e8c0','Dining room','',900,300],
      ['1601050690597-df0568f70950','Spices','',700,300],
      ['1768179669433-bd9d52949c20','Curry','',500,300],
      ['1742599361498-79824d24e355','Plated dish','',900,300],
      ['1504674900247-0877df9cc836','Spread','',700,300],
      ['1517248135467-4c7edcad34c4','Ambience','col-span-2',1200,300],
    ] as [$img,$label,$span,$w,$h])
    <div class="{{ $span }} overflow-hidden rounded-lg border border-base-300 group" style="height:{{ $h }}px">
      <img src="https://images.unsplash.com/photo-{{ $img }}?fm=jpg&q=80&w={{ $w }}&auto=format&fit=crop"
           alt="{{ $label }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
    </div>
    @endforeach
  </div>
</div>
@endsection
