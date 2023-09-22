import { Injectable } from '@angular/core';
import { Succursale } from 'src/interfaces/succursale';
import { RestResponse } from 'src/interfaces/rest-response';
import { RequestSharedService } from './request-shared.service';

@Injectable({
  providedIn: 'root'
})
export class SuccursaleService extends RequestSharedService<RestResponse<Partial<Succursale>>> {
  override uri(): string {
    return 'succursales';
  }
}
