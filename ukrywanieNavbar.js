const nav = document.getElementById('header');

let previousScrollTop;
let isScrolling;

const hasScrolled = () => {
  
  const scrollTop = window.scrollY;
  
  if (scrollTop > previousScrollTop){
    nav.classList.add('nav--up');
  } else {
    nav.classList.remove('nav--up');
  }
    
  previousScrollTop = scrollTop;
  
}

document.addEventListener('scroll', () => isScrolling = true);

setInterval(() => {
  if (isScrolling) {
    hasScrolled();
    isScrolling = false;
  }
}, 100);