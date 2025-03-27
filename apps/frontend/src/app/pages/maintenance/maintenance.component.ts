import { CommonModule } from '@angular/common';
import { Component, inject, type OnInit } from '@angular/core';
import { NgModel, ReactiveFormsModule } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-maintenance',
  templateUrl: './maintenance.component.html',
  styleUrls: ['../errors/error-pages.css'],
  imports: [CommonModule, ReactiveFormsModule],
})
export class MaintenanceComponent implements OnInit {
  email = '';
  isSubscribed = false;
  estimatedTime = '2 hours';
  router = inject(Router);

  constructor() {}

  ngOnInit(): void {
    // Calculate estimated completion time (2 hours from now)
    const completionTime = new Date();
    completionTime.setHours(completionTime.getHours() + 2);
    this.estimatedTime = completionTime.toLocaleTimeString([], {
      hour: '2-digit',
      minute: '2-digit',
    });
  }

  subscribeToUpdates(): void {
    if (this.email && this.validateEmail(this.email)) {
      // In a real app, this would subscribe the user to updates
      this.isSubscribed = true;
    }
  }

  validateEmail(email: string): boolean {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
  }
}
