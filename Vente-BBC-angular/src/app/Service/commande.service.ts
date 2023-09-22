import { Injectable } from '@angular/core';
import { RequestSharedService } from './request-shared.service';
import { RestResponse } from 'src/interfaces/rest-response';
import { Commande } from 'src/interfaces/commande';

@Injectable({
  providedIn: 'root'
})
export class CommandeService extends RequestSharedService<RestResponse<Partial<Commande>>>  {
  override uri(): string {
    return 'commandes';
  }
}
