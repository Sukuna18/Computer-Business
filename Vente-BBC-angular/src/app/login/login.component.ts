import { Component } from '@angular/core';
import { AuthService } from '../Service/auth.service';
import Swal from 'sweetalert2';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
})
export class LoginComponent {
  login: string = '';
  password: string = '';
  token: string|null = '';
  constructor(private authService: AuthService, private route: Router) {}

  loginAccount() {
    console.log(this.login, this.password);
    this.authService.login(this.login, this.password).subscribe((response: any) => {
     if(response.token){
      Swal.fire({
        icon: 'success',
        title: 'Connexion réussie !',
        showConfirmButton: false,
        timer: 1500
      });
      this.route.navigate(['/shopping']);
     }else{
      return;
     }
    });
  }
}

