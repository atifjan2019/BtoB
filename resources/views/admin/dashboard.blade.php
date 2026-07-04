@extends('layouts.admin')
@section('title', 'Admin Dashboard — Bombay to Britain')
@section('content')
<div class="p-6 lg:p-10">
  <header class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
    <div>
      <p class="section-kicker mb-3">Backend</p>
      <h1 class="display-serif text-5xl font-light">Dashboard</h1>
    </div>
    <a href="{{ route('home') }}" class="btn btn-outline btn-sm tracking-widest text-xs uppercase">View Website</a>
  </header>

  <section class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 mb-8">
    @foreach([
      ['Today’s Orders','18','Awaiting checkout integration'],
      ['Reservations','12','Tonight’s table requests'],
      ['Menu Items','17','Across all sections'],
      ['Revenue','£642','Demo total'],
    ] as [$label,$value,$note])
    <div class="surface-panel card">
      <div class="card-body p-6">
        <p class="tracking-widest uppercase text-primary text-[10px]">{{ $label }}</p>
        <p class="display-serif text-4xl font-light">{{ $value }}</p>
        <p class="text-sm text-base-content/50">{{ $note }}</p>
      </div>
    </div>
    @endforeach
  </section>

  <section class="grid grid-cols-1 xl:grid-cols-[1fr_22rem] gap-6">
    <div class="surface-panel card">
      <div class="card-body p-6">
        <div class="flex items-center justify-between gap-4 mb-4">
          <h2 class="display-serif text-3xl font-light">Recent Orders</h2>
          <span class="badge badge-primary tracking-widest uppercase text-[10px]">Demo</span>
        </div>
        <div class="overflow-x-auto">
          <table class="table">
            <thead>
              <tr>
                <th>Order</th>
                <th>Customer</th>
                <th>Status</th>
                <th class="text-right">Total</th>
              </tr>
            </thead>
            <tbody>
              @foreach([
                ['#1024','A. Khan','Preparing','£42'],
                ['#1023','S. Patel','Pending','£31'],
                ['#1022','M. Ali','Ready','£58'],
                ['#1021','R. Shah','Collected','£26'],
              ] as [$order,$customer,$status,$total])
              <tr>
                <td class="font-semibold">{{ $order }}</td>
                <td>{{ $customer }}</td>
                <td><span class="badge badge-outline badge-sm">{{ $status }}</span></td>
                <td class="text-right text-primary">{{ $total }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="surface-panel card text-neutral-content">
      <div class="card-body p-6">
        <h2 class="display-serif text-3xl font-light">Admin Notes</h2>
        <div class="space-y-4 text-sm text-neutral-content/60 leading-relaxed">
          <p>Passcode access is enabled for this prototype.</p>
          <p>Current passcode: <span class="text-primary font-semibold">123</span></p>
          <p>Next step is connecting persistent orders, menu editing, and a real authentication provider.</p>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
