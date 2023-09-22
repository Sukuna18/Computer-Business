import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { ShoppingComponent } from './shopping/shopping.component';
import { PageNotFoundComponent } from './page-not-found/page-not-found.component';
import { HTTP_INTERCEPTORS, HttpClientModule } from '@angular/common/http';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { ProductsComponent } from './shopping/products/products.component';
import { ListeComponent } from './shopping/liste/liste.component';
import { FactureComponent } from './shopping/facture/facture.component';
import { LoginComponent } from './login/login.component';
import { TokenInterceptor } from './shared/token.interceptor';
import { InscriptionComponent } from './inscription/inscription.component';
import { AjoutProduitComponent } from './ajout-produit/ajout-produit.component';

@NgModule({
  declarations: [
    AppComponent,
    ShoppingComponent,
    PageNotFoundComponent,
    ProductsComponent,
    ListeComponent,
    FactureComponent,
    LoginComponent,
    InscriptionComponent,
    AjoutProduitComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    ReactiveFormsModule,
    FormsModule
  ],
  providers: [
    {
      provide: HTTP_INTERCEPTORS,
      useClass: TokenInterceptor,
      multi: true,
    },
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
