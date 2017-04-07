// Importer la 

import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {

  burgerIsOpen = false;

  // Créer une fonction à appeler au click sur .fa-bars
  openBurger(){
    this.burgerIsOpen = !this.burgerIsOpen;
  };

  ngOnInit(){
    document.getElementsByTagName('body')[0].className = 'animated fadeIn';
  };

}
