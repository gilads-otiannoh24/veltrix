import { CommonModule } from '@angular/common';
import { Component, inject, type OnInit } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { Router, RouterLink } from '@angular/router';
import { LogoComponent } from '../../../components/shared/logo/logo.component';

@Component({
  selector: 'app-error-404',
  templateUrl: './error-404.component.html',
  styleUrls: ['../error-pages.css'],
  imports: [CommonModule, FormsModule, RouterLink, LogoComponent],
})
export class Error404Component implements OnInit {
  searchQuery = '';
  router = inject(Router);

  constructor() {}

  ngOnInit(): void {
    // Add any initialization logic here
  }

  goToHome(): void {
    this.router.navigate(['/']);
  }

  search(): void {
    if (this.searchQuery.trim()) {
      // In a real app, this would navigate to search results
      console.log('Searching for:', this.searchQuery);
      // Example: this.router.navigate(['/search'], { queryParams: { q: this.searchQuery } });
    }
  }
}
