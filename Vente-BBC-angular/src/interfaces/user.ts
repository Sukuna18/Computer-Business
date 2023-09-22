import { Amis } from "./amis";
import { Produits } from "./produits";
import { RestResponse } from "./rest-response";

export interface User extends RestResponse<User>{
    nom : string,
    telephone: string,
    poste : string,
    login : string,
    succursale : string,
    succursale_id : number,
    succursale_telephone : string,
    succursale_adresse: string ,
    produits: Produits[],
    amis: Amis[]
}