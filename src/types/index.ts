
export interface Utilizator {
    id_utilizator: number;
    nume: string;
    prenume: string;
    email: string;
    parola_hash: string;
    telefon: string | null;
    adresa: string | null;
    rol: "client" | "admin";
    data_inregistrare: string;
    activ: boolean;
}

export interface Categorie {
    id_categorie: number;
    denumire: string;
    descriere: string | null;
    imagine: string | null;
    activa: boolean;
}

export interface Produs {
    id_produs: number;
    id_categorie: number;
    id_ambalaj: number | null;
    id_panglica: number | null;
    denumire: string;
    descriere: string;
    pret_lei: number;
    imagine: string;
    culoare: string | null;
    ocazie: string | null;
    stoc: number;
    recomandat: boolean;
    activ: boolean;
    data_adaugare: string;
}

export interface Floare {
    id_floare: number;
    id_furnizor: number | null;
    denumire: string;
    culoare: string;
    pret_fir: number;
    stoc: number;
    stoc_minim: number;
    imagine: string;
    descriere: string | null;
    sezon: string | null;
    activa: boolean;
}

export interface Ambalaj {
    id_ambalaj: number;
    denumire: string;
    material: string;
    culoare: string;
    cod_culoare: string | null;
    pret: number;
    stoc: number;
    imagine: string | null;
    activ: boolean;
}

export interface Panglica {
    id_panglica: number;
    denumire: string;
    material: string;
    culoare: string;
    cod_culoare: string | null;
    pret: number;
    stoc: number;
    imagine: string | null;
    activa: boolean;
}

export interface Accesoriu {
    id_accesoriu: number;
    denumire: string;
    tip: string;
    descriere: string | null;
    pret: number;
    stoc: number;
    imagine: string | null;
    activ: boolean;
}

export interface ComponentaProdus {
    id_componenta: number;
    id_produs: number;
    id_floare: number;
    cantitate: number;
}

export interface BuchetPersonalizat {
    id_buchet: number;
    id_utilizator: number;
    id_ambalaj: number | null;
    id_panglica: number | null;
    denumire: string;
    stil: string;
    pret_ambalaj: number;
    pret_panglica: number;
    pret_manopera: number;
    pret_total: number;
    mesaj_felicitare: string | null;
    instructiuni_speciale: string | null;
    imagine_previzualizare: string | null;
    data_creare: string;
    statut: "ciorna" | "finalizat" | "comandat";
}

export interface ComponentaBuchet {
    id_componenta: number;
    id_buchet: number;
    id_floare: number;
    cantitate: number;
    pret_unitar: number;
}

export interface AccesoriuBuchet {
    id_buchet_accesoriu: number;
    id_buchet: number;
    id_accesoriu: number;
    cantitate: number;
    pret_unitar: number;
}

export interface Cos {
    id_cos: number;
    id_utilizator: number;
    data_creare: string;
    data_actualizare: string;
    statut: "activ" | "finalizat" | "abandonat";
}

export interface ArticolCos {
    id_articol_cos: number;
    id_cos: number;
    id_produs: number | null;
    id_buchet: number | null;
    cantitate: number;
    pret_unitar: number;
    data_adaugare: string;
}

export interface Comanda {
    id_comanda: number;
    id_utilizator: number;
    data_comanda: string;
    subtotal: number;
    cost_livrare: number;
    reducere: number;
    pret_total: number;
    metoda_plata: string;
    statut_plata: string;
    statut_comanda: string;
    observatii: string | null;
}

export interface ArticolComanda {
    id_articol_comanda: number;
    id_comanda: number;
    id_produs: number | null;
    id_buchet: number | null;
    denumire_articol: string;
    cantitate: number;
    pret_unitar: number;
    subtotal: number;
}

export interface Livrare {
    id_livrare: number;
    id_comanda: number;
    nume_destinatar: string;
    telefon_destinatar: string;
    localitate: string;
    adresa_livrare: string;
    data_livrare: string;
    ora_inceput: string;
    ora_sfarsit: string;
    instructiuni_livrare: string | null;
    statut_livrare: string;
    data_livrare_efectiva: string | null;
}

export interface Favorite {
    id_favorit: number;
    id_utilizator: number;
    id_produs: number;
    data_adaugare: string;
}

export interface Recenzie {
    id_recenzie: number;
    id_utilizator: number;
    id_produs: number;
    evaluare: 1 | 2 | 3 | 4 | 5;
    comentariu: string | null;
    data_recenzie: string;
    aprobata: boolean;
}

export interface Furnizor {
    id_furnizor: number;
    denumire: string;
    persoana_contact: string | null;
    telefon: string;
    email: string | null;
    adresa: string | null;
    activ: boolean;
}

export interface MiscareStoc {
    id_miscare: number;
    id_floare: number | null;
    id_ambalaj: number | null;
    id_panglica: number | null;
    id_accesoriu: number | null;
    id_produs: number | null;
    id_furnizor: number | null;
    id_comanda: number | null;
    tip_miscare: "intrare" | "iesire" | "deteriorare" | "corectie";
    cantitate: number;
    data_miscare: string;
    motiv: string | null;
}

export interface Promotie {
    id_promotie: number;
    id_produs: number;
    denumire: string;
    reducere_procent: number;
    data_inceput: string;
    data_sfarsit: string;
    activa: boolean;
}
