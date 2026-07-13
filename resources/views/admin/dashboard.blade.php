@extends('layouts.admin')
@section('title', 'Operations Dashboard — Bombay to Britain')
@section('content')
@php
  $hour = now()->hour;
  $greeting = $hour < 12 ? 'morning' : ($hour < 17 ? 'afternoon' : 'evening');
  $week = [['Mon', 1880], ['Tue', 2460], ['Wed', 1620], ['Thu', 2890], ['Fri', 3320], ['Sat', 3610], ['Sun', 2740]];
  $peak = max(array_column($week, 1));
  $scale = 4000;
@endphp
<div class="admin-page">
  <header class="admin-page-head">
    <div>
      <p class="admin-kicker">{{ now()->format('l, j F') }} — {{ ucfirst($greeting) }} service</p>
      <h1>Good {{ $greeting }},<br><em>chef.</em></h1>
      <p class="admin-page-sub">Here is how tonight is unfolding at Bombay to Britain.</p>
    </div>
    <div class="admin-page-actions">
      <button type="button" class="admin-button">Download report</button>
      <a href="{{ route('reserve') }}" target="_blank" class="admin-button admin-button-solid">New reservation ↗</a>
    </div>
  </header>

  <section aria-label="Tonight’s performance">
    <p class="admin-section-no">01 / Tonight at a glance</p>
    <div class="admin-metrics">
      @foreach([
        ['Revenue', '£2,840', 'up', '+12.4%', 'vs last Monday'],
        ['Orders', '48', 'up', '+8.2%', '6 preparing now'],
        ['Reservations', '62', 'up', '+5.1%', '146 guests tonight'],
        ['Average spend', '£46.20', 'up', '+3.8%', 'per guest'],
      ] as [$label, $value, $dir, $change, $note])
        <article class="admin-metric">
          <span class="admin-metric-label">{{ $label }}</span>
          <strong>{{ $value }}</strong>
          <p class="admin-metric-foot">
            <b class="is-{{ $dir }}">{{ $dir === 'up' ? '▲' : '▼' }} {{ $change }}</b>
            <span>{{ $note }}</span>
          </p>
        </article>
      @endforeach
    </div>
  </section>

  <section class="admin-columns">
    <div class="admin-card" id="orders" x-data="{ filter: 'all' }">
      <div class="admin-card-head">
        <div>
          <p class="admin-section-no">02 / Live service</p>
          <h2>Order queue</h2>
        </div>
        <div class="admin-segmented" role="group" aria-label="Filter orders">
          <button :class="filter === 'all' && 'is-active'" @click="filter = 'all'">All</button>
          <button :class="filter === 'collection' && 'is-active'" @click="filter = 'collection'">Collection</button>
          <button :class="filter === 'delivery' && 'is-active'" @click="filter = 'delivery'">Delivery</button>
        </div>
      </div>
      <div class="admin-table-wrap">
        <table class="admin-table">
          <thead><tr><th>Order</th><th>Customer</th><th>Type</th><th>Placed</th><th>Status</th><th>Total</th></tr></thead>
          <tbody>
            @foreach([
              ['#1048', 'A. Khan', 'Collection', '7 min ago', 'Preparing', '£42.00', 'preparing'],
              ['#1047', 'S. Patel', 'Delivery', '12 min ago', 'New', '£31.50', 'new'],
              ['#1046', 'M. Ali', 'Collection', '18 min ago', 'Ready', '£58.00', 'ready'],
              ['#1045', 'R. Shah', 'Delivery', '25 min ago', 'On the way', '£26.50', 'delivery'],
              ['#1044', 'J. Smith', 'Collection', '31 min ago', 'Collected', '£47.00', 'complete'],
            ] as [$order, $customer, $type, $placed, $status, $total, $state])
              <tr x-show="filter === 'all' || filter === '{{ strtolower($type) }}'">
                <td class="admin-serif">{{ $order }}</td>
                <td><strong>{{ $customer }}</strong></td>
                <td>{{ $type }}</td>
                <td class="admin-muted">{{ $placed }}</td>
                <td><span class="admin-status admin-status-{{ $state }}"><i></i>{{ $status }}</span></td>
                <td><strong>{{ $total }}</strong></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <a href="#" class="admin-card-link">View all orders <span>→</span></a>
    </div>

    <aside class="admin-card" id="reservations">
      <div class="admin-card-head">
        <div>
          <p class="admin-section-no">03 / Tonight</p>
          <h2>Next arrivals</h2>
        </div>
        <span class="admin-count">12</span>
      </div>
      <div class="admin-arrivals">
        @foreach([
          ['18:30', 'H. Ahmed', '4 guests', 'Window', 'arrived', 'Arrived'],
          ['18:45', 'L. Walker', '2 guests', 'Main room', 'confirmed', 'Confirmed'],
          ['19:00', 'P. Singh', '6 guests', 'Gallery', 'confirmed', 'Confirmed'],
          ['19:15', 'E. Jones', '2 guests', 'Best available', 'pending', 'Pending'],
        ] as [$time, $name, $guests, $table, $state, $label])
          <article>
            <time>{{ $time }}</time>
            <div><strong>{{ $name }}</strong><p>{{ $guests }} · {{ $table }}</p></div>
            <span class="admin-status admin-res-{{ $state }}"><i></i>{{ $label }}</span>
          </article>
        @endforeach
      </div>
      <a href="#" class="admin-card-link">Open floor plan <span>→</span></a>
    </aside>
  </section>

  <section class="admin-columns admin-columns-lower">
    <div class="admin-card">
      <div class="admin-card-head">
        <div>
          <p class="admin-section-no">04 / Last seven days</p>
          <h2>Revenue performance</h2>
        </div>
      </div>
      <div class="admin-chart">
        <div class="admin-chart-y" aria-hidden="true"><span>£4k</span><span>£3k</span><span>£2k</span><span>£1k</span><span>£0</span></div>
        <div class="admin-bars">
          @foreach($week as [$day, $value])
            <div class="admin-bar" tabindex="0" aria-label="{{ $day }} — £{{ number_format($value) }}">
              <i style="height:{{ round($value / $scale * 100) }}%">
                @if($value === $peak)<span class="admin-bar-peak">£{{ number_format($value) }}</span>@endif
                <span class="admin-bar-tip">£{{ number_format($value) }}</span>
              </i>
              <span class="admin-bar-day">{{ $day }}</span>
            </div>
          @endforeach
        </div>
      </div>
      <details class="admin-chart-table">
        <summary>View as table</summary>
        <table class="admin-table">
          <thead><tr><th>Day</th><th>Revenue</th></tr></thead>
          <tbody>
            @foreach($week as [$day, $value])
              <tr><td>{{ $day }}</td><td><strong>£{{ number_format($value) }}</strong></td></tr>
            @endforeach
          </tbody>
        </table>
      </details>
    </div>

    <div class="admin-card" id="menu-performance">
      <div class="admin-card-head">
        <div>
          <p class="admin-section-no">05 / Menu insights</p>
          <h2>Popular dishes</h2>
        </div>
      </div>
      <div class="admin-dishes">
        @foreach([
          ['1559528896-c5310744cce8', 'Dum Biryani', '82 sold', '£1,804'],
          ['1742599361498-79824d24e355', 'Butter Chicken', '71 sold', '£1,349'],
          ['1768179669433-bd9d52949c20', 'Rogan Josh', '46 sold', '£1,058'],
        ] as [$img, $name, $sold, $revenue])
          <article>
            <span class="admin-dish-no">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
            <img src="https://images.unsplash.com/photo-{{ $img }}?fm=jpg&q=72&w=120&h=120&fit=crop" alt="">
            <div><strong>{{ $name }}</strong><span>{{ $sold }}</span></div>
            <b>{{ $revenue }}</b>
          </article>
        @endforeach
      </div>
    </div>
  </section>

  <p class="admin-footnote">Figures shown are sample data — live order and reservation feeds are not connected yet.</p>
</div>
@endsection
