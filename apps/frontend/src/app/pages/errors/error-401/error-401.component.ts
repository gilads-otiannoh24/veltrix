import { CommonModule } from '@angular/common';
import { Component, inject, type OnInit } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { Router, RouterLink } from '@angular/router';
import { LogoComponent } from '../../../components/shared/logo/logo.component';

@Component({
  selector: 'app-error-401',
  templateUrl: './error-401.component.html',
  styleUrls: ['../error-pages.css'],
  imports: [FormsModule, CommonModule, LogoComponent, RouterLink],
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
}
