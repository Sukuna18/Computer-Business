import { RestResponse } from "./rest-response";

export interface Commande extends RestResponse<Commande>{
    id: number,
    user_id: number,
    date_commande: string,
    produit_id: number,
    reduction: number,
    quantite: number,
    prix_vente: number,
    commande_id: number,
}