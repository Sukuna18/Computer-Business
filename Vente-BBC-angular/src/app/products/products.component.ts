import { Component, OnInit } from '@angular/core';
import { SuccursaleService } from '../Service/succursale.service';
import { Succursale } from 'src/interfaces/succursale';
import { Amis } from 'src/interfaces/amis';
import { Caractesristique } from 'src/interfaces/caracteristique';
import { Produits } from 'src/interfaces/produits';
import { CommunicationService } from '../Service/communication.service';
import { UserService } from '../Service/user.service';
import { User } from 'src/interfaces/user';

@Component({
  selector: 'app-products',
  templateUrl: './products.component.html',
  styleUrls: ['./products.component.css']
})
export class ProductsComponent implements OnInit {
  allData: any = [];
  succursaleAmisName: string = "";
  isAmis: boolean = false;
  products:any = [];
  caracteristiques: Caractesristique[] = [];
  searchResult: Produits[] = [];
  articleTrouve: boolean = false;
  searchState: boolean = false;
  image: string = "";
  succursaleAmis: Amis[] = [];
  ngOnInit(): void {
    this.getUserData();
  }
  constructor(private communicationService:CommunicationService, private userServcie:UserService) {}
  getUserData() {
    this.userServcie.getAll().subscribe((result:{data:User}) => {
      this.allData = result.data;
      this.succursaleAmis = result.data.amis;
      this.communicationService.SendAllData(this.allData);
    });
  }
  searchProduct(event: any) {
    const searchValue = event.target.value.toLowerCase();
    const isProductAlreadyAdded = this.products.some(
      (product: any) => product.code_barre.toLowerCase() === searchValue
    );
    if (isProductAlreadyAdded) return;
  
    searchValue.length > 0 ? (this.searchState = true) : (this.searchState = false);
  
    this.searchResult = this.allData.produits.filter(
      (product: Produits) => product.code_barre.toLowerCase() === searchValue
    ).map((product: Produits) => {
      this.image = product.image;
      this.caracteristiques = product.caracteristiques;
      return { ...product, quantiteSelectionnee: 1 };
    });
    
  
    this.searchResult.forEach((product: Produits) => {
      if (product.quantite == 0) {
        this.searchResult = [];
        this.succursaleAmis.forEach((ami: Amis) => {
          this.succursaleAmisName = ami.nom;
          ami.produits.forEach((productAmi: Produits) => {
            if (productAmi.code_barre.toLowerCase() === searchValue) {
              this.isAmis = true;
              this.image = productAmi.image;
              this.caracteristiques = productAmi.caracteristiques;
              this.searchResult.push({ ...productAmi, quantiteSelectionnee: 1 });
            }
          });
        });
      } else {
        this.isAmis = false;
      }
    });
  
    this.articleTrouve = this.searchResult.length > 0;
  }
  
  addProduct() {
    this.products.push(this.searchResult[0]);
      const indexOfAddedProduct = this.searchResult.findIndex(
        (product:any) => product.code_barre.toLowerCase() === this.searchResult[0].code_barre.toLowerCase()
      );
  
      if (indexOfAddedProduct !== -1) {
        this.searchResult.splice(indexOfAddedProduct, 1);
      }
      this.searchResult = [];
      this.articleTrouve = false;
      this.communicationService.SendProduct(this.products);
      localStorage.setItem('products', JSON.stringify(this.products));
  }
}
