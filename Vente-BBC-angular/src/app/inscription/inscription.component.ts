import { Component, OnInit } from '@angular/core';
import { Succursale } from 'src/interfaces/succursale';
import { SuccursaleService } from '../Service/succursale.service';
import { UserService } from '../Service/user.service';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { User } from 'src/interfaces/user';
import Swal from 'sweetalert2';
import { Router } from '@angular/router';
import { CommunicationService } from '../Service/communication.service';

@Component({
  selector: 'app-inscription',
  templateUrl: './inscription.component.html',
  styleUrls: ['./inscription.component.css']
})
export class InscriptionComponent implements OnInit {
  constructor(private succursaleservice: SuccursaleService, private userService: UserService, private fb:FormBuilder, private router:Router, private communicationService: CommunicationService) { }
  numberPattern = "^[0-9]*$";
  namePattern = "^[a-zA-Z ]*$";
  passwordPattern = "^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])";
  userData: any;
  userForm:FormGroup = this.fb.group({
    nom: ['', [Validators.required, Validators.pattern(this.namePattern)]],
    login: ['', [Validators.required]],
    password: ["",[Validators.required, Validators.minLength(6)]],
    password_confirmation: ["",[Validators.required, Validators.minLength(6)]],
    poste: [''],
    telephone: ['', [Validators.required, Validators.minLength(8), Validators.maxLength(8), Validators.pattern(this.numberPattern)]],
    succursale_id: ['', Validators.required],
  });
  Succursale: Succursale[] = [] ;
ngOnInit(): void {
this.getAll();
this.getUsers();
}
getUsers(){
  this.userService.getUser().subscribe((result) => {
    this.userData = result ;
    console.log(this.userData);
  }
  );
}
getAll() {
  this.succursaleservice.getAll().subscribe((result:{data:Succursale[]}) => {
    this.Succursale = result.data;
  });
}
addUser() {
  let user: Partial<User> = {
    nom: this.userForm.value.nom,
    login: this.userForm.value.login,
    password: this.userForm.value.password,
    password_confirmation: this.userForm.value.password_confirmation,
    poste: this.userForm.value.poste,
    telephone: this.userForm.value.telephone,
    succursale_id: this.userForm.value.succursale_id,
  };
  for(let i = 0; i < this.userData.length; i++) {
    if(this.userData[i].login == user.login) {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Ce login existe déjà !',
      });
      return;
    }
    if(this.userData[i].telephone == user.telephone) {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Ce numéro de téléphone existe déjà !',
      });
      return;
    }
  }
  if(this.userForm.value.password != this.userForm.value.password_confirmation) {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Les mots de passe ne correspondent pas !',
    });
    return;
  }
  if(this.userForm.invalid || this.userForm.value.succursale_id == '') {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Veuillez validez tous les champs !',
    });
    return;
  }
  this.userService.add(user).subscribe();
  this.router.navigate(['/login']);
}
}
