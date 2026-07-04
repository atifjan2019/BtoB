@extends('layouts.app')
@section('title', 'Contact — Bombay to Britain')
@section('content')
<div class="site-container py-20 min-h-screen">
  <div>
    <div class="text-center mb-16">
      <p class="tracking-widest uppercase text-primary text-xs mb-4">Visit &amp; Order</p>
      <h1 class="text-6xl font-light" style="font-family:'Cormorant Garamond',serif">Find Us</h1>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
      <div class="space-y-6">
        @foreach([
          ['Address','Unit 5, Market Square','Royton, Oldham OL2 5QD'],
          ['Reservations','07487 244 838','Daily, 10am – 11pm'],
          ['Email','reservations@btob.co.uk','We reply within the hour'],
          ['Opening Hours','10:00 AM – 11:00 PM','Every day'],
        ] as [$label,$value,$sub])
        <div class="border-b border-base-300 pb-5">
          <p class="tracking-widest uppercase text-primary text-[10px] mb-2">{{ $label }}</p>
          <p class="text-xl" style="font-family:'Cormorant Garamond',serif">{{ $value }}</p>
          <p class="text-sm text-base-content/50 mt-1">{{ $sub }}</p>
        </div>
        @endforeach
        <div class="flex gap-3 pt-2 flex-wrap">
          <a href="{{ route('reserve') }}" class="btn btn-primary tracking-widest text-xs uppercase">Book a Table</a>
          <button class="btn btn-outline tracking-widest text-xs uppercase">Order Online</button>
        </div>
      </div>
      <div class="overflow-hidden rounded-xl border border-base-300 min-h-[440px]">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2370.123456789!2d-2.1246!3d53.5648!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487ba0d5f9a3b9c7%3A0x1234567890abcdef!2sMarket%20Square%2C%20Royton%2C%20Oldham%20OL2%205QD!5e0!3m2!1sen!2suk!4v1234567890"
          width="100%" height="440" style="border:0;filter:invert(90%) hue-rotate(180deg)" allowfullscreen loading="lazy"></iframe>
      </div>
    </div>
  </div>
</div>
@endsection
