document.addEventListener("DOMContentLoaded", () => {
  const images = [
    "public/img/30.jpeg",
    "public/img/31.jpeg",
    "public/img/32.jpeg",
    "public/img/33.jpeg",
    "public/img/34.jpeg",
    "public/img/35.jpeg",
    "public/img/36.jpeg",
    "public/img/37.jpeg",
    "public/img/38.jpeg"
  ];

  const coverflow = document.getElementById("coverflow");
  const prevBtn = document.getElementById("cfPrev");
  const nextBtn = document.getElementById("cfNext");

  if (!coverflow || !prevBtn || !nextBtn) {
    console.error("Faltan IDs en el HTML. Revisa: coverflow, cfPrev, cfNext", {
      coverflow, prevBtn, nextBtn
    });
    return;
  }

  let active = 4;

  function render() {
    coverflow.innerHTML = "";

    images.forEach((src, i) => {
      const item = document.createElement("div");
      item.className = "cf-item";
      item.innerHTML = `<img src="${src}" alt="">`;

      let offset = i - active;

      if (offset > images.length / 2) offset -= images.length;
      if (offset < -images.length / 2) offset += images.length;

      item.classList.remove(
        "active","left-1","left-2",
        "right-1","right-2","hidden"
      );

      if (offset === 0) item.classList.add("active");
      else if (offset === -1) item.classList.add("left-1");
      else if (offset === -2) item.classList.add("left-2");
      else if (offset === 1) item.classList.add("right-1");
      else if (offset === 2) item.classList.add("right-2");
      else item.classList.add("hidden");

      item.addEventListener("click", () => {
        active = i;
        render();
        restartAutoplay();
      });

      coverflow.appendChild(item);
    });
  }

  function next() {
    active = (active + 1) % images.length;
    render();
  }

  function prev() {
    active = (active - 1 + images.length) % images.length;
    render();
  }

  // =========================
  // AUTOPLAY
  // =========================
  const AUTOPLAY_MS = 3000; // velocidad (ms)
  let autoplayId = null;

  function startAutoplay() {
    stopAutoplay();
    autoplayId = setInterval(next, AUTOPLAY_MS);
  }

  function stopAutoplay() {
    if (autoplayId) clearInterval(autoplayId);
    autoplayId = null;
  }

  function restartAutoplay() {
    startAutoplay();
  }

  // Botones (pausa y reanuda)
  nextBtn.addEventListener("click", () => { next(); restartAutoplay(); });
  prevBtn.addEventListener("click", () => { prev(); restartAutoplay(); });

  // Pausar al pasar el mouse
  coverflow.addEventListener("mouseenter", stopAutoplay);
  coverflow.addEventListener("mouseleave", startAutoplay);

  // Teclas (pausa y reanuda)
  window.addEventListener("keydown", (e) => {
    if (e.key === "ArrowRight") { next(); restartAutoplay(); }
    if (e.key === "ArrowLeft") { prev(); restartAutoplay(); }
  });

  // Pausar si cambias de pestaña
  document.addEventListener("visibilitychange", () => {
    if (document.hidden) stopAutoplay();
    else startAutoplay();
  });

  render();
  startAutoplay(); // ✅ arranca automático
});