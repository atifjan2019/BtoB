@extends('layouts.app')
@section('title', 'Admin Login — Bombay to Britain')
@section('content')
<div class="site-container py-24 min-h-screen flex items-center justify-center">
  <div class="surface-panel card w-full max-w-md">
    <div class="card-body p-8">
      <div class="text-center mb-4">
        <p class="section-kicker mb-4">Backend Access</p>
        <h1 class="display-serif text-5xl font-light">Admin Login</h1>
      </div>

      <form method="POST" action="{{ route('admin.authenticate') }}" class="space-y-5">
        @csrf
        <div class="form-control">
          <label class="label"><span class="label-text tracking-widest uppercase text-xs">Passcode</span></label>
          <input name="passcode" type="password" inputmode="numeric" autofocus required class="input input-bordered w-full" placeholder="Enter passcode">
          @error('passcode')
            <p class="text-error text-xs mt-2">{{ $message }}</p>
          @enderror
        </div>
        <button class="btn btn-primary w-full tracking-widest text-xs uppercase">Login</button>
      </form>
    </div>
  </div>
</div>
@endsection
