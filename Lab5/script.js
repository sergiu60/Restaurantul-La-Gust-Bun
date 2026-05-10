document.addEventListener('DOMContentLoaded', function () {

  // 1. ANIMATIE LA SCROLL 
  const observator = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        entry.target.classList.add('vizibil');
        observator.unobserve(entry.target);
      }
    });
  }, { threshold: 0.15 });

  document.querySelectorAll('.card-fel, .card-reteta').forEach(function (el) {
    el.classList.add('ascuns');
    observator.observe(el);
  });

  // 2. EFECT TYPING
  const subtitlu = document.querySelector('.subtitlu-restaurant');
  if (subtitlu) {
    const textOriginal = subtitlu.textContent;
    subtitlu.textContent = '';
    let i = 0;
    const interval = setInterval(function () {
      subtitlu.textContent += textOriginal[i];
      i++;
      if (i >= textOriginal.length) clearInterval(interval);
    }, 60);
  }

  // 3. MESAJ DE BUN VENIT
  const notificare = document.createElement('div');
  notificare.id = 'notificare';
  notificare.innerHTML = '🍽️ Bun venit! <a href="formular.html" style="color:var(--culoare-auriu);font-weight:700;text-decoration:none;">Rezervați o masă →</a>';
  document.body.appendChild(notificare);
  setTimeout(() => notificare.classList.add('notificare-arata'), 800);
  setTimeout(() => notificare.classList.remove('notificare-arata'), 5000);

  // 4. CONTOR ANIMAT pentru titlul secțiunii (ex: "4 feluri de mâncare")
  const carduri = document.querySelectorAll('.card-fel');
  if (carduri.length > 0) {
    const titlu = document.querySelector('.titlu-sectiune');
    if (titlu) {
      const original = titlu.textContent;
      titlu.setAttribute('data-original', original);
      titlu.addEventListener('mouseenter', function () {
        titlu.textContent = carduri.length + ' feluri delicioase';
      });
      titlu.addEventListener('mouseleave', function () {
        titlu.textContent = original;
      });
    }
  }

  // 5. CURSOR PERSONALIZAT pe carduri
  carduri.forEach(function (card) {
    card.addEventListener('mouseenter', function () {
      document.body.style.cursor = 'pointer';
    });
    card.addEventListener('mouseleave', function () {
      document.body.style.cursor = 'default';
    });
  });

  // 6. PARALAX UȘOR pe header la scroll
  const header = document.querySelector('.antet-pagina');
  if (header) {
    window.addEventListener('scroll', function () {
      const scrollY = window.scrollY;
      header.style.backgroundPositionY = (scrollY * 0.3) + 'px';
    }, { passive: true });
  }

});

//animations pe scroll
const stiluri = document.createElement('style');
stiluri.textContent = `
  .ascuns {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.6s ease, transform 0.6s ease;
  }
  .vizibil {
    opacity: 1;
    transform: translateY(0);
  }
  #notificare {
    position: fixed;
    bottom: 24px;
    right: 24px;
    background: var(--culoare-text, #2C1A0E);
    color: #F0E4CC;
    padding: 14px 22px;
    border-radius: 50px;
    font-size: 0.88rem;
    font-family: 'Lato', sans-serif;
    box-shadow: 0 6px 24px rgba(0,0,0,0.3);
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.4s ease, transform 0.4s ease;
    z-index: 1000;
  }
  #notificare.notificare-arata {
    opacity: 1;
    transform: translateY(0);
  }
`;
document.head.appendChild(stiluri);