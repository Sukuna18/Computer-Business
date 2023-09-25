import { Injectable } from '@angular/core';
import { ActivatedRouteSnapshot,Router, RouterStateSnapshot, UrlTree } from '@angular/router';
import { AuthService } from './auth.service';

@Injectable({
  providedIn: 'root'
})
export class AuthGuardService{
  canActivate(next: ActivatedRouteSnapshot, state: RouterStateSnapshot):boolean {
    if(this.auth.isAuthenticated()){
      return true;
    }
    this.router.navigate(["/login"]);
    return false;
  }
  constructor(private auth:AuthService, private router:Router) { }
}
