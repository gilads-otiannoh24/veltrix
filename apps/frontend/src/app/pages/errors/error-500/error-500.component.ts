import { CommonModule } from '@angular/common';
import { Component, inject, type OnInit } from '@angular/core';
import { Router, RouterLink } from '@angular/router';
import { LogoComponent } from '../../../components/shared/logo/logo.component';

@Component({
  selector: 'app-error-500',
  templateUrl: './error-500.component.html',
  styleUrls: ['../error-pages.css'],
  imports: [CommonModule, LogoComponent],
})
export class Error500Component implements OnInit {
  retryCountdown = 30;
  countdownInterval: any;
  router = inject(Router);

  constructor() {}

  ngOnInit(): void {
    this.startCountdown();
  }

  ngOnDestroy(): void {
    if (this.countdownInterval) {
      clearInterval(this.countdownInterval);
    }
  }

  startCountdown(): void {
    this.countdownInterval = setInterval(() => {
      this.retryCountdown--;
      if (this.retryCountdown <= 0) {
        this.retryNow();
      }
    }, 1000);
  }

  retryNow(): void {
    clearInterval(this.countdownInterval);
    window.location.reload();
  }

  goToHome(): void {
    this.router.navigate(['/']);
  }

  reportIssue(): void {
    // In a real app, this would open a support ticket form
    console.log('Reporting issue');
    // Example: this.router.navigate(['/support/report']);
  }
}
