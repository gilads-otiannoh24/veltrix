import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import {
  type FormBuilder,
  FormControl,
  FormGroup,
  ReactiveFormsModule,
  Validators,
} from '@angular/forms';
import { AuthService } from '../../../core/services/auth.service';
import { Router, RouterLink } from '@angular/router';
import { catchError, throwError } from 'rxjs';
import { HttpErrorResponse } from '@angular/common/http';
import { environment } from '../../../../environments/environment';

declare var grecaptcha: any;

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css'],
  imports: [CommonModule, ReactiveFormsModule, RouterLink],
})
export class LoginComponent {
  loginForm: FormGroup;
  isSubmitting = false;
  passwordVisible = false;
  loginError: string | null = null;

  constructor(public authService: AuthService, private router: Router) {
    this.loginForm = new FormGroup({
      email: new FormControl('', [Validators.required, Validators.email]),
      password: new FormControl('', Validators.required),
      rememberMe: new FormControl(false),
    });
  }

  loginWithGoogle() {
    this.authService.loginWIthGoogle();
  }

  loginWithFacebook() {
    window.location.href = '';
  }

  onSubmit() {
    if (this.loginForm.valid) {
      this.loginError = null;
      this.isSubmitting = true;

      this.authService
        .login(this.loginForm.value)
        .pipe(
          catchError((error: HttpErrorResponse) => {
            if (error.status === 401) {
              this.loginError = error.error.messages.error;
            }
            this.isSubmitting = false;

            return throwError(() => error);
          })
        )
        .subscribe((user) => {
          this.router.navigate(['dashboard']);
        });
    } else {
      // Mark all fields as touched to trigger validation messages
      Object.keys(this.loginForm.controls).forEach((key) => {
        this.loginForm.get(key)?.markAsTouched();
      });
    }
  }

  togglePasswordVisibility() {
    this.passwordVisible = !this.passwordVisible;
  }
}
