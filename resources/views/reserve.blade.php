@extends('layouts.app')
@section('title', 'Reserve a Table — Bombay to Britain')
@section('content')

<section class="booking-page" x-data="{
  step: 1,
  complete: false,
  date: new Date().toISOString().slice(0, 10),
  guests: 2,
  time: '',
  seating: 'Best available',
  times: ['5:30 PM','6:00 PM','6:30 PM','7:00 PM','7:30 PM','8:00 PM','8:30 PM','9:00 PM'],
  next() { if (this.date && this.guests && this.time) { this.step = 2; window.scrollTo({top: 0, behavior: 'smooth'}); } },
  submit() { this.complete = true; window.scrollTo({top: 0, behavior: 'smooth'}); }
}">
  <div class="booking-visual">
    <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?fm=jpg&q=88&w=1400&auto=format&fit=crop" alt="An intimate table set for dinner at Bombay to Britain">
    <div class="booking-visual-shade"></div>
    <div class="booking-visual-copy">
      <p class="eyebrow"><span></span> Reservations</p>
      <h1>Meet us<br>at the <em>table.</em></h1>
      <p>Come for dinner. Stay for the stories.</p>
    </div>
    <div class="booking-visual-note"><span>Royton · Oldham</span><strong>Open daily</strong></div>
  </div>

  <div class="booking-panel">
    <div class="booking-panel-inner">
      <a href="{{ route('home') }}" class="booking-back">← Back to restaurant</a>

      <template x-if="!complete">
        <div>
          <div class="booking-progress">
            <div><span :class="step >= 1 ? 'is-active' : ''">01</span><p>Find a table</p></div>
            <i :class="step === 2 ? 'is-complete' : ''"></i>
            <div><span :class="step >= 2 ? 'is-active' : ''">02</span><p>Your details</p></div>
          </div>

          <div x-show="step === 1" x-transition.opacity>
            <div class="booking-heading">
              <p class="section-number">Step one</p>
              <h2>Find your table</h2>
              <p>Choose when you’d like to join us. Available times will appear below.</p>
            </div>

            <div class="booking-fields booking-fields-two">
              <label class="booking-field">
                <span>Date</span>
                <input type="date" x-model="date" required>
              </label>
              <label class="booking-field">
                <span>Party size</span>
                <select x-model.number="guests">
                  @foreach(range(1, 8) as $guest)
                    <option value="{{ $guest }}">{{ $guest }} {{ $guest === 1 ? 'guest' : 'guests' }}</option>
                  @endforeach
                  <option value="9">9+ guests</option>
                </select>
              </label>
            </div>

            <fieldset class="booking-times">
              <legend>Available times</legend>
              <div>
                <template x-for="slot in times" :key="slot">
                  <button type="button" @click="time = slot" :class="time === slot ? 'is-selected' : ''" x-text="slot"></button>
                </template>
              </div>
            </fieldset>

            <button type="button" class="booking-submit" :disabled="!time" @click="next()">
              Continue to details <span>→</span>
            </button>
            <p class="booking-smallprint">For parties of 9 or more, please call us on <a href="tel:07487244838">07487 244 838</a>.</p>
          </div>

          <div x-show="step === 2" x-cloak x-transition.opacity>
            <div class="booking-heading">
              <button type="button" class="booking-step-back" @click="step = 1">← Change date or time</button>
              <p class="section-number">Step two</p>
              <h2>A few final details</h2>
              <div class="booking-summary"><strong x-text="time"></strong><span>·</span><span x-text="guests + (guests === 1 ? ' guest' : ' guests')"></span><span>·</span><span x-text="new Date(date + 'T12:00:00').toLocaleDateString('en-GB', {day:'numeric', month:'short'})"></span></div>
            </div>

            <form @submit.prevent="submit()">
              <div class="booking-fields booking-fields-two">
                <label class="booking-field"><span>First name</span><input type="text" name="first_name" autocomplete="given-name" required placeholder="First name"></label>
                <label class="booking-field"><span>Last name</span><input type="text" name="last_name" autocomplete="family-name" required placeholder="Last name"></label>
                <label class="booking-field"><span>Email</span><input type="email" name="email" autocomplete="email" required placeholder="you@example.com"></label>
                <label class="booking-field"><span>Phone</span><input type="tel" name="phone" autocomplete="tel" required placeholder="Contact number"></label>
              </div>

              <fieldset class="booking-preference">
                <legend>Seating preference <small>Optional</small></legend>
                <div>
                  <template x-for="option in ['Best available','Window','Quiet corner','Near the bar']" :key="option">
                    <button type="button" @click="seating = option" :class="seating === option ? 'is-selected' : ''" x-text="option"></button>
                  </template>
                </div>
              </fieldset>

              <label class="booking-field booking-notes"><span>Anything we should know? <small>Optional</small></span><textarea name="requests" rows="3" placeholder="Dietary needs, celebrations or accessibility requests"></textarea></label>
              <button type="submit" class="booking-submit">Request reservation <span>↗</span></button>
              <p class="booking-smallprint">Your table is held once our team confirms by email or phone.</p>
            </form>
          </div>
        </div>
      </template>

      <template x-if="complete">
        <div class="booking-confirmation">
          <div class="booking-confirmation-mark">✓</div>
          <p class="section-number">Request received</p>
          <h2>We’ll set<br>the table.</h2>
          <p>Your request for <strong x-text="time"></strong> on <strong x-text="new Date(date + 'T12:00:00').toLocaleDateString('en-GB', {weekday:'long', day:'numeric', month:'long'})"></strong> has been received. We’ll confirm shortly.</p>
          <div class="booking-confirmation-actions">
            <a href="{{ route('menu') }}" class="btn btn-primary">View the menu</a>
            <button type="button" class="btn btn-quiet" @click="complete = false; step = 1; time = ''">Make another booking</button>
          </div>
        </div>
      </template>
    </div>
  </div>
</section>
@endsection
