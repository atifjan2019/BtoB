@extends('layouts.app')
@section('title', 'Page Not Found — Bombay to Britain')
@section('content')
<section class="relative min-h-[calc(100vh-4rem)] overflow-hidden">
  <div class="absolute inset-0">
    <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?fm=jpg&q=80&w=2000&auto=format&fit=crop"
         alt="" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-black/75"></div>
  </div>

  <div class="site-container relative py-24 min-h-[calc(100vh-4rem)] flex items-center">
    <div class="max-w-3xl">
      <img src="{{ asset('assets/mark.png') }}" alt="Bombay to Britain" class="w-24 h-24 object-contain mb-8">
      <p class="section-kicker mb-5">404 · Lost Course</p>
      <h1 class="display-serif text-6xl lg:text-7xl font-light text-neutral-content mb-6">
        This table is not on tonight’s floor.
      </h1>
      <p class="text-base text-neutral-content/70 font-light leading-relaxed max-w-xl mb-10">
        The page you are looking for may have moved, or the link may be out of date. Return to the dining room, explore the menu, or place an order online.
      </p>
      <div class="flex gap-4 flex-wrap">
        <a href="{{ route('home') }}" class="btn btn-primary btn-lg tracking-widest text-xs uppercase">Back Home</a>
        <a href="{{ route('menu') }}" class="btn btn-outline btn-lg tracking-widest text-xs uppercase text-neutral-content border-neutral-content/40 hover:border-primary">View Menu</a>
        <a href="{{ route('order') }}" class="btn btn-ghost btn-lg tracking-widest text-xs uppercase text-neutral-content hover:text-primary">Order Online</a>
      </div>
    </div>
  </div>
</section>
@endsection
