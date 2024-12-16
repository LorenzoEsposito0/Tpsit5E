// Funzione per caricare il file JSON
fetch('jsonisoosi.json')
    .then(response => response.json())
    .then(data => {
        populateNavbar(data.navbar);
        populateHeader(data.title);
        populateImage(data.image);
        populateAccordion(data.levels);
        populateFooter(data.footer);
    })
    .catch(error => console.error('Errore nel caricamento del JSON:', error));

// Popola la navbar
function populateNavbar(navItems) {
    const navbar = document.querySelector('ul.navbar-nav');
    navbar.innerHTML = '';
    navItems.forEach(item => {
        const li = document.createElement('li');
        li.className = 'nav-item';
        li.innerHTML = `<a class="nav-link" href="${item.link}">${item.name}</a>`;
        navbar.appendChild(li);
    });
}

// Popola il titolo dell'intestazione
function populateHeader(title) {
    const header = document.querySelector('header .fw-bolder');
    header.textContent = title;
}

// Popola l'immagine della sezione principale
function populateImage(imageData) {
    const img = document.querySelector('.osi-image');
    img.src = imageData.src;
    img.alt = imageData.alt;
}

// Popola l'accordion con i livelli ISO/OSI
function populateAccordion(levels) {
    const accordion = document.getElementById('osiAccordion');
    accordion.innerHTML = ''; // Resetta il contenuto precedente

    levels.forEach((level, index) => {
        const accordionItem = document.createElement('div');
        accordionItem.className = 'accordion-item';

        accordionItem.innerHTML = `
            <h2 class="accordion-header" id="heading${index}">
                <button class="accordion-button ${index === 0 ? '' : 'collapsed'}" type="button" 
                        data-bs-toggle="collapse" data-bs-target="#collapse${index}" 
                        aria-expanded="${index === 0}" aria-controls="collapse${index}">
                    ${level.title}
                </button>
            </h2>
            <div id="collapse${index}" class="accordion-collapse collapse ${index === 0 ? 'show' : ''}" 
                 aria-labelledby="heading${index}" data-bs-parent="#osiAccordion">
                <div class="accordion-body">
                    ${level.description}
                </div>
            </div>
        `;

        accordion.appendChild(accordionItem);
    });
}

// Popola il footer
function populateFooter(footerText) {
    const footer = document.querySelector('footer p');
    footer.textContent = footerText;
}