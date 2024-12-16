// Funzione per caricare i dati dal file JSON e popolare la pagina
document.addEventListener("DOMContentLoaded", function() {
    fetch("jsonTcpUdp.json")
    .then(response => response.json())
    .then(data => {
        // Popolare il titolo della pagina
        document.title = data.title;
        
        // Popolare la sezione Navbar
        let navbar = document.querySelector('nav .navbar-nav');
        data.navbar.forEach(item => {
            let navItem = document.createElement('li');
            navItem.classList.add('nav-item');
            navItem.innerHTML = `<a class="nav-link" href="${item.link}">${item.name}</a>`;
            navbar.appendChild(navItem);
        });
        
        // Popolare le informazioni su TCP
        document.querySelector('#tcpudp h2').innerText = 'Differenza tra TCP e UDP';
        document.querySelector('.card-title').innerText = data.tcp.title;
        document.querySelector('.card-text').innerText = data.tcp.description;

        // Popolare le informazioni su UDP
        document.querySelectorAll('.card-title')[1].innerText = data.udp.title;
        document.querySelectorAll('.card-text')[1].innerText = data.udp.description;

        // Popolare le fasi del Three-Way Handshake
        let accordion = document.querySelector('#handshakeAccordion');
        data.handshake.steps.forEach((step, index) => {
            let accordionItem = document.createElement('div');
            accordionItem.classList.add('card');
            accordionItem.innerHTML = `
                <div class="card-header" id="heading${index + 1}">
                    <h2 class="mb-0">
                        <button class="btn btn-link ${index === 0 ? '' : 'collapsed'}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${index + 1}" aria-expanded="${index === 0 ? 'true' : 'false'}" aria-controls="collapse${index + 1}">
                            ${step.title}
                        </button>
                    </h2>
                </div>
                <div id="collapse${index + 1}" class="collapse ${index === 0 ? 'show' : ''}" aria-labelledby="heading${index + 1}" data-bs-parent="#handshakeAccordion">
                    <div class="card-body">
                        ${step.description}
                    </div>
                </div>
            `;
            accordion.appendChild(accordionItem);
        });

        // Popolare il footer
        document.querySelector('footer p').innerText = data.footer;
    })
    .catch(error => {
        console.error('Errore nel caricare il file JSON:', error);
    });
});
