// Il tuo JSON
const data = {
    "doctype": "html",
    "lang": "en",
    "head": {
      "title": "Scrolling Nav - Start Bootstrap Template",
      "favicon": { "type": "image/x-icon", "href": "assets/favicon.ico" }
    },
    "body": {
      "sections": [
        {
          "type": "header",
          "content": {
            "container": {
              "title": "Spiegazione delle socket",
              "description": "Breve spiegazione e introduzione al sito"
            }
          }
        }
      ]
    }
  };
  
  // Esempio: Popola l'header con JavaScript
  document.addEventListener("DOMContentLoaded", () => {
    const header = data.body.sections.find(section => section.type === "header").content.container;
    
    const headerElement = document.querySelector('header .container');
    headerElement.innerHTML = `
      <h1>${header.title}</h1>
      <p>${header.description}</p>
    `;
  });