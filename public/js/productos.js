const PRODUCTS = [
  { slug:"interruptores",  name:"Interruptores en baja, media y alta tensión", tag:"Protección", desc:"Maniobra y protección para distintos niveles de tensión.", cover:"public/img/portada1.jpeg", gallery:["public/img/portada2.jpeg","public/img/portada3.jpg","public/img/portada4.jpg"] },
  { slug:"banco-capacitores", name:"Banco de capacitores", tag:"Energía", desc:"Mejora del factor de potencia y eficiencia energética.", cover:"public/img/portada2.jpeg", gallery:["public/img/portada1.jpeg","public/img/portada3.jpg","public/img/portada5.jpg"] },
  { slug:"generadores", name:"Generadores eléctricos", tag:"Energía", desc:"Respaldo de energía para continuidad de operación.", cover:"public/img/portada3.jpg", gallery:["public/img/portada1.jpeg","public/img/portada2.jpeg","public/img/portada6.jpg"] },
  { slug:"baterias", name:"Baterías", tag:"Energía", desc:"Bancos para UPS, respaldo y sistemas críticos.", cover:"public/img/portada4.jpg", gallery:["public/img/portada7.jpg","public/img/portada8.jpg","public/img/portada5.jpg"] },
  { slug:"fusibles", name:"Fusibles de baja y media tensión", tag:"Protección", desc:"Protección contra sobrecorriente en diferentes rangos.", cover:"public/img/portada5.jpg", gallery:["public/img/portada6.jpg","public/img/portada7.jpg","public/img/portada8.jpg"] },
  { slug:"tierras", name:"Compuestos para sistema de tierras", tag:"Protección", desc:"Mejora de resistencia y desempeño del sistema a tierra.", cover:"public/img/portada6.jpg", gallery:["public/img/portada5.jpg","public/img/portada7.jpg","public/img/portada8.jpg"] },
  { slug:"epp", name:"EPP", tag:"Seguridad", desc:"Equipo de protección personal para trabajos eléctricos.", cover:"public/img/portada7.jpg", gallery:["public/img/portada1.jpeg","public/img/portada2.jpeg","public/img/portada3.jpg"] },
  { slug:"transformadores", name:"Transformadores de diferentes capacidades", tag:"Energía", desc:"Opciones según requerimiento de carga y tensión.", cover:"public/img/portada8.jpg", gallery:["public/img/portada4.jpg","public/img/portada6.jpg","public/img/portada2.jpeg"] },
  { slug:"aceite-dielectrico", name:"Aceite dieléctrico", tag:"Energía", desc:"Fluido aislante para equipos eléctricos.", cover:"public/img/M.VOLTAJE.jpg", gallery:["public/img/portada1.jpeg","public/img/portada5.jpg","public/img/portada3.jpg"] },
  { slug:"apartarrayos", name:"Apartarrayos", tag:"Protección", desc:"Protección contra sobretensiones y descargas.", cover:"public/img/portada2.jpeg", gallery:["public/img/portada4.jpg","public/img/portada6.jpg","public/img/portada8.jpg"] },
  { slug:"cortacircuitos", name:"Cortacircuitos", tag:"Protección", desc:"Elementos de protección para sistemas eléctricos.", cover:"public/img/portada3.jpg", gallery:["public/img/portada1.jpeg","public/img/portada7.jpg","public/img/portada5.jpg"] },
  { slug:"equipo-pruebas", name:"Equipo de pruebas", tag:"Medición", desc:"Instrumentación para verificación y pruebas eléctricas.", cover:"public/img/portada4.jpg", gallery:["public/img/portada2.jpeg","public/img/portada3.jpg","public/img/portada6.jpg"] }
];

function revealCards(){
  const els = document.querySelectorAll(".reveal");
  const io = new IntersectionObserver((entries)=>{
    entries.forEach(e=>{
      if(e.isIntersecting){
        e.target.classList.add("is-in");
        io.unobserve(e.target);
      }
    });
  }, {threshold:0.12});
  els.forEach(el=>io.observe(el));
}

function renderCatalog(baseUrl){
  const grid = document.getElementById("productsGrid");
  const search = document.getElementById("productsSearch");
  if(!grid || !search) return;

  const card = (p)=>`
    <div class="col-12 col-sm-6 col-lg-4">
      <div class="product-card reveal">
        <div class="product-media">
          <img src="${p.cover}" alt="${p.name}">
          <div class="product-glow"></div>
        </div>
        <div class="product-body">
          <span class="product-pill">● ${p.tag}</span>
          <h3 class="product-name">${p.name}</h3>
          <p class="product-desc">${p.desc}</p>
          <div class="product-actions">
            <a class="product-link" href="${baseUrl}&item=${encodeURIComponent(p.slug)}">
              Ver producto <span>➜</span>
            </a>
            <span class="product-note">Clic para detalles</span>
          </div>
        </div>
      </div>
    </div>
  `;

  const render = ()=>{
    const q = search.value.toLowerCase().trim();
    const filtered = PRODUCTS.filter(p =>
      p.name.toLowerCase().includes(q) ||
      p.tag.toLowerCase().includes(q) ||
      p.desc.toLowerCase().includes(q)
    );
    grid.innerHTML = filtered.map(card).join("");
    revealCards();
  };

  search.addEventListener("input", render);
  render();
}

function renderDetail(itemSlug){
  const p = PRODUCTS.find(x=>x.slug===itemSlug);
  if(!p) return;

  const cover = document.getElementById("coverImg");
  const title = document.getElementById("detailTitle");
  const desc  = document.getElementById("detailDesc");
  const tag   = document.getElementById("detailTag");
  const gallery = document.getElementById("detailGallery");

  if(!cover || !title || !desc || !tag || !gallery) return;

  cover.src = p.cover;
  cover.alt = p.name;
  title.textContent = p.name;
  desc.textContent = p.desc;
  tag.textContent = p.tag;

  gallery.innerHTML = p.gallery.map(src => `
    <div class="col-12 col-sm-6 col-lg-4">
      <div class="gallery-card" onclick="document.getElementById('coverImg').src='${src}'">
        <img src="${src}" alt="Galería ${p.name}">
      </div>
    </div>
  `).join("");
}

// Exporta funciones al window para llamarlas desde PHP
window.SEESEL_PRODUCTS = { renderCatalog, renderDetail };
