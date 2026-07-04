@extends('layouts.app')
@section('title', 'Order Online — Bombay to Britain')
@section('content')
<div class="page-hero">
<div class="site-container py-20">
  <div class="text-center mb-14">
    <p class="section-kicker mb-4">Collection &amp; Delivery</p>
    <h1 class="display-serif text-6xl font-light">Order Online</h1>
    <p class="text-sm font-light text-base-content/60 mt-4 max-w-md mx-auto leading-relaxed">Build a quick order from the house menu. Checkout connection can be added when your payment provider is ready.</p>
  </div>
</div>
</div>

<div class="site-container py-16 min-h-screen"
     x-data="{
       cart: [],
       add(item) {
         const existing = this.cart.find(cartItem => cartItem.name === item.name);
         existing ? existing.qty++ : this.cart.push({...item, qty: 1});
       },
       remove(name) {
         this.cart = this.cart.filter(item => item.name !== name);
       },
       total() {
         return this.cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
       }
     }">

  <div class="grid grid-cols-1 xl:grid-cols-[1fr_24rem] gap-10 items-start">
    <div class="space-y-16">
      @foreach($menu as $section)
      <section>
        <div class="flex items-center gap-4 mb-8">
          <div>
            <h2 class="display-serif text-3xl font-semibold text-primary whitespace-nowrap">{{ $section['title'] }}</h2>
            <p class="tracking-widest uppercase text-[10px] text-base-content/40 mt-1">{{ $section['note'] }}</p>
          </div>
          <div class="divider flex-1"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          @foreach($section['items'] as $item)
          @php($price = (int) str_replace('£', '', $item['price']))
          <article class="dish-card card">
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
              <button type="button"
                      class="btn btn-primary btn-sm mt-3 tracking-widest text-xs uppercase"
                      @click="add({ name: @js($item['name']), price: {{ $price }} })">
                Add to Order
              </button>
            </div>
          </article>
          @endforeach
        </div>
      </section>
      @endforeach
    </div>

    <aside class="surface-panel card text-neutral-content xl:sticky xl:top-24">
      <div class="card-body p-6">
        <div class="flex items-center justify-between gap-4">
          <h2 class="display-serif text-3xl font-light">Your Order</h2>
          <span class="badge badge-primary" x-text="cart.length"></span>
        </div>
        <div class="divider my-2"></div>
        <template x-if="cart.length === 0">
          <p class="text-sm text-neutral-content/55 leading-relaxed">No items added yet.</p>
        </template>
        <div class="space-y-4" x-show="cart.length">
          <template x-for="item in cart" :key="item.name">
            <div class="flex items-start justify-between gap-4 border-b border-neutral-content/10 pb-4">
              <div>
                <p class="text-sm font-semibold" x-text="item.name"></p>
                <p class="text-xs text-neutral-content/45 mt-1" x-text="'Qty ' + item.qty"></p>
              </div>
              <div class="text-right">
                <p class="text-sm text-primary" x-text="'£' + (item.price * item.qty)"></p>
                <button type="button" class="text-[10px] uppercase tracking-widest text-neutral-content/45 hover:text-primary" @click="remove(item.name)">Remove</button>
              </div>
            </div>
          </template>
        </div>
        <div class="flex items-center justify-between pt-2 text-lg">
          <span>Total</span>
          <span class="text-primary" x-text="'£' + total()"></span>
        </div>
        <button type="button" class="btn btn-primary w-full tracking-widest text-xs uppercase" :disabled="cart.length === 0">Continue</button>
        <p class="text-[10px] text-neutral-content/35 leading-relaxed">Demo order summary only. Payment and fulfilment integration can be connected later.</p>
      </div>
    </aside>
  </div>
</div>
@endsection
