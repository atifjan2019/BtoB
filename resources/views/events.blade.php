@extends('layouts.app')
@section('title', 'Private Dining & Events — Bombay to Britain')
@section('content')

<section class="events-hero">
  <div class="events-hero-media">
    <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?fm=jpg&q=88&w=2200&auto=format&fit=crop" alt="The Bombay to Britain dining room prepared for a private celebration">
  </div>
  <div class="events-hero-shade"></div>
  <div class="site-container events-hero-inner">
    <div class="events-hero-copy">
      <p class="eyebrow"><span></span> Private dining &amp; celebrations</p>
      <h1>Make a night<br><em>of it.</em></h1>
      <p>Intimate dinners, landmark celebrations and full-room takeovers—made personal by our kitchen and hosted with effortless warmth.</p>
      <a href="#event-enquiry" class="btn btn-primary btn-lg">Plan your occasion <span>↘</span></a>
    </div>
    <div class="events-hero-detail">
      <span>Hosting</span>
      <strong>8–80 guests</strong>
      <p>Royton, Oldham</p>
    </div>
  </div>
  <p class="events-side-note">Private occasions · Bombay hospitality</p>
</section>

<section class="events-intro site-container">
  <p class="section-number">01 / The occasion</p>
  <div class="events-intro-grid">
    <h2 class="display-serif">Your people.<br>Your menu.<br><em>Your moment.</em></h2>
    <div>
      <p class="events-intro-lead">No two tables should ever feel the same.</p>
      <p>From the first welcome drink to the last spoonful of dessert, our events team shapes every detail around you. Choose a private room, take over the restaurant, or bring our kitchen to your own venue.</p>
      <div class="events-mini-facts">
        <div><span>Menus</span><strong>Bespoke</strong></div>
        <div><span>Service</span><strong>Dedicated</strong></div>
        <div><span>Drinks</span><strong>Curated</strong></div>
      </div>
    </div>
  </div>
</section>

<section class="event-spaces">
  <div class="site-container event-spaces-heading">
    <div><p class="section-number">02 / Choose your setting</p><h2 class="display-serif">Three ways to gather</h2></div>
    <p>Each experience includes a dedicated host, personalised menus and the full attention of our kitchen.</p>
  </div>

  <div class="site-container event-space-list">
    @foreach([
      ['01','The Private Room','8–20 guests','An intimate room made for birthdays, family dinners and conversations that deserve their own space.','Seated tasting menus','Wine pairing available','Dedicated maître d’'],
      ['02','The Restaurant','Up to 80 guests','The whole house is yours. Ideal for weddings, launches and celebrations that call for a little theatre.','Exclusive venue hire','Bespoke room styling','Full bar & kitchen'],
      ['03','Bombay, Anywhere','At your venue','Our chefs and signature hospitality travel to you—from elegant canapé receptions to generous seated feasts.','Flexible guest numbers','On-site chef team','Tailored service style'],
    ] as [$num,$title,$capacity,$text,$one,$two,$three])
      <article class="event-space-card">
        <div class="event-space-number">{{ $num }}</div>
        <div class="event-space-title"><p>{{ $capacity }}</p><h3>{{ $title }}</h3></div>
        <p class="event-space-copy">{{ $text }}</p>
        <ul><li>{{ $one }}</li><li>{{ $two }}</li><li>{{ $three }}</li></ul>
        <a href="#event-enquiry" aria-label="Enquire about {{ $title }}">↗</a>
      </article>
    @endforeach
  </div>
</section>

<section class="events-feature">
  <div class="events-feature-image">
    <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?fm=jpg&q=86&w=1500&auto=format&fit=crop" alt="A beautifully set table ready for dinner">
    <span>Every detail, considered.</span>
  </div>
  <div class="events-feature-copy">
    <p class="section-number">03 / How it comes together</p>
    <h2 class="display-serif">From first idea<br>to final toast.</h2>
    <ol>
      <li><span>01</span><div><strong>Tell us your vision</strong><p>Share the date, guest list and the feeling you want to create.</p></div></li>
      <li><span>02</span><div><strong>Taste your menu</strong><p>We shape a menu with you, from first bite to final flourish.</p></div></li>
      <li><span>03</span><div><strong>Leave it with us</strong><p>On the day, your only job is to arrive and enjoy your people.</p></div></li>
    </ol>
  </div>
</section>

<section class="events-enquiry" id="event-enquiry">
  <div class="site-container events-enquiry-inner">
    <p class="section-number">04 / Start planning</p>
    <h2 class="display-serif">Let’s make it<br><em>unforgettable.</em></h2>
    <p>Tell us a little about your occasion and our events team will be in touch to shape the details.</p>
    <div class="events-enquiry-actions">
      <a href="mailto:reservations@btob.co.uk?subject=Private%20Event%20Enquiry" class="btn btn-primary btn-lg">Email our events team <span>↗</span></a>
      <a href="tel:07487244838" class="btn btn-quiet btn-lg">Call 07487 244 838</a>
    </div>
  </div>
</section>
@endsection
