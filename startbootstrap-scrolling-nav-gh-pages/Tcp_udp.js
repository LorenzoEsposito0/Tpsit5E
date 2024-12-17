// Carica dinamicamente il contenuto della pagina utilizzando il file JSON
document.addEventListener("DOMContentLoaded", function () {
    fetch("jsonTcpUdp.json")
        .then((response) => response.json())
        .then((data) => {
            populateNavbar(data.navbar);
            populateHandshakeAccordion(data.handshakeSteps);
            populateFooter(data.footerText);
        })
        .catch((error) => console.error("Errore nel caricamento del file JSON:", error));
});

// Popola la barra di navigazione dinamicamente
function populateNavbar(navItems) {
    const navbarList = document.getElementById("navbarList");
    navItems.forEach((item) => {
        const li = document.createElement("li");
        li.classList.add("nav-item");
        li.innerHTML = `
            <a class="nav-link" href="${item.link}">${item.name}</a>
        `;
        navbarList.appendChild(li);
    });
}

// Popola l'accordion con i passi del Three-Way Handshake
function populateHandshakeAccordion(steps) {
    const accordion = document.getElementById("handshakeAccordion");
    steps.forEach((step, index) => {
        const collapseId = `collapse${index}`;
        const isFirst = index === 0 ? "show" : ""; // Mostra il primo elemento di default
        const stepHtml = `
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading${index}">
                    <button class="accordion-button ${isFirst ? '' : 'collapsed'}" type="button" data-bs-toggle="collapse" data-bs-target="#${collapseId}" aria-expanded="true" aria-controls="${collapseId}">
                        ${step.title}
                    </button>
                </h2>
                <div id="${collapseId}" class="accordion-collapse collapse ${isFirst}" aria-labelledby="heading${index}" data-bs-parent="#handshakeAccordion">
                    <div class="accordion-body">
                        ${step.description}
                    </div>
                </div>
            </div>
        `;
        accordion.innerHTML += stepHtml;
    });
}

// Popola il testo del footer
function populateFooter(text) {
    const footerText = document.getElementById("footerText");
    footerText.textContent = text;
}
