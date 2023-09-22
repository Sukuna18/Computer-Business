import { Amis } from './amis';
import { Produits } from './produits';
import { RestResponse } from './rest-response';

export interface Succursale extends RestResponse<Succursale> {
  nom: string;
  adresse: string;
  telephone: string;
  produits: Produits[];
  amis: Amis[];
}
