<div class="theme-switcher fixed bottom-6 right-6 z-[60]"
     x-data="{
       open: false,
       theme: document.documentElement.dataset.theme || 'btob',
       setTheme(value) {
         this.theme = value;
         document.documentElement.dataset.theme = value;
         localStorage.setItem('btob-theme', value);
         this.open = false;
       }
     }"
     x-init="theme = localStorage.getItem('btob-theme') || document.documentElement.dataset.theme || 'btob'; document.documentElement.dataset.theme = theme">
  <button type="button" class="theme-trigger" aria-label="Open theme switcher" @click="open = !open">
    <svg x-show="theme === 'btob'" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
      <path stroke-linecap="round" stroke-linejoin="round" d="M21 12.8A8.5 8.5 0 1 1 11.2 3a6.5 6.5 0 0 0 9.8 9.8Z" />
    </svg>
    <svg x-show="theme === 'btob-light'" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
      <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25M12 18.75V21M4.22 4.22l1.59 1.59M18.19 18.19l1.59 1.59M3 12h2.25M18.75 12H21M4.22 19.78l1.59-1.59M18.19 5.81l1.59-1.59M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Z" />
    </svg>
  </button>

  <div x-show="open"
       x-cloak
       x-transition.opacity.scale.origin.bottom.right
       @click.outside="open = false"
       class="theme-panel surface-panel">
    <button type="button" class="theme-option" :class="theme === 'btob-light' ? 'is-active' : ''" @click="setTheme('btob-light')">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25M12 18.75V21M4.22 4.22l1.59 1.59M18.19 18.19l1.59 1.59M3 12h2.25M18.75 12H21M4.22 19.78l1.59-1.59M18.19 5.81l1.59-1.59M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Z" />
      </svg>
      Light
    </button>
    <button type="button" class="theme-option" :class="theme === 'btob' ? 'is-active' : ''" @click="setTheme('btob')">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12.8A8.5 8.5 0 1 1 11.2 3a6.5 6.5 0 0 0 9.8 9.8Z" />
      </svg>
      Dark
    </button>
  </div>
</div>
