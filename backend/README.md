# Flower Studio – Back-end

## Descrierea proiectului

Flower Studio este o aplicație web destinată comercializării
florilor și buchetelor online, care permite clienților să
vizualizeze produsele, să plaseze comenzi și să personalizeze
propriile buchete.

## Tehnologii utilizate

- PHP
- MySQL
- Apache
- XAMPP
- HTML, CSS și JavaScript
- Git și GitHub

## Arhitectura back-end

Back-end-ul este organizat pe straturi:

- routes – definirea rutelor API;
- controllers – gestionarea cererilor și răspunsurilor HTTP;
- services – logica aplicației;
- repositories – accesul la date;
- config – configurarea aplicației;
- database – migrații și date de test.

## Instrucțiuni de pornire

1. Instalați XAMPP.
2. Plasați proiectul Flower-studio în folderul C:/xampp/htdocs/.
3. Copiați fișierul .env.example în .env.
4. Configurați variabilele de mediu.
5. Porniți Apache din XAMPP Control Panel.
6. Accesați adresa:

http://localhost/Flower-studio/backend/health

Răspunsul așteptat:

{"status":"ok"}

## Variabile de mediu

Configurarea aplicației este realizată prin fișierul .env.
Modelul de configurare este disponibil în .env.example.

Fișierul .env este exclus din Git prin .gitignore,
pentru a proteja informațiile de configurare.

## Endpoint-uri implementate

| Metodă | URL | Descriere | Cod HTTP |
|--------|-----|-----------|----------|
| GET | /health | Verificarea serverului | 200 |
| GET | /produse | Lista tuturor produselor | 200 |
| GET | /produse/1 | Produs existent după ID | 200 |
| GET | /produse/999 | Produs inexistent | 404 |

## Endpoint-uri planificate

| Metodă | URL | Utilizator | Descriere |
|--------|-----|------------|-----------|
| POST | /produse | Admin | Adăugare produs |
| PUT | /produse/:id | Admin | Editare produs |
| DELETE | /produse/:id | Admin | Ștergere produs |
| POST | /auth/register | Client | Înregistrare |
| POST | /auth/login | Client/Admin | Autentificare |
| GET | /comenzi | Admin | Lista comenzilor |
| POST | /comenzi | Client | Crearea unei comenzi |

## Testarea API

Endpoint-urile au fost testate utilizând curl:

curl.exe -i http://localhost/Flower-studio/backend/produse

curl.exe -i http://localhost/Flower-studio/backend/produse/1

curl.exe -i http://localhost/Flower-studio/backend/produse/999

Rezultatele testării:

- Lista produselor: 200 OK.
- Produs existent: 200 OK.
- Produs inexistent: 404 Not Found.

## Stadiul proiectului

Laboratorul 7.1 – Arhitectura back-end și primele endpoint-uri.

În această etapă sunt utilizate date mock.
Conectarea bazei de date reale va fi realizată
în cadrul Laboratorului 7.2.