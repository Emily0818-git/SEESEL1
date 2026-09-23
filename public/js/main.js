<script src="public/js/main.js"></script>

document.addEventListener('DOMContentLoaded', () => {

    const counters = document.querySelectorAll('.counter');
    let countersStarted = false;

    function startCounters() {
        counters.forEach(counter => {
            const target = +counter.dataset.target;
            const duration = 1800; // duración en ms
            const startTime = performance.now();

            function update(currentTime) {
                const progress = Math.min((currentTime - startTime) / duration, 1);
                const ease = 1 - Math.pow(1 - progress, 3); // easing suave
                counter.innerText = Math.floor(ease * target);

                if (progress < 1) {
                    requestAnimationFrame(update);
                } else {
                    counter.innerText = target;
                }
            }

            requestAnimationFrame(update);
        });
    }

    window.addEventListener('scroll', () => {
        const trigger = document.querySelector('.counter');
        if (!trigger || countersStarted) return;

        if (trigger.getBoundingClientRect().top < window.innerHeight - 120) {
            startCounters();
            countersStarted = true;
        }
    });

});



(function(){
  const carousel = document.getElementById("seeselCarousel");
  if(!carousel) return;

  const slides = Array.from(carousel.querySelectorAll(".sc-slide"));
  const prevBtn = carousel.querySelector(".sc-prev");
  const nextBtn = carousel.querySelector(".sc-next");

  let current = 1; // imagen del centro (inicio)

  function paint(){
    slides.forEach((s,i)=>{
      s.classList.remove("is-center","is-side","is-hidden");
      if(i === current){
        s.classList.add("is-center");
      }else if(i === current - 1 || i === current + 1){
        s.classList.add("is-side");
      }else{
        s.classList.add("is-hidden");
      }
    });
  }

  function next(){
    current = (current + 1) % slides.length;
    paint();
  }

  function prev(){
    current = (current - 1 + slides.length) % slides.length;
    paint();
  }

  nextBtn.addEventListener("click", next);
  prevBtn.addEventListener("click", prev);

  // Teclado (opcional)
  window.addEventListener("keydown", (e)=>{
    if(e.key === "ArrowRight") next();
    if(e.key === "ArrowLeft") prev();
  });

  // Auto-play (opcional). Si no lo quieres, borra estas 2 líneas:
  let timer = setInterval(next, 4500);
  carousel.addEventListener("mouseenter", ()=> clearInterval(timer));
  carousel.addEventListener("mouseleave", ()=> timer = setInterval(next, 4500));

  paint();
})();
