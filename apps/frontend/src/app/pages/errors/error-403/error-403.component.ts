import { CommonModule } from '@angular/common';
import { Component, inject, type OnInit } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { Router, RouterLink } from '@angular/router';
import { LogoComponent } from '../../../components/shared/logo/logo.component';

@Component({
  selector: 'app-error-403',
  templateUrl: './error-403.component.html',
  styleUrls: ['../error-pages.css'],
  imports: [CommonModule, FormsModule, LogoComponent],
})
export class Error403Component implements OnInit {
  router = inject(Router);
  constructor() {}

  ngOnInit(): void {
    // Add any initialization logic here
  }

  goToHome(): void {
    this.router.navigate(['/']);
  }

  goToLogin(): void {
    this.router.navigate(['/login']);
  }

  requestAccess(): void {
    // In a real app, this would navigate to an access request form
    console.log('Requesting access');
    // Example: this.router.navigate(['/request-access']);
  }
}
