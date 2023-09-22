import { Component, OnInit } from '@angular/core';
import { Produits } from 'src/interfaces/produits';
import { CommunicationService } from '../Service/communication.service';

@Component({
  selector: 'app-liste',
  templateUrl: './liste.component.html',
  styleUrls: ['./liste.component.css']
})
export class ListeComponent implements OnInit {
  products:any = [];
  searchResult: Produits[] = [];
  total: number = 0;
  reduction: number = 0;
  ngOnInit(): void {
    this.products = JSON.parse(localStorage.getItem('products') || '[]');
    this.calculTotal();
    this.communicationService.productSubject.subscribe((data:any) => {
      this.products = data;
      console.log(this.products);
      this.calculTotal();
    }
    );
    this.communicationService.reductionSubject.subscribe((data:any) => {
      this.reduction = data;
      console.log(this.reduction);
      this.calculTotal();
    }
    );
  }
  constructor(private communicationService:CommunicationService) {}
  deleteProduct(id: number) {
    const indexOfDeletedProduct = this.products.findIndex(
      (product:any) => product.id === id
    );
    if (indexOfDeletedProduct !== -1) {
      const deletedProduct = this.products.splice(indexOfDeletedProduct, 1)[0];
      this.searchResult.push(deletedProduct);
    }
    this.calculTotal();

  }
  
  calculTotal() {
    if (this.reduction <= 0) {
      this.total = this.products.reduce((acc: number, product: { prix: number; quantiteSelectionnee: number; }) => {
        return acc + product.prix * product.quantiteSelectionnee;
      }, 0);
    } else {
      const subTotal = this.products.reduce((acc: number, product: { prix: number; quantiteSelectionnee: number; }) => {
        return acc + product.prix * product.quantiteSelectionnee;
      }, 0);
      this.total = subTotal - (subTotal * this.reduction / 100);
    }
    this.communicationService.SendTotal(this.total);
  }

  updateQuantity(event: any, index: number) {
    if(event.target.value < 1) event.target.value = 1;
    if(event.target.value > this.products[index].quantite) event.target.value = this.products[index].quantite;
    const newQuantity = Number(event.target.value);
    this.products[index].quantiteSelectionnee = newQuantity;
    this.calculTotal();
  }  
}
