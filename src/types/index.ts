// Utilizator al aplicației
export interface Utilizator {
  id_user: number;
  nume: string;
  email: string;
  parola: string; // Hash-ul parolei, niciodată parola în clar
  telefon: string;
  adresa: string;
  rol: "client" | "administrator";
}

// Categorie de flori sau buchete
export interface Categorie {
  id_categorie: number;
  nume: string;
}

// Produs disponibil în florărie
export interface Produs {
  id_produs: number;
  id_categorie: number;
  denumire: string;
  descriere: string;
  pret_lei: number;
  stoc: number;
  imagine: string;
}

// Comandă plasată de un client
export interface Comanda {
  id_comanda: number;
  id_client: number;
  data: string;
  status: "noua" | "pregatire" | "livrare" | "finalizata";
  total: number;
  adresa_livrare: string;
}

// Produs inclus într-o comandă
export interface ProdusComanda {
  id: number;
  id_comanda: number;
  id_produs: number;
  cantitate: number;
  pret: number;
}

// Livrarea unei comenzi
export interface Livrare {
  id_livrare: number;
  id_comanda: number;
  data_livrare: string;
  status: "programata" | "in_livrare" | "livrata";
  angajat: string;
}