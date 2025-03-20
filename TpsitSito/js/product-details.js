const products = [
    { 
        id: 1, 
        name: "Felpa Nike Rossa", 
        price: 60.00, 
        image: "../Img/FelpaNikeRossa.webp",
        description: "Felpa Nike rossa in cotone di alta qualità. Perfetta per chi cerca comfort e stile, con un taglio sportivo che si adatta sia all'uso quotidiano che agli allenamenti. Dotata di un cappuccio regolabile e tasca a marsupio, questa felpa offre un'ottima vestibilità e resistenza nel tempo." 
    },
    { 
        id: 2, 
        name: "Felpa Nike Nera", 
        price: 60.00, 
        image: "../img/FelpaNera.webp",
        description: "Felpa Nike nera con cappuccio e logo stampato. Realizzata in tessuto morbido e traspirante, garantisce calore e comfort in qualsiasi situazione. Il design essenziale con logo frontale la rende un capo versatile, ideale per un look sportivo e casual." 
    },
    { 
        id: 3, 
        name: "Felpa Nike Blu", 
        price: 55.00, 
        image: "../Img/FelpaNike.webp",
        description: "Felpa Nike blu, perfetta per lo sport e il tempo libero. Il tessuto felpato interno offre un'ottima protezione dal freddo, mentre la vestibilità comoda permette libertà di movimento. Un capo indispensabile per chi vuole combinare stile e praticità." 
    },
    { 
        id: 4, 
        name: "Felpa Nike Verde", 
        price: 70.00, 
        image: "../Img/FelpaNikeVerde.webp",
        description: "Felpa Nike verde con vestibilità comoda e moderna. Ideale per chi cerca un look sportivo e dinamico, è dotata di polsini e orlo elasticizzati per un fit aderente e confortevole. Il tessuto tecnico assicura traspirabilità e resistenza all'usura." 
    },
    { 
        id: 5, 
        name: "Pantaloni Nike Neri", 
        price: 50.00, 
        image: "../Img/PantaloniNikeNeri.webp",
        description: "Pantaloni sportivi Nike neri in tessuto traspirante. Il modello slim-fit con fascia elastica in vita garantisce un'ottima vestibilità, mentre il tessuto Dri-FIT assorbe il sudore per mantenerti asciutto e comodo durante l'attività fisica." 
    },
    { 
        id: 6, 
        name: "Pantaloni Nike Grigi", 
        price: 45.00, 
        image: "../Img/PantaloniNikeGrigi.webp",
        description: "Pantaloni Nike grigi con elastico regolabile. Realizzati con materiali resistenti, offrono il massimo comfort grazie alla vestibilità rilassata e alla presenza di tasche laterali. Ideali per l'allenamento o per un outfit casual." 
    },
    { 
        id: 7, 
        name: "Nike Tech Pantaloni", 
        price: 80.00, 
        image: "../Img/PantaloniNikeBlu.webp",
        description: "Pantaloni Nike Tech in materiale tecnico avanzato. Studiati per garantire il massimo della performance, sono dotati di cuciture ergonomiche e tessuto elasticizzato per una libertà di movimento ottimale. Perfetti per attività sportive e outdoor." 
    },
    { 
        id: 8, 
        name: "Nike AF1", 
        price: 100.00, 
        image: "../Img/Nikeaf1.webp",
        description: "Scarpe Nike Air Force 1, icona senza tempo. Con la loro suola ammortizzata e il design classico, queste sneakers sono un must-have per gli appassionati di streetwear. La tomaia in pelle offre resistenza e stile senza tempo." 
    },
    { 
        id: 9, 
        name: "Nike ZM", 
        price: 110.00, 
        image: "../Img/Niketn.webp",
        description: "Scarpe Nike ZM con design futuristico. Progettate per garantire il massimo comfort e supporto grazie alla tecnologia Zoom Air, sono perfette per chi cerca un look audace e prestazioni elevate nelle attività sportive." 
    },
    { 
        id: 10, 
        name: "Calze Nike",
        price: 15.00,
        image: "../Img/CalzeNike.webp",
        description:" Set di tre paia di calze Nike nere realizzate in cotone morbido e traspirante, con supporto per l'arco plantare per un comfort duraturo. Il design a mezza altezza con il classico logo Nike ricamato le rende perfette per ogni occasione, dallo sport al tempo libero."
    },
    { 
        id: 11, 
        name: "3 Mutande Nike",
        price:30.00,
        image: "../Img/Mutande.webp" ,
        description:"Un set di tre boxer Nike Pro realizzati in tessuto elasticizzato e traspirante per offrire massimo comfort e libertà di movimento. La fascia elastica in vita con logo Nike garantisce una vestibilità aderente e sicura, ideale per l'attività sportiva e l'uso quotidiano."
    },
    { 
        id: 12,
        name: "Nike Mercurial blu", 
        price:180.00, 
        image: "../Img/NikeMercurialBlu.webp",
        description:"Le Nike Phantom GX Elite FG sono pensate per i giocatori creativi che amano avere un controllo eccezionale sul pallone. La tomaia è realizzata in Nike Gripknit, un materiale innovativo che offre un tocco superiore e una maggiore aderenza sulla palla, anche in condizioni di umidità. Il sistema di allacciatura asimmetrico permette una superficie di contatto più ampia, ideale per passaggi precisi e tiri potenti. La struttura flessibile avvolge il piede per una sensazione di seconda pelle, mentre la suola con tacchetti Tri-Star ottimizza la trazione su campi in erba naturale. Il colore azzurro elettrico con dettagli bianchi dona un aspetto elegante e accattivante, perfetto per chi vuole distinguersi in campo."
    },
    { 
        id: 13, 
        name: "Nike Mercurial bianche", 
        price:180.00, 
        image: "../Img/NikeMercurialBianche.webp",
        description:"Le Nike Mercurial Superfly 9 Elite FG sono progettate per i giocatori più veloci in campo. La tomaia in Flyknit ultraleggero offre una calzata aderente e un comfort superiore, mentre il sistema di allacciatura dinamico assicura un supporto perfetto per movimenti rapidi e scatti improvvisi. La tecnologia Zoom Air unit integrata nella suola permette un'ammortizzazione reattiva, offrendo una spinta esplosiva ad ogni passo. Il design aerodinamico, con il classico Swoosh in nero e dettagli arancioni vivaci, garantisce un look aggressivo e moderno. La suola con tacchetti FG (Firm Ground) è ideale per campi in erba naturale asciutti, offrendo un grip eccezionale e un'aderenza perfetta anche nei cambi di direzione più bruschi."
    },
    { 
        id: 14, 
        name: "Nike Mercurial rosse", 
        price:250.00, 
        image: "../Img/Toni.webp",
        description:"Le Nike Tiempo Legend 10 Elite FG sono progettate per chi cerca comfort e precisione. La tomaia è realizzata in FlyTouch Plus, un materiale più morbido e leggero rispetto alla pelle tradizionale, che si adatta perfettamente alla forma del piede senza perdere struttura nel tempo. Il cuscinetto in schiuma interna assicura un controllo eccezionale sulla palla, mentre la linguetta in mesh traspirante migliora la ventilazione. La suola con piatto Hyperstability e tacchetti conici offre un'ottima combinazione di stabilità e agilità nei movimenti. Il design iridescente verde acqua con Swoosh bianco e dettagli dorati rende queste scarpe un must-have per chi vuole unire prestazioni e stile in campo."
    },
];

// Funzione per caricare i dettagli del prodotto
function loadProductDetails() {
    const params = new URLSearchParams(window.location.search);
    const productId = parseInt(params.get("id"));
    const product = products.find(p => p.id === productId);

    if (product) {
        document.getElementById("product-name").innerText = product.name;
        document.getElementById("product-image").src = product.image;
        document.getElementById("product-price").innerText =  product.price + "€";
        document.getElementById("product-description").innerText = product.description;

    } else {
        document.querySelector(".container").innerHTML = "<h1>Prodotto non trovato</h1>";
    }
}

// Caricare i dettagli quando la pagina è caricata
document.addEventListener("DOMContentLoaded", loadProductDetails);