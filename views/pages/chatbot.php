<!-- CHATBOT SEESEL -->
<div class="seesel-chatbot">

    <button
    type="button"
    class="chatbot-toggle"
    id="chatbotToggle"
    aria-label="Abrir asistente SEESEL"
>

    <img
        src="public/img/Avatar.png"
        alt="Asistente SEESEL"
        class="chatbot-avatar-btn"
    >

</button>

    <div class="chatbot-window" id="chatbotWindow">

        <div class="chatbot-header">

            <!-- Efectos decorativos -->
            <span class="chatbot-header-glow glow-one"></span>
            <span class="chatbot-header-glow glow-two"></span>
            <span class="chatbot-header-line"></span>

            <div class="chatbot-info">

                <div class="chatbot-avatar">

                    <div class="chatbot-avatar-ring"></div>

                    <div class="chatbot-avatar-icon">

                        <img
                            src="public/img/Avatar.png"
                            alt="Asistente SEESEL"
                            class="chatbot-header-avatar"
                        >

                    </div>

                    <span class="chatbot-avatar-status"></span>

                </div>

                <div class="chatbot-header-text">

                    <span class="chatbot-header-label">
                        Asistente virtual
                    </span>

                    <h4>Asistente SEESEL</h4>

                    <div class="chatbot-status">
                        <span class="chatbot-status-dot"></span>
                        <span>En línea</span>
                    </div>

                </div>

            </div>

            <button
                type="button"
                class="chatbot-close"
                id="chatbotClose"
                aria-label="Cerrar chatbot"
            >
                <i class="fa-solid fa-xmark"></i>
            </button>

        </div>


        <div class="chatbot-body" id="chatbotBody">

            <div class="bot-message chatbot-message-enter" id="chatbotWelcomeMessage">
                <p>
                    <span id="chatbotGreetingIcon">👋</span>
                    <strong id="chatbotGreetingText">Hola</strong>
                </p>

                <p>
                    Bienvenido a
                    <strong>Servicios Especiales Eléctricos (SEESEL)</strong>.
                </p>

                <p>
                    Soy tu asistente virtual y estoy listo para ayudarte
                    a solicitar información sobre nuestros servicios.
                </p>
            </div>

           <button class="chatbot-start" id="chatbotStart">
                Comenzar
                <i class="fa-solid fa-arrow-right"></i>
            </button>

        </div>

    </div>
</div>


