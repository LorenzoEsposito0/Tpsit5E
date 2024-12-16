// Caricamento del file JSON e generazione dinamica del contenuto
fetch('jsonGlossario.json')
    .then(response => response.json())
    .then(data => {
        // Popolazione del titolo della pagina
        document.title = data.title;

        // Creazione della navbar
        const navbar = document.querySelector('.navbar-nav');
        data.navbar.forEach(item => {
            const li = document.createElement('li');
            li.classList.add('nav-item');
            li.innerHTML = `<a class="nav-link" href="${item.link}">${item.name}</a>`;
            navbar.appendChild(li);
        });

        // Creazione delle card
        const container = document.querySelector('.container.mt-5 .row');
        data.cards.forEach(card => {
            const col = document.createElement('div');
            col.classList.add('col-md-4');
            col.innerHTML = `
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">${card.title}</h5>
                        <p class="card-text">${card.description}</p>
                    </div>
                </div>
            `;
            container.appendChild(col);
        });

        // Aggiunta del footer
        const footer = document.querySelector('footer .container p');
        footer.textContent = data.footer;
    })
    .catch(error => console.error('Errore durante il caricamento del file JSON:', error));
