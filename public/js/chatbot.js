document.addEventListener("DOMContentLoaded", function () {
    "use strict";

    /* =====================================================
       CONFIGURACIÓN
       Reemplaza el número por el WhatsApp real de SEESEL.
       Formato: código de país + número, sin +, espacios ni guiones.
       Ejemplo México: 524421234567
    ===================================================== */
    const WHATSAPP_SEESEL = "524424619026";
    const RUTA_CONTROLADOR = "controllers/ChatbotController.php";

    const boton = document.getElementById("chatbotToggle");
    const ventana = document.getElementById("chatbotWindow");
    const cerrar = document.getElementById("chatbotClose");
    const cuerpo = document.getElementById("chatbotBody");
    const comenzar = document.getElementById("chatbotStart");

    let datosChatbot = crearDatosVacios();
    let pasoActual = "";
    let procesandoRespuesta = false;

    if (!boton || !ventana || !cerrar || !cuerpo || !comenzar) {
        console.error("No se encontraron los elementos principales del chatbot.");
        return;
    }

    actualizarSaludoInicial();

    boton.addEventListener("click", function () {
        ventana.classList.toggle("active");
        const abierto = ventana.classList.contains("active");
        boton.classList.toggle("chat-open", abierto);
        boton.setAttribute("aria-expanded", abierto ? "true" : "false");
        if (abierto) scrollFinal();
    });

    cerrar.addEventListener("click", function () {
        ventana.classList.remove("active");
        boton.classList.remove("chat-open");
        boton.setAttribute("aria-expanded", "false");
    });

    comenzar.addEventListener("click", mostrarMenuPrincipal);

    function crearDatosVacios() {
        return {
            servicio: "",
            tipoSolicitud: "",
            nombre: "",
            empresa: "",
            telefono: "",
            correo: "",
            descripcion: ""
        };
    }

    function obtenerSaludoHorario() {
        const hora = new Date().getHours();
        if (hora < 12) return { saludo: "Buenos días", icono: "☀️" };
        if (hora < 19) return { saludo: "Buenas tardes", icono: "🌤️" };
        return { saludo: "Buenas noches", icono: "🌙" };
    }

    function actualizarSaludoInicial() {
        const saludo = obtenerSaludoHorario();
        const texto = document.getElementById("chatbotGreetingText");
        const icono = document.getElementById("chatbotGreetingIcon");
        if (texto) texto.textContent = saludo.saludo;
        if (icono) icono.textContent = saludo.icono;
    }

    function esperar(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    function escaparHTML(texto) {
        const div = document.createElement("div");
        div.textContent = texto ?? "";
        return div.innerHTML;
    }

    function obtenerPrimerNombre(nombre) {
        return nombre.trim().split(/\s+/)[0] || "cliente";
    }

    function obtenerHoraActual() {
        return new Date().toLocaleTimeString("es-MX", {
            hour: "2-digit",
            minute: "2-digit"
        });
    }

    function scrollFinal() {
        requestAnimationFrame(function () {
            cuerpo.scrollTo({ top: cuerpo.scrollHeight, behavior: "smooth" });
        });
    }

    function eliminarAreaEntrada() {
        const area = cuerpo.querySelector(".chatbot-input-area");
        if (area) area.remove();
        const omitir = cuerpo.querySelector(".chatbot-skip-button");
        if (omitir) omitir.remove();
    }

    function agregarMensajeBot(html) {
        const fila = document.createElement("div");
        fila.className = "chatbot-message-row bot-row chatbot-message-enter";
        fila.innerHTML = `
        <div class="chatbot-message-avatar">
            <img
                src="public/img/Avatar.png"
                alt="Asistente SEESEL"
                class="chatbot-message-avatar-img"
            >
        </div>

            <div class="chatbot-message-content">
                <span class="chatbot-message-name">
                    Asistente SEESEL
                </span>

                <div class="bot-message">${html}</div>

                <span class="chatbot-message-time">
                    ${obtenerHoraActual()}
                </span>
            </div>
        `;
        cuerpo.appendChild(fila);
        scrollFinal();
        return fila;
    }

    function agregarRespuestaUsuario(texto) {
        eliminarAreaEntrada();
        const fila = document.createElement("div");
        fila.className = "chatbot-message-row user-row chatbot-message-enter";
        fila.innerHTML = `
            <div class="chatbot-message-content">
                <div class="user-message">${escaparHTML(texto)}</div>
                <span class="chatbot-message-time">${obtenerHoraActual()}</span>
            </div>`;
        cuerpo.appendChild(fila);
        scrollFinal();
    }

    function mostrarEscribiendo() {
        eliminarEscribiendo();
        const fila = document.createElement("div");
        fila.className = "chatbot-message-row bot-row";
        fila.id = "chatbotTyping";
        fila.innerHTML = `
            <div class="chatbot-message-avatar">

            <img
                src="public/img/Avatar.png"
                alt="Asistente SEESEL"
                class="chatbot-message-avatar-img"
            >

         </div>
            <div class="chatbot-message-content">
                <span class="chatbot-message-name">Asistente SEESEL</span>
                <div class="bot-message chatbot-typing">
                    <div class="typing-dots" aria-label="El asistente está escribiendo">
                        <span></span><span></span><span></span>
                    </div>
                </div>
            </div>`;
        cuerpo.appendChild(fila);
        scrollFinal();
    }

    function eliminarEscribiendo() {
        const indicador = document.getElementById("chatbotTyping");
        if (indicador) indicador.remove();
    }

    async function responderBot(html, tiempo = 450) {
        mostrarEscribiendo();
        await esperar(tiempo);
        eliminarEscribiendo();
        agregarMensajeBot(html);
    }

    function crearOpciones(opciones, claseExtra = "") {
        const contenedor = document.createElement("div");
        contenedor.className = `chatbot-options chatbot-message-enter ${claseExtra}`.trim();

        opciones.forEach(function (opcion) {
            const btn = document.createElement("button");
            btn.type = "button";
            btn.className = "chatbot-option";
            btn.innerHTML = opcion.html;
            btn.addEventListener("click", opcion.accion);
            contenedor.appendChild(btn);
        });

        cuerpo.appendChild(contenedor);
        scrollFinal();
        return contenedor;
    }

    async function mostrarMenuPrincipal() {
        datosChatbot = crearDatosVacios();
        pasoActual = "";
        cuerpo.innerHTML = "";

        await responderBot(`
            <p>¡Hola! 👋</p>
            <p>¿Cómo podemos ayudarte hoy?</p>
            <p>Puedes elegir una opción o contarnos directamente qué necesitas.</p>
        `, 300);

        crearOpciones([
            {
                html: '<i class="fa-solid fa-file-invoice-dollar"></i> Solicitar una cotización',
                accion: iniciarCotizacion
            },
            {
                html: '<i class="fa-solid fa-bolt"></i> Conocer nuestros servicios',
                accion: mostrarServicios
            },
            {
                html: '<i class="fa-solid fa-box-open"></i> Consultar un producto',
                accion: iniciarConsultaProducto
            },
            {
                html: '<i class="fa-brands fa-whatsapp"></i> Hablar por WhatsApp',
                accion: abrirWhatsAppGeneral
            }
        ]);
    }

    async function iniciarCotizacion() {
        retirarOpciones();
        agregarRespuestaUsuario("Solicitar una cotización");
        datosChatbot.tipoSolicitud = "Solicitar cotización";
        datosChatbot.servicio = "Servicio por definir";

        await responderBot(`
            <p><strong>Claro.</strong></p>
            <p>Cuéntanos brevemente qué servicio necesitas.</p>
            <p>Ejemplo: “Necesito mantenimiento para una subestación”.</p>
        `);

        pasoActual = "descripcionInicial";
        crearAreaEntrada("Escribe lo que necesitas", "text");
    }

    async function iniciarConsultaProducto() {
        retirarOpciones();
        agregarRespuestaUsuario("Consultar un producto");
        datosChatbot.tipoSolicitud = "Consultar producto";
        datosChatbot.servicio = "Producto eléctrico";

        await responderBot(`
            <p>Cuéntanos qué producto estás buscando y, si lo conoces, agrega capacidad, voltaje o cantidad.</p>
        `);

        pasoActual = "descripcionInicial";
        crearAreaEntrada("Ejemplo: transformador de 500 kVA", "text");
    }

    async function mostrarServicios() {
        retirarOpciones();
        agregarRespuestaUsuario("Conocer nuestros servicios");

        await responderBot("<p>Selecciona el servicio que deseas consultar:</p>");

        const servicios = [
            "Mantenimiento a subestaciones",
            "Pruebas eléctricas",
            "Pruebas VLF a cables",
            "Termografía infrarroja",
            "Calidad de energía",
            "Sistema de tierras y pararrayos",
            "Análisis de aceite dieléctrico",
            "Proyectos e instalaciones",
            "Otro servicio"
        ];

        crearOpciones(servicios.map(servicio => ({
            html: escaparHTML(servicio),
            accion: () => seleccionarServicio(servicio)
        })));
    }

    async function seleccionarServicio(servicio) {
        retirarOpciones();
        agregarRespuestaUsuario(servicio);
        datosChatbot.servicio = servicio === "Otro servicio" ? "Servicio por definir" : servicio;
        datosChatbot.tipoSolicitud = "Solicitar información";

        await responderBot(`
            <p>Podemos ayudarte con <strong>${escaparHTML(servicio)}</strong>.</p>
            <p>Cuéntanos brevemente qué necesitas para canalizar tu solicitud.</p>
        `);

        pasoActual = "descripcionInicial";
        crearAreaEntrada("Describe tu necesidad", "text");
    }

    function retirarOpciones() {
        cuerpo.querySelectorAll(".chatbot-options").forEach(el => el.remove());
    }

    function crearAreaEntrada(placeholder, tipo = "text", opcional = false) {
        eliminarAreaEntrada();

        const area = document.createElement("div");
        area.className = "chatbot-input-area chatbot-message-enter";
        area.innerHTML = `
            <input type="${tipo}" id="chatbotInput" placeholder="${escaparHTML(placeholder)}" autocomplete="off">
            <button type="button" id="chatbotSend" aria-label="Enviar respuesta">
                <i class="fa-solid fa-paper-plane"></i>
            </button>`;
        cuerpo.appendChild(area);

        if (opcional) {
            const omitir = document.createElement("button");
            omitir.type = "button";
            omitir.className = "chatbot-skip-button chatbot-message-enter";
            omitir.textContent = "Omitir";
            omitir.addEventListener("click", omitirPasoOpcional);
            cuerpo.appendChild(omitir);
        }

        const input = document.getElementById("chatbotInput");
        const enviar = document.getElementById("chatbotSend");
        enviar.addEventListener("click", procesarRespuesta);
        input.addEventListener("keydown", function (evento) {
            if (evento.key === "Enter") {
                evento.preventDefault();
                procesarRespuesta();
            }
        });
        input.focus();
        scrollFinal();
    }

    async function procesarRespuesta() {
        if (procesandoRespuesta) return;

        const input = document.getElementById("chatbotInput");
        if (!input) return;

        const valor = input.value.trim();
        if (!valor) {
            input.classList.add("input-error");
            input.focus();
            return;
        }

        if (pasoActual === "telefono" && !validarTelefono(valor)) {
            mostrarErrorCampo("Escribe un teléfono válido de 7 a 15 dígitos.");
            return;
        }

        if (pasoActual === "correo" && !validarCorreo(valor)) {
            mostrarErrorCampo("Escribe un correo válido o selecciona Omitir.");
            return;
        }

        procesandoRespuesta = true;

        try {
            agregarRespuestaUsuario(valor);

            if (pasoActual === "descripcionInicial") {
                datosChatbot.descripcion = valor;
                if (datosChatbot.servicio === "Servicio por definir") {
                    datosChatbot.servicio = valor;
                }
                await responderBot("<p>Perfecto. Para contactarte solo necesitamos unos datos rápidos.</p><p>¿Cuál es tu nombre?</p>");
                pasoActual = "nombre";
                crearAreaEntrada("Tu nombre", "text");
            } else if (pasoActual === "nombre") {
                datosChatbot.nombre = valor;
                await responderBot(`<p>Mucho gusto, <strong>${escaparHTML(obtenerPrimerNombre(valor))}</strong> 👋</p><p>¿Cuál es tu teléfono?</p>`);
                pasoActual = "telefono";
                crearAreaEntrada("Teléfono de contacto", "tel");
            } else if (pasoActual === "telefono") {
                datosChatbot.telefono = valor;
                await responderBot("<p>¿Cuál es tu correo electrónico?</p><p><small>Este dato es opcional.</small></p>");
                pasoActual = "correo";
                crearAreaEntrada("Correo electrónico (opcional)", "email", true);
            } else if (pasoActual === "correo") {
                datosChatbot.correo = valor;
                await solicitarEmpresaOpcional();
            } else if (pasoActual === "empresa") {
                datosChatbot.empresa = valor;
                pasoActual = "";
                await mostrarConfirmacionBreve();
            }
        } finally {
            procesandoRespuesta = false;
        }
    }

    async function omitirPasoOpcional() {
        if (procesandoRespuesta) return;
        procesandoRespuesta = true;
        eliminarAreaEntrada();
        agregarRespuestaUsuario("Omitir");

        try {
            if (pasoActual === "correo") {
                datosChatbot.correo = "";
                await solicitarEmpresaOpcional();
            } else if (pasoActual === "empresa") {
                datosChatbot.empresa = "";
                pasoActual = "";
                await mostrarConfirmacionBreve();
            }
        } finally {
            procesandoRespuesta = false;
        }
    }

    async function solicitarEmpresaOpcional() {
        await responderBot("<p>¿A qué empresa perteneces?</p><p><small>También puedes omitir este dato.</small></p>");
        pasoActual = "empresa";
        crearAreaEntrada("Nombre de la empresa (opcional)", "text", true);
    }

    async function mostrarConfirmacionBreve() {
        await responderBot(`
            <p><strong>Ya tenemos lo necesario.</strong></p>
            <p>Al enviar, tu solicitud llegará automáticamente al correo de SEESEL y después se abrirá WhatsApp con el mensaje preparado.</p>
        `);

        const botonEnviar = document.createElement("button");
        botonEnviar.type = "button";
        botonEnviar.className = "chatbot-start chatbot-message-enter";
        botonEnviar.id = "chatbotConfirmar";
        botonEnviar.innerHTML = `Enviar solicitud <i class="fa-brands fa-whatsapp"></i>`;
        botonEnviar.addEventListener("click", enviarSolicitud);
        cuerpo.appendChild(botonEnviar);
        scrollFinal();
    }

    function validarCorreo(correo) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(correo);
    }

    function validarTelefono(telefono) {
        const limpio = telefono.replace(/[\s()+-]/g, "");
        return /^[0-9]{7,15}$/.test(limpio);
    }

    function mostrarErrorCampo(mensaje) {
        const anterior = cuerpo.querySelector(".chatbot-field-error");
        if (anterior) anterior.remove();
        const error = document.createElement("p");
        error.className = "chatbot-field-error";
        error.textContent = mensaje;
        const area = cuerpo.querySelector(".chatbot-input-area");
        if (area) area.insertAdjacentElement("afterend", error);
        scrollFinal();
    }

    function crearProgresoEnvio() {
        const contenedor = document.createElement("div");
        contenedor.className = "chatbot-send-progress chatbot-message-enter";
        contenedor.id = "chatbotSendProgress";
        contenedor.innerHTML = `
            <div class="chatbot-send-icon"><i class="fa-solid fa-paper-plane"></i></div>
            <div class="chatbot-send-info">
                <div class="chatbot-send-header">
                    <span id="chatbotSendText">Preparando solicitud...</span>
                    <span id="chatbotSendPercent">0%</span>
                </div>
                <div class="chatbot-progress-track">
                    <div class="chatbot-progress-bar" id="chatbotProgressBar"></div>
                </div>
            </div>`;
        cuerpo.appendChild(contenedor);
        scrollFinal();
    }

    function actualizarProgresoEnvio(porcentaje, texto) {
        const barra = document.getElementById("chatbotProgressBar");
        const porcentajeTexto = document.getElementById("chatbotSendPercent");
        const estadoTexto = document.getElementById("chatbotSendText");
        if (barra) barra.style.width = `${porcentaje}%`;
        if (porcentajeTexto) porcentajeTexto.textContent = `${porcentaje}%`;
        if (estadoTexto) estadoTexto.textContent = texto;
    }

    function eliminarProgresoEnvio() {
        const progreso = document.getElementById("chatbotSendProgress");
        if (progreso) progreso.remove();
    }

    function construirMensajeWhatsApp() {
        const empresa = datosChatbot.empresa || "No proporcionada";
        const correo = datosChatbot.correo || "No proporcionado";

        return [
            "Hola, envío una solicitud desde el sitio web de SEESEL.",
            "",
            `Nombre: ${datosChatbot.nombre}`,
            `Empresa: ${empresa}`,
            `Teléfono: ${datosChatbot.telefono}`,
            `Correo: ${correo}`,
            `Tipo de solicitud: ${datosChatbot.tipoSolicitud}`,
            `Servicio: ${datosChatbot.servicio}`,
            "",
            "Solicitud:",
            datosChatbot.descripcion
        ].join("\n");
    }

    function construirUrlWhatsApp(mensaje) {
        return `https://wa.me/${WHATSAPP_SEESEL}?text=${encodeURIComponent(mensaje)}`;
    }

    async function enviarSolicitud() {
        const botonConfirmar = document.getElementById("chatbotConfirmar");
        if (!botonConfirmar || botonConfirmar.disabled) return;

        if (!/^\d{10,15}$/.test(WHATSAPP_SEESEL)) {
            await responderBot("<p>⚠️ Falta configurar el número de WhatsApp de SEESEL en el archivo JavaScript.</p>", 200);
            return;
        }

        /* Se abre una pestaña vacía desde el clic para evitar el bloqueo de ventanas emergentes. */
        const ventanaWhatsApp = window.open("about:blank", "_blank");

        botonConfirmar.disabled = true;
        botonConfirmar.style.display = "none";
        crearProgresoEnvio();
        actualizarProgresoEnvio(20, "Preparando información...");

        const formData = new FormData();
        Object.entries(datosChatbot).forEach(([clave, valor]) => formData.append(clave, valor));

        try {
            await esperar(300);
            actualizarProgresoEnvio(55, "Enviando al correo de SEESEL...");

            const respuesta = await fetch(RUTA_CONTROLADOR, {
                method: "POST",
                body: formData
            });

            const textoRespuesta = await respuesta.text();
            let data;
            try {
                data = JSON.parse(textoRespuesta);
            } catch {
                throw new Error("El servidor devolvió una respuesta no válida.");
            }

            if (!respuesta.ok || !data.success) {
                throw new Error(data.message || "No fue posible enviar la solicitud.");
            }

            actualizarProgresoEnvio(100, "Correo enviado. Abriendo WhatsApp...");
            await esperar(500);
            eliminarProgresoEnvio();

            const urlWhatsApp = construirUrlWhatsApp(construirMensajeWhatsApp());
            if (ventanaWhatsApp) {
                ventanaWhatsApp.location.href = urlWhatsApp;
            } else {
                window.location.href = urlWhatsApp;
            }

            await responderBot(`
                <p>✅ <strong>¡Listo, ${escaparHTML(obtenerPrimerNombre(datosChatbot.nombre))}!</strong></p>
                <p>Tu solicitud ya fue enviada al correo de SEESEL.</p>
                <p>WhatsApp se abrió con la información preparada; solo falta que presiones <strong>Enviar</strong>.</p>
            `, 250);

            mostrarBotonesFinales(urlWhatsApp);
        } catch (error) {
            if (ventanaWhatsApp && !ventanaWhatsApp.closed) ventanaWhatsApp.close();
            eliminarProgresoEnvio();
            botonConfirmar.disabled = false;
            botonConfirmar.style.display = "";
            botonConfirmar.innerHTML = `Intentar nuevamente <i class="fa-solid fa-rotate-right"></i>`;

            await responderBot(`
                <p>⚠️ <strong>No fue posible enviar la solicitud.</strong></p>
                <p>${escaparHTML(error.message)}</p>
                <p>Inténtalo nuevamente. WhatsApp se abrirá solo cuando el correo se haya enviado correctamente.</p>
            `, 250);
        }
    }

    function mostrarBotonesFinales(urlWhatsApp) {
        crearOpciones([
            {
                html: '<i class="fa-brands fa-whatsapp"></i> Abrir WhatsApp nuevamente',
                accion: () => window.open(urlWhatsApp, "_blank", "noopener,noreferrer")
            },
            {
                html: '<i class="fa-solid fa-house"></i> Nueva consulta',
                accion: mostrarMenuPrincipal
            }
        ]);
    }

    function abrirWhatsAppGeneral() {
        const mensaje = "Hola, visité el sitio web de SEESEL y deseo recibir atención de un asesor.";
        if (!/^\d{10,15}$/.test(WHATSAPP_SEESEL)) {
            responderBot("<p>⚠️ Falta configurar el número de WhatsApp de SEESEL.</p>", 150);
            return;
        }
        window.open(construirUrlWhatsApp(mensaje), "_blank", "noopener,noreferrer");
    }
});