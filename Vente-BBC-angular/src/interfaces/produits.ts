import { Caractesristique } from "./caracteristique";
import { RestResponse } from "./rest-response";

export interface Produits extends RestResponse<Produits>{
        image: string;
        prix: number;
        prix_gros: number;
        quantite: number;
        code_barre: string;
        caracteristiques: Caractesristique[];
        quantiteSelectionnee: number;
}