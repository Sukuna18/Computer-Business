import { Produits } from "./produits";
import { RestResponse } from "./rest-response";

export interface Amis extends RestResponse<Amis>{
    nom: string;
    adresse: string;
    telephone: string;
    produits: Produits[];
}