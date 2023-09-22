import { Injectable } from '@angular/core';
import { RestResponse } from 'src/interfaces/rest-response';
import { Succursale } from 'src/interfaces/succursale';
import { RequestSharedService } from './request-shared.service';

@Injectable({
  providedIn: 'root'
})
export class UserService extends RequestSharedService<RestResponse<Partial<Succursale>>> {
  override uri(): string {
    return 'user';
  }


}
