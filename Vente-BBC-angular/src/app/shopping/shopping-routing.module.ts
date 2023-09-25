import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, Routes } from '@angular/router';
import { ShoppingComponent } from './shopping.component';
import { FactureComponent } from './facture/facture.component';
import { AuthGuard } from '../shared/authGuard';

const shoppingRoutes: Routes = [
  {
    path: 'user', canActivate: [AuthGuard], children: [
      {path: 'shopping', component: ShoppingComponent},
      {path: 'facture', component: FactureComponent},
    ]
 },
];

@NgModule({
  imports: [
    RouterModule.forChild(shoppingRoutes),
    CommonModule
  ]
  ,
  exports: [RouterModule],
})
export class ShoppingRoutingModule { }
