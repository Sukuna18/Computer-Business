import { ActivatedRouteSnapshot, RouterStateSnapshot } from '@angular/router';
import { inject } from '@angular/core';
import { AuthGuardService } from '../Service/auth-guard.service';

export const AuthGuard = (next: ActivatedRouteSnapshot, state: RouterStateSnapshot): boolean => {
  const permissionsService = inject(AuthGuardService);
  return permissionsService.canActivate(next, state);
};
