@extends('layouts.app')
@section('title', 'Reserve a Table — Bombay to Britain')
@section('content')
<div class="site-container py-20 min-h-screen"
     x-data="{
       tables: [],
       selectedTable: null,
       reserved: false,
       init() {
         const zones = ['Window','Main Hall','Terrace','The Gallery','Private Nook','Chef\'s Counter'];
         const seatOpts = [2,2,2,4,4,4,6,8];
         this.tables = Array.from({length:50},(_,i)=>({
           id:i+1, num:String(i+1).padStart(2,'0'),
           seats:seatOpts[Math.floor(Math.random()*seatOpts.length)],
           zone:zones[Math.floor(Math.random()*zones.length)],
           booked:Math.random()<0.34
         }));
       },
       get availCount() { return this.tables.filter(t=>!t.booked).length; },
       get selT() { return this.tables.find(t=>t.id===this.selectedTable)||null; }
     }">
  <div>
    <div class="text-center mb-12">
      <p class="tracking-widest uppercase text-primary text-xs mb-4">Reservations</p>
      <h1 class="text-5xl font-light" style="font-family:'Cormorant Garamond',serif">Book Your Table</h1>
      <p class="text-sm font-light text-base-content/60 mt-4 max-w-md mx-auto leading-relaxed">Choose your table from tonight’s floor, then share your details.</p>
    </div>

    {{-- Confirmation --}}
    <div x-show="reserved" class="card bg-base-200 border border-primary/30 max-w-lg mx-auto text-center">
      <div class="card-body py-14">
        <h2 class="text-4xl text-primary mb-4" style="font-family:'Cormorant Garamond',serif">Thank You</h2>
        <p class="text-sm font-light text-base-content/70 leading-relaxed" x-text="selT ? 'Your request for Table '+selT.num+' ('+selT.zone+', '+selT.seats+' seats) has been received. Our maître d\'  will confirm shortly.' : 'Your request has been received. Our maître d\' will confirm your reservation shortly.'"></p>
        <div class="card-actions justify-center mt-6">
          <button @click="reserved=false;selectedTable=null" class="btn btn-outline btn-sm tracking-widest text-xs uppercase">Make another booking</button>
        </div>
      </div>
    </div>

    <div x-show="!reserved">
      {{-- Floor legend --}}
      <div class="flex items-center justify-between flex-wrap gap-4 mb-4">
        <h2 class="text-2xl font-light" style="font-family:'Cormorant Garamond',serif">Tonight’s Floor</h2>
        <div class="flex gap-4 text-xs flex-wrap">
          <span class="flex items-center gap-2"><span class="w-3 h-3 rounded bg-base-300 border border-base-content/20"></span>Available</span>
          <span class="flex items-center gap-2"><span class="w-3 h-3 rounded bg-primary"></span>Selected</span>
          <span class="flex items-center gap-2"><span class="w-3 h-3 rounded bg-base-300 opacity-30"></span>Reserved</span>
        </div>
      </div>
      <p class="text-xs text-base-content/40 mb-4"><span x-text="availCount"></span> of 50 tables available tonight</p>

      {{-- Table grid --}}
      <div class="grid grid-cols-5 sm:grid-cols-8 lg:grid-cols-10 gap-2 mb-10">
        <template x-for="t in tables" :key="t.id">
          <div @click="!t.booked && (selectedTable=t.id)"
               :class="t.booked ? 'opacity-30 cursor-not-allowed bg-base-300' : (selectedTable===t.id ? 'bg-primary text-primary-content cursor-pointer ring-2 ring-primary ring-offset-2 ring-offset-base-100' : 'bg-base-200 hover:bg-base-300 cursor-pointer')"
               class="rounded p-2 text-center transition-all">
            <div class="text-lg font-semibold leading-none" style="font-family:'Cormorant Garamond',serif" x-text="t.num"></div>
            <div class="text-[8px] opacity-60 mt-1 leading-tight" x-text="t.seats+'s'"></div>
          </div>
        </template>
      </div>

      {{-- Form --}}
      <div class="card bg-base-200 border border-base-300 max-w-2xl mx-auto">
        <div class="card-body">
          <div x-show="selectedTable" class="alert alert-info mb-4">
            <span class="text-sm" x-text="'Table '+selT?.num+' · '+selT?.zone+' · '+selT?.seats+' seats'"></span>
          </div>
          <div x-show="!selectedTable" class="text-xs text-base-content/40 mb-4">No table selected — we’ll assign the best available.</div>
          <form @submit.prevent="reserved=true">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div class="form-control">
                <label class="label"><span class="label-text tracking-widest uppercase text-xs">Full Name</span></label>
                <input name="name" type="text" placeholder="Your name" required class="input input-bordered w-full">
              </div>
              <div class="form-control">
                <label class="label"><span class="label-text tracking-widest uppercase text-xs">Phone</span></label>
                <input name="phone" type="tel" placeholder="Contact number" class="input input-bordered w-full">
              </div>
              <div class="form-control">
                <label class="label"><span class="label-text tracking-widest uppercase text-xs">Date</span></label>
                <input name="date" type="date" required class="input input-bordered w-full">
              </div>
              <div class="form-control">
                <label class="label"><span class="label-text tracking-widest uppercase text-xs">Time</span></label>
                <input name="time" type="time" required class="input input-bordered w-full">
              </div>
              <div class="form-control sm:col-span-2">
                <label class="label"><span class="label-text tracking-widest uppercase text-xs">Guests</span></label>
                <select name="guests" class="select select-bordered w-full">
                  <option>2 guests</option><option>3 guests</option><option>4 guests</option>
                  <option>5 guests</option><option>6 guests</option><option>7+ guests</option>
                </select>
              </div>
              <div class="form-control sm:col-span-2">
                <label class="label"><span class="label-text tracking-widest uppercase text-xs">Special Requests</span></label>
                <textarea name="requests" rows="3" placeholder="Anniversary, dietary needs, seating preference…" class="textarea textarea-bordered w-full"></textarea>
              </div>
            </div>
            <button type="submit" class="btn btn-primary w-full mt-6 tracking-widest text-xs uppercase">Request Reservation</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
