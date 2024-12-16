document.addEventListener("DOMContentLoaded", () => {
    fetch('jsonSocket.json')
        .then(response => {
            if (!response.ok) throw new Error('Errore nel caricamento del JSON');
            return response.json();
        })
        .then(data => {
            // Navbar
            const navbarBrand = document.querySelector('.navbar-brand');
            navbarBrand.textContent = data.navbar.brand;

            const navbarLinks = document.querySelector('#mainNav .navbar-nav');
            data.navbar.links.forEach(link => {
                const li = document.createElement('li');
                li.className = 'nav-item';
                li.innerHTML = `<a class="nav-link" href="${link.href}">${link.text}</a>`;
                navbarLinks.appendChild(li);
            });

            // Header
            const header = document.querySelector('header .container');
            header.innerHTML = `
                <h1 class="fw-bolder">${data.header.title}</h1>
                <p class="lead">${data.header.description}</p>
                <a class="btn btn-lg btn-light" href="${data.header.button.href}">${data.header.button.text}</a>
            `;

            // About Section
            const about = data.sections.find(section => section.id === 'about');
            const aboutSection = document.getElementById('about');
            aboutSection.innerHTML = `
                <div class="container px-4">
                    <h2 class="text-center">${about.title}</h2>
                    <p class="text-center mb-4">${about.description}</p>
                    <div class="row gx-5">
                        ${about.cards.map(card => `
                            <div class="col-lg-6">
                                <div class="card h-100 shadow">
                                    <div class="card-body">
                                        <h5 class="card-title">${card.title}</h5>
                                        <p class="card-text">${card.description}</p>
                                        <ul>
                                            ${card.list.map(item => `<li>${item}</li>`).join('')}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        `).join('')}
                    </div>
                </div>
            `;

            // Layout Section
            const layout = data.sections.find(section => section.id === 'layout');
            const layoutSection = document.getElementById('layout');
            layoutSection.innerHTML = `
                <div class="container px-4">
                    <h2 class="text-center">${layout.title}</h2>
                    <div class="row gx-5 align-items-center">
                        <div class="col-md-6">
                            <img src="${layout.image.src}" alt="${layout.image.alt}" class="img-fluid rounded">
                        </div>
                        <div class="col-md-6">
                            <p>${layout.description}</p>
                            <ol>
                                ${layout.list.map(item => `<li>${item}</li>`).join('')}
                            </ol>
                            <p>${layout.additionalText}</p>
                        </div>
                    </div>
                </div>
            `;

            // Footer
            const footer = document.querySelector('footer .container');
            footer.innerHTML = `<p>${data.footer.text}</p>`;
        })
        .catch(error => console.error('Errore nel caricamento del JSON:', error));
});
