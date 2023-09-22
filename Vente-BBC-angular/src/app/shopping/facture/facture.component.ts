import { AfterViewInit, Component, ElementRef, OnInit, ViewChild } from '@angular/core';
import { CommunicationService } from 'src/app/Service/communication.service';
import { Produits } from 'src/interfaces/produits';
import { User } from 'src/interfaces/user';

@Component({
  selector: 'app-facture',
  templateUrl: './facture.component.html',
})
export class FactureComponent implements OnInit, AfterViewInit{
  @ViewChild('factureContent', { static: false }) factureContent!: ElementRef;
  data: any = [];
  total: number = 0;
  date = new Date();
  userData: User | undefined;
  constructor(private communicationService: CommunicationService) {}
ngOnInit(): void {
  this.communicationService.productSubject.subscribe((data:Produits) => {
    this.data = data;    
  }
  );
  this.communicationService.totalSubject.subscribe((data:number) => {
    this.total = data;
  }
  );
  this.communicationService.allData.subscribe((data:User) => {
    this.userData = data;
  }
  );
}
ngAfterViewInit(): void {
  this.communicationService.SendNotification(this.factureContent?.nativeElement);
}
}
