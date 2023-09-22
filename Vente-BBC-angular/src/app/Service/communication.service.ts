import { Injectable } from '@angular/core';
import { Subject } from 'rxjs';
import { Produits } from 'src/interfaces/produits';
import { User } from 'src/interfaces/user';

@Injectable({
  providedIn: 'root',
})
export class CommunicationService {
  public notificationSubject:Subject<any> = new Subject<any>()
  public productSubject: Subject<Produits> = new Subject<Produits>()
  public totalSubject: Subject<number> = new Subject<number>()
  public reductionSubject: Subject<number> = new Subject<number>()
  public allData: Subject<User> = new Subject<User>()

  SendNotification(data:any){
    this.notificationSubject.next(data);
  }
  SendProduct(data:any){
    this.productSubject.next(data);
  }
  SendTotal(data:number){
    this.totalSubject.next(data);
  }
  SendReduction(data:number){
    this.reductionSubject.next(data);
  }
  SendAllData(data:User){
    this.allData.next(data);
  }
}
