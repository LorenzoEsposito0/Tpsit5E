#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <float.h>
#include <ctype.h>

#define MAX 50
#define CONST 256

typedef enum
{
    Narrativa,
    Saggistica,
    Scienza,
    Arte,
    Romanzo, 
    CategoriaMax
} Categoria;

typedef struct
{
    char titolo[40];
    char autore[40];
    int annoPub;
    float prezzo;
    Categoria genere;
} Libro;

Libro libreria[MAX];

const char* categoriaToString[] = {"Narrativa", "Saggistica", "Scienza", "Arte", "Romanzo"};

Categoria stringToCategoria(const char* categoriaStr) 
{
    for (int i = 0; i < CategoriaMax; i++) 
    {
        if (strcasecmp(categoriaStr, categoriaToString[i]) == 0) 
        { // Usa strcasecmp per confronto case-insensitive, confronta due stringhe, qui in questo caso, confronta categoriaStr con categoria di string[i];
        //CategoraiStr è un puntatore a carattere, e io dalla funzione LeggiCsv gli passo il token, che è quello che va a leggere il file csv.
            return (Categoria)i;//ritorna Categoria di i in base a ciò che esce nel confronto, facendo un cast di i in modo che vada a prendere il numero corrispondente ai generi dell'enumeratore.
        }
    }
    // Se non viene trovata una corrispondenza, restituisce Narrativa come valore di default
    return Narrativa;
}

int leggiCSV(const char* nomeFile) 
{
    FILE* file = fopen(nomeFile, "r");
    if (file == NULL) 
    {
        printf("Errore nell'aprire il file.\n");
        exit(-1);
    }

    char buffer[CONST];
    int i = 0;

    fgets(buffer, sizeof(buffer), file);

    while (fgets(buffer, sizeof(buffer), file) && i < MAX) 
    {
        char* token = strtok(buffer, ","); //token ci permette di suddividere la stringa in parti, in questo caso, quando legge dal file, quando trova la virgola torna a capo.
        strcpy(libreria[i].titolo, token);

        token = strtok(NULL, ",");
        strcpy(libreria[i].autore, token);

        token = strtok(NULL, ",");
        libreria[i].annoPub = atoi(token);

        token = strtok(NULL, ",");
        libreria[i].prezzo = atof(token);

        token = strtok(NULL, ",");
        if (token != NULL) 
        {
            // Rimuovi i caratteri di nuova linea direttamente
            token[strcspn(token, "\r\n")] = 0;
            libreria[i].genere = stringToCategoria(token);
        } else 
        {
            libreria[i].genere = Narrativa; // Imposta valore di default se il token è NULL
        }

        i++;
    }

    fclose(file);
    return i;
}

void Stampa(const char *nomeFile)
{
    FILE* file = fopen(nomeFile, "r");
    if (file == NULL) 
    {
        printf("Errore nell'aprire il file.\n");
        exit(-1);
    }

    int numLibri = leggiCSV(nomeFile);

    if (numLibri > 0) 
    {
        for (int i = 0; i < numLibri; i++) 
        {
            printf("[Titolo]: %s - [Autore]: %s - [Anno]: %d - [Prezzo]: %.2f - [Categoria]: %s\n", libreria[i].titolo, libreria[i].autore, libreria[i].annoPub, libreria[i].prezzo, categoriaToString[libreria[i].genere]);
        }
    }
}

void RicercaLibroInBaseAlTitolo(const char *nomeFile, char stringa[], int lunghezzastring)
{
    int numLibri = leggiCSV(nomeFile);

    if(numLibri>0)
    {
        int trovato = 0;
        for(int i = 0; i < numLibri; i++)
        {
            if(strcmp(stringa, libreria[i].titolo) == 0)
            {
                printf("TITOLO TROVATO \n");
                printf("[Titolo]: %s - [Autore]: %s - [Anno]: %d - [Prezzo]: %.2f - [Categoria]: %s\n", libreria[i].titolo, libreria[i].autore, libreria[i].annoPub, libreria[i].prezzo, categoriaToString[libreria[i].genere]);
            }
        }
    }
}

/*
void StampaLibriPerCategoria(const char *nomeFile, char StringaCategoria[], int lunghezza)
{
    int numlibri = leggiCSV(nomeFile);
    printf("libri trovati: \n");
    if(numlibri > 0)
    {
        for(int i = 0; i < numlibri; i++)
        {
            if(StringaCategoria[lunghezza] == (Categoria)i)
            {
                printf("[Titolo]: %s - [Autore]: %s - [Anno]: %d - [Prezzo]: %.2f - [Categoria]: %s\n", libreria[i].titolo, libreria[i].autore, libreria[i].annoPub, libreria[i].prezzo, categoriaToString[libreria[i].genere]);
            }
        }
    }
}*/

void StampaLibriPerCategoria(const char *nomeFile, char StringaCategoria[], int lunghezza)
{
    int numlibri = leggiCSV(nomeFile);
    Categoria categoriaRicercata = stringToCategoria(StringaCategoria); // Converte la stringa in Categoria

    printf("Libri trovati nella categoria %s:\n", StringaCategoria);

    if(numlibri > 0)
    {
        int libriTrovati = 0; // Aggiunto per contare quanti libri trovati

        for(int i = 0; i < numlibri; i++)
        {
            if(libreria[i].genere == categoriaRicercata) // Confronta la categoria
            {
                printf("[Titolo]: %s - [Autore]: %s - [Anno]: %d - [Prezzo]: %.2f - [Categoria]: %s\n", 
                       libreria[i].titolo, 
                       libreria[i].autore, 
                       libreria[i].annoPub, 
                       libreria[i].prezzo, 
                       categoriaToString[libreria[i].genere]);
                libriTrovati++;
            }
        }

        if(libriTrovati == 0) // Se nessun libro è stato trovato
        {
            printf("Nessun libro trovato nella categoria %s.\n", StringaCategoria);
        }
    }
}


int main(int argc, char *argv[])
{
    int scelta ;
    do
    {
        printf("======LIBRERIA======\n");
        printf("[1] STAMPA LIBRERIA\n");
        printf("[2] RICERCA LIBRO IN BASE AL TITOLO\n");
        printf("[3] STAMPA LIBRI PER CATEGORIA\n");
        printf("[0] ESCI DALLA LIBRERIA\n");
        printf("INSERISCI UN OPZIONE:\n");
        scanf("%d", &scelta);
        switch (scelta)
        {
            case 1:
                Stampa(argv[1]);
                break;
            case 2:
            printf("inserisci il nome del titolo che vuoi ricercare \n");
            char string[20];
            scanf("%s", string);//
            RicercaLibroInBaseAlTitolo(argv[1], string, 20);
                break;
            case 3:
            printf("inserisci la categoria del libro che vuoi cercare \n");
            char stringaCategoria[50];
            scanf("%s",stringaCategoria);
            StampaLibriPerCategoria(argv[1], stringaCategoria, 20);
                break;
            case 0:
                printf("Sei uscito dal programma.\n");
                break;
            default:
                printf("Opzione non valida.\n");
        }

    } while(scelta != 0);

    return 0;
}