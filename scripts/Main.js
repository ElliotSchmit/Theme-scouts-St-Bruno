class Main {
  constructor() {
    this.init();
  }

  init() {
    document.documentElement.classList.add('has-js');
    const components = document.querySelectorAll('[data-component]');

   
    for (let i = 0; i < components.length; i++) {
      const component = components[i];
      const enfants = component.children;

      if(component.dataset.component == 'Accordeon'){ 
        for (let i = 0; i < enfants.length; i++) {
          const enfant = enfants[i];
          enfant.querySelector('.titre').addEventListener('click', this.openClose);
        }
      }

      if(component.dataset.component == 'Header'){
        this.element = component;
        this.options = {
          threshold: 0.1,
        };
        this.scrollPosition = 0;
        this.lastScrollPosition = 0;
        this.html = document.documentElement;
        this.initNavMobile();

        this.setOptions();
        window.addEventListener('scroll', this.onScroll.bind(this));
      }

      if(component.dataset.component == 'Tirroir'){
        component.addEventListener('click', this.tirroirs);
      }
    }
  }

  openClose(event){
    console.log(event);
    if(event.currentTarget.classList.contains('accordeon-is-active')){
      event.currentTarget.classList.remove('accordeon-is-active');
    }
    else{
      const accordeons = document.querySelectorAll('.js-accordeon');

      for (let i = 0; i < accordeons.length; i++) {
        const accordeon = accordeons[i];
        accordeon.querySelector('.titre').classList.remove('accordeon-is-active');
      }
      event.currentTarget.classList.add('accordeon-is-active');
    }
  }

  setOptions() {
    if ('threshold' in this.element.dataset) {
      this.options.threshold = this.element.dataset.threshold;
    }
  }

  onScroll() {
    this.lastScrollPosition = this.scrollPosition;
    this.scrollPosition = document.scrollingElement.scrollTop;

    this.setHeaderState();
    this.setDirections();
  }

  setHeaderState() {
    if (!('alwaysShow' in this.element.dataset)) {
      if (
        this.scrollPosition >
        document.scrollingElement.scrollHeight * this.options.threshold
      ) {
        this.html.classList.add('header-is-hidden');
      } else {
        this.html.classList.remove('header-is-hidden');
      }
    }
  }

  setDirections() {
    if (this.scrollPosition >= this.lastScrollPosition) {
      this.html.classList.add('is-scrolling-down');
      this.html.classList.remove('is-scrolling-up');
    } else {
      this.html.classList.add('is-scrolling-up');
      this.html.classList.remove('is-scrolling-down');
    }
  }

  initNavMobile() {
    const toggle = this.element.querySelector('.js-toggle');
    toggle.addEventListener('click', this.onToggleNav.bind(this));
  }

  onToggleNav() {
    document.documentElement.classList.toggle('nav-is-active');
  }

  tirroirs(event){
    const nombre = event.currentTarget.dataset.tirroir;
    const section = document.querySelector(`.js-tirroir-${nombre}`);

    if(event.currentTarget.classList.contains('tirroir-is-active')){
      event.currentTarget.classList.remove('tirroir-is-active');
      section.classList.remove('tirroir-is-active');
    }
    else{
      const tirroirs = document.querySelectorAll('.js-tirroirs');

      for (let i = 0; i < tirroirs.length; i++) {
        const tirroir = tirroirs[i];
        tirroir.classList.remove('tirroir-is-active');
      }

      event.currentTarget.classList.add('tirroir-is-active');
      section.classList.add('tirroir-is-active');
    }
  }
}
new Main();
