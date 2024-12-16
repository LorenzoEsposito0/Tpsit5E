document.addEventListener("DOMContentLoaded", () => {
    fetch('jsonIndex.json')
        .then(response => {
            if (!response.ok) throw new Error('Errore nel caricamento del JSON');
            return response.json();
        })
        .then(data => {
            // Navbar
            const navbarLinks = document.querySelector('#mainNav .navbar-nav');
            data.navbar.links.forEach(link => {
                const li = document.createElement('li');
                li.className = 'nav-item';
                li.innerHTML = `
            <a class="nav-link ${link.active ? 'active' : ''}" href="${link.href}">${link.text}</a>
          `;
                navbarLinks.appendChild(li);
            });

            // Header
            const header = document.querySelector('header .container');
            header.innerHTML = `
          <h1 class="fw-bolder">${data.header.title}</h1>
          <p class="lead">${data.header.description}</p>
          <a href="${data.header.button.href}" class="btn btn-lg btn-light">${data.header.button.text}</a>
        `;

            // About Section
            const about = data.sections.find(section => section.id === 'about');
            const aboutSection = document.getElementById('about');
            aboutSection.innerHTML = `
          <div class="container px-4">
            <div class="row gx-4 justify-content-center align-items-center">
              <div class="col-lg-6">
                <h2>${about.title}</h2>
                <p class="lead">${about.description}</p>
              </div>
              <div class="col-lg-6">
                <img src="${about.image.src}" alt="${about.image.alt}" class="img-fluid img-client-server" style="border: 2px solid black; border-radius: 5px;">
              </div>
            </div>
          </div>
        `;

            // Services Section
            const services = data.sections.find(section => section.id === 'services');
            const servicesSection = document.getElementById('services');
            servicesSection.innerHTML = `
  <div class="container px-4">
    <div class="row gx-4 justify-content-center align-items-center">
      <div class="col-lg-6">
        <img src="${services.image.src}" alt="${services.image.alt}" class="img-fluid img-osi-model" style="border: 2px solid black; border-radius: 5px;">
      </div>
      <div class="col-lg-6">
        <h2>${services.title}</h2>
        <p class="lead">${services.description}</p>
        <ul>
          ${services.list.map(item => `<li>${item}</li>`).join('')}
        </ul>
      </div>
    </div>
  </div>
`;

            // TCP/UDP Section
            const tcpUdp = data.sections.find(section => section.id === 'tcp-udp');
            const tcpUdpSection = document.getElementById('tcp-udp');
            tcpUdpSection.innerHTML = `
          <div class="container px-4">
            <div class="row gx-4 justify-content-center">
              ${tcpUdp.cards.map(card => `
                <div class="col-lg-5 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">${card.title}</h5>
                      <p class="card-text">${card.description}</p>
                    </div>
                  </div>
                </div>
              `).join('')}
            </div>
          </div>
        `;

            // Footer
            const footer = document.querySelector('footer .container');
            footer.innerHTML = `
          <p class="m-0 text-center text-white">${data.footer.text}</p>
        `;
        })
        .catch(error => console.error('Errore nel caricamento del JSON:', error));
});




