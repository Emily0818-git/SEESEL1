let map;
let markerSeesel;
let markerUsuario;

const SEESel_LAT = 20.000000; // <-- CAMBIA ESTO
const SEESel_LNG = -100.000000; // <-- CAMBIA ESTO

function initMap() {
  const seeselPos = { lat: SEESel_LAT, lng: SEESel_LNG };

  map = new google.maps.Map(document.getElementById("map"), {
    center: seeselPos,
    zoom: 16,
    mapTypeControl: false,
    streetViewControl: false,
    fullscreenControl: true
  });

  // Marcador fijo de SEESEL
  markerSeesel = new google.maps.Marker({
    position: seeselPos,
    map,
    title: "SEESEL"
  });

  const info = new google.maps.InfoWindow({
    content: `
      <div style="font-family:Segoe UI; font-size:14px;">
        <b>SEESEL</b><br>
        Servicios Especiales Eléctricos
      </div>
    `
  });

  markerSeesel.addListener("click", () => info.open(map, markerSeesel));

  // Link “Cómo llegar”
  const btnComoLlegar = document.getElementById("btnComoLlegar");
  if (btnComoLlegar) {
    btnComoLlegar.href = `https://www.google.com/maps/dir/?api=1&destination=${SEESel_LAT},${SEESel_LNG}`;
  }

  // Botón de geolocalización
  const btnUbicacion = document.getElementById("btnUbicacion");
  if (btnUbicacion) {
    btnUbicacion.addEventListener("click", ubicarUsuario);
  }
}

function ubicarUsuario() {
  const geoMsg = document.getElementById("geoMsg");
  if (geoMsg) geoMsg.textContent = "Obteniendo tu ubicación...";

  if (!navigator.geolocation) {
    if (geoMsg) geoMsg.textContent = "Tu navegador no soporta geolocalización.";
    return;
  }

  navigator.geolocation.getCurrentPosition(
    (pos) => {
      const userPos = {
        lat: pos.coords.latitude,
        lng: pos.coords.longitude
      };

      // Si ya existe marcador del usuario, muévelo
      if (markerUsuario) {
        markerUsuario.setPosition(userPos);
      } else {
        markerUsuario = new google.maps.Marker({
          position: userPos,
          map,
          title: "Tu ubicación"
        });
      }

      map.panTo(userPos);
      map.setZoom(15);

      if (geoMsg) geoMsg.textContent = "Ubicación detectada ✅";

      // Opcional: actualizar “Cómo llegar” desde tu ubicación
      const btnComoLlegar = document.getElementById("btnComoLlegar");
      if (btnComoLlegar) {
        btnComoLlegar.href =
          `https://www.google.com/maps/dir/?api=1&origin=${userPos.lat},${userPos.lng}&destination=${SEESel_LAT},${SEESel_LNG}`;
      }
    },
    (err) => {
      let msg = "No se pudo obtener tu ubicación.";
      if (err.code === 1) msg = "Permiso de ubicación denegado.";
      if (err.code === 2) msg = "Ubicación no disponible.";
      if (err.code === 3) msg = "Tiempo de espera agotado.";
      if (geoMsg) geoMsg.textContent = msg;
    },
    {
      enableHighAccuracy: true,
      timeout: 9000,
      maximumAge: 0
    }
  );
}
