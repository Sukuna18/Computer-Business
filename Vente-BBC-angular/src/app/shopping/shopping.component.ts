import { Component, OnInit } from '@angular/core';
import Swal from 'sweetalert2';
import jsPDF from 'jspdf';
import { CommunicationService } from '../Service/communication.service';
import { CommandeService } from '../Service/commande.service';
import { Commande } from 'src/interfaces/commande';
import { AuthService } from '../Service/auth.service';
import { Router } from '@angular/router';
import { User } from 'src/interfaces/user';

@Component({
  selector: 'app-shopping',
  templateUrl: './shopping.component.html',
  styleUrls: ['./shopping.component.css']
})
export class ShoppingComponent implements OnInit {
  products:any = [];
  total: number = 0;
  reduction: number = 0;
  data: any;
  userData: User|undefined;
  ngOnInit(): void {
    this.communicationService.notificationSubject.subscribe((data:any) => {
      this.data = data;
      console.log(this.data);
    }
    );
    this.communicationService.productSubject.subscribe((data:any) => {
      this.products = data;
      console.log(this.products);
    }
    );
    this.communicationService.totalSubject.subscribe((data:any) => {
      this.total = data;
    }
    );
    this.communicationService.allData.subscribe((data:any) => {
      this.userData = data;
    }
    );
  }
  constructor(private communicationService:CommunicationService, private commandeservice: CommandeService, private authService: AuthService, private router: Router) {}
  saveCommande(){
    this.products.forEach((product:any) => {
      let commande: Partial<Commande> = {
        quantite: product.quantiteSelectionnee,
        produit_id: product.id,
        user_id: this.userData?.id,
        prix_vente: product.prix * product.quantiteSelectionnee,
        reduction: this.reduction,
      };
      console.log(commande);      
      this.commandeservice.add(commande).subscribe();
    });
  }
  updateReduction(event: any) {
    if(event.target.value > 100) event.target.value = 100;
    if(event.target.value < 0) event.target.value = 0;
    const newReduction = Number(event.target.value);
    this.reduction = newReduction;
    this.communicationService.SendReduction(this.reduction);
  }
  handleModal() {
    Swal.fire({
      title: 'Validation de la commande',
      text: "Voulez-vous vraiment valider la commande ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText:'Facture',
      confirmButtonText: 'Valider',
    }).then((result) => {
      if(this.products.length == 0){
        Swal.fire(
          'Erreur!',
          'Votre panier est vide.',
          'error'
        )
        return;
      }
      if (result.isConfirmed) {
        this.saveCommande();
      }
      else if(result.dismiss === Swal.DismissReason.cancel){
        this.generatePDF();
        this.saveCommande();
       
      }
    })
  }
  public generatePDF(): void {
    const pdf = new jsPDF({
      format: 'a4',
      unit: 'px',
      orientation: 'portrait',

    });
    pdf.html(this.data, {
      callback: (pdf: jsPDF) => {
        pdf.save('facture.pdf');
      },
    });
  }
  logout(){
    Swal.fire({
      title: 'Déconnexion',
      text: "Voulez-vous vraiment vous déconnecter ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',

      confirmButtonText: 'Oui',
      cancelButtonText: 'Non'
    }).then((result) => {
      if (result.isConfirmed) {
        this.authService.logout().subscribe();
        localStorage.removeItem('token');
        this.router.navigate(['/login']);
      }
    })
  }
  
  
}

// public openPDF(): void {
//   const doc = new jsPDF();

//   // Ajouter du texte au PDF
//   doc.text('Ceci est un exemple de PDF généré avec Angular et jsPDF', 10, 10);

//   // Enregistrer le PDF (vous pouvez également utiliser doc.output('dataurlnewwindow') pour l'ouvrir dans un nouvel onglet)
//   doc.save('exemple.pdf');
// }