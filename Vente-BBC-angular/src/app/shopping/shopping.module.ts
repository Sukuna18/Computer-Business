import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { AjoutProduitComponent } from '../ajout-produit/ajout-produit.component';
import { FactureComponent } from './facture/facture.component';
import { ListeComponent } from './liste/liste.component';
import { ProductsComponent } from './products/products.component';
import { ShoppingComponent } from './shopping.component';
import { HttpClientModule } from '@angular/common/http';
import { CommandeService } from '../Service/commande.service';



@NgModule({
  declarations: [
    ShoppingComponent,
    ProductsComponent,
    ListeComponent,
    FactureComponent,
    AjoutProduitComponent
  ],
  imports: [
    CommonModule,
    HttpClientModule,
  ],
  providers:[CommandeService]
})
export class ShoppingModule { }
