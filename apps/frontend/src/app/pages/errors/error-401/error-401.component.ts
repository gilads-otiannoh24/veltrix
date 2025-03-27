import { CommonModule } from '@angular/common';
import { Component, inject, type OnInit } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { Router, RouterLink } from '@angular/router';
import { LogoComponent } from '../../../components/shared/logo/logo.component';

@Component({
  selector: 'app-error-401',
  templateUrl: './error-401.component.html',
  styleUrls: ['../error-pages.css'],
  imports: [FormsModule, CommonModule, LogoComponent],
})
export class Error401Component implements OnInit {
  email = '';
  password = '';
  rememberMe = false;
  isLoading = false;
  router = inject(Router);

  constructor() {}

  ngOnInit(): void {
    // Add any initialization logic here
  }

  login(): void {
    if (this.email && this.password) {
      this.isLoading = true;

      // Simulate login process
      setTimeout(() => {
        this.isLoading = false;
        // In a real app, this would handle authentication
        this.router.navigate(['/dashboard']);
      }, 1500);
    }
  }

  goToHome(): void {
    this.router.navigate(['/']);
  }

  goToSignup(): void {
    this.router.navigate(['/signup']);
  }

  forgotPassword(): void {
    this.router.navigate(['/forgot-password']);
  }
}
