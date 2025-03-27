import { Component, type OnInit, type OnDestroy, inject } from '@angular/core';
import {
  FormControl,
  FormGroup,
  type FormBuilder,
  Validators,
  type AbstractControl,
  type ValidationErrors,
  ReactiveFormsModule,
} from '@angular/forms';
import { Router, RouterLink } from '@angular/router';
import { trigger, transition, style, animate } from '@angular/animations';
import { interval, Subscription } from 'rxjs';
import { take } from 'rxjs/operators';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-forgot-password',
  templateUrl: './forgot-password.component.html',
  styleUrls: ['./forgot-password.component.css'],
  animations: [
    trigger('fadeAnimation', [
      transition(':enter', [
        style({ opacity: 0, transform: 'translateY(10px)' }),
        animate(
          '300ms ease-out',
          style({ opacity: 1, transform: 'translateY(0)' })
        ),
      ]),
      transition(':leave', [
        animate(
          '300ms ease-in',
          style({ opacity: 0, transform: 'translateY(-10px)' })
        ),
      ]),
    ]),
  ],
  imports: [CommonModule, ReactiveFormsModule, RouterLink],
})
export class ForgotPasswordComponent implements OnInit, OnDestroy {
  currentStep = 1;
  isSubmitting = false;

  // Forms
  emailForm: FormGroup;
  verificationForm: FormGroup;
  passwordForm: FormGroup;

  // Password visibility
  showPassword = false;
  showConfirmPassword = false;

  // Password strength
  passwordStrength = 0;

  // Verification code
  verificationControls: string[] = [
    'digit1',
    'digit2',
    'digit3',
    'digit4',
    'digit5',
    'digit6',
  ];
  codeExpiryTime = '5:00';
  private codeExpirySubscription: Subscription;

  // Resend code
  resendDisabled = false;
  resendCountdown = 60;
  private resendSubscription: Subscription;
  router = inject(Router);

  constructor() {
    // Initialize forms
    this.emailForm = new FormGroup({
      email: new FormControl('', [Validators.required, Validators.email]),
    });

    // Create verification form with 6 digit controls
    this.verificationForm = new FormGroup({
      digit1: new FormControl('', [
        Validators.required,
        Validators.pattern(/^[0-9]$/),
      ]),
      digit2: new FormControl('', [
        Validators.required,
        Validators.pattern(/^[0-9]$/),
      ]),
      digit3: new FormControl('', [
        Validators.required,
        Validators.pattern(/^[0-9]$/),
      ]),
      digit4: new FormControl('', [
        Validators.required,
        Validators.pattern(/^[0-9]$/),
      ]),
      digit5: new FormControl('', [
        Validators.required,
        Validators.pattern(/^[0-9]$/),
      ]),
      digit6: new FormControl('', [
        Validators.required,
        Validators.pattern(/^[0-9]$/),
      ]),
    });

    // Password form with validation
    this.passwordForm = new FormGroup(
      {
        password: new FormControl('', [
          Validators.required,
          Validators.minLength(8),
          this.createPasswordStrengthValidator(),
        ]),
        confirmPassword: new FormControl('', Validators.required),
      },
      { validators: this.passwordMatchValidator }
    );

    // Initialize subscriptions
    this.codeExpirySubscription = new Subscription();
    this.resendSubscription = new Subscription();
  }

  ngOnInit(): void {
    // Watch password changes to calculate strength
    /* this.passwordForm.value
      .get('password')
      .valueChanges.subscribe((value: string) => {
        this.calculatePasswordStrength(value);
      }); */
  }

  ngOnDestroy(): void {
    // Clean up subscriptions
    if (this.codeExpirySubscription) {
      this.codeExpirySubscription.unsubscribe();
    }
    if (this.resendSubscription) {
      this.resendSubscription.unsubscribe();
    }
  }

  // Step 1: Submit email
  submitEmail(): void {
    if (this.emailForm.invalid) return;

    this.isSubmitting = true;

    // Simulate API call
    setTimeout(() => {
      this.isSubmitting = false;
      this.currentStep = 2;
      this.startCodeExpiryTimer();
    }, 1500);
  }

  // Step 2: Submit verification code
  submitVerification(): void {
    if (this.verificationForm.invalid) return;

    this.isSubmitting = true;

    // Simulate API call
    setTimeout(() => {
      this.isSubmitting = false;
      this.currentStep = 3;
    }, 1500);
  }

  // Step 3: Submit new password
  submitNewPassword(): void {
    if (this.passwordForm.invalid) return;

    this.isSubmitting = true;

    // Simulate API call
    setTimeout(() => {
      this.isSubmitting = false;
      this.currentStep = 4;
    }, 1500);
  }

  // Handle verification code input
  onVerificationDigitInput(event: any, index: number): void {
    const input = event.target;
    const value = input.value;

    // Auto-focus next input
    if (value.length === 1 && index < 5) {
      const nextInput = input.nextElementSibling;
      if (nextInput) {
        nextInput.focus();
      }
    }

    // Handle backspace
    if (event.key === 'Backspace' && index > 0 && !value) {
      const prevInput = input.previousElementSibling;
      if (prevInput) {
        prevInput.focus();
      }
    }
  }

  // Handle paste event for verification code
  onVerificationCodePaste(event: ClipboardEvent): void {
    event.preventDefault();
    const clipboardData = event.clipboardData;
    if (!clipboardData) return;

    const pastedText = clipboardData.getData('text');
    if (!pastedText.match(/^\d{6}$/)) return;

    // Fill in all inputs with pasted digits
    for (let i = 0; i < Math.min(6, pastedText.length); i++) {
      this.verificationForm.value.get(`digit${i + 1}`).setValue(pastedText[i]);
    }
  }

  // Start timer for code expiry
  startCodeExpiryTimer(): void {
    let totalSeconds = 5 * 60; // 5 minutes

    this.codeExpirySubscription = interval(1000).subscribe(() => {
      totalSeconds--;

      if (totalSeconds <= 0) {
        this.codeExpiryTime = 'Expired';
        this.codeExpirySubscription.unsubscribe();
        return;
      }

      const minutes = Math.floor(totalSeconds / 60);
      const seconds = totalSeconds % 60;
      this.codeExpiryTime = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
    });
  }

  // Resend verification code
  resendCode(): void {
    if (this.resendDisabled) return;

    // Reset verification form
    this.verificationForm.reset();

    // Disable resend button and start countdown
    this.resendDisabled = true;
    this.resendCountdown = 60;

    // Restart expiry timer
    if (this.codeExpirySubscription) {
      this.codeExpirySubscription.unsubscribe();
    }
    this.startCodeExpiryTimer();

    // Start resend countdown
    this.resendSubscription = interval(1000)
      .pipe(take(60))
      .subscribe(() => {
        this.resendCountdown--;

        if (this.resendCountdown <= 0) {
          this.resendDisabled = false;
          this.resendSubscription.unsubscribe();
        }
      });
  }

  // Go back to previous step
  goBack(): void {
    if (this.currentStep > 1) {
      this.currentStep--;
    }
  }

  // Toggle password visibility
  togglePasswordVisibility(): void {
    this.showPassword = !this.showPassword;
  }

  // Toggle confirm password visibility
  toggleConfirmPasswordVisibility(): void {
    this.showConfirmPassword = !this.showConfirmPassword;
  }

  // Calculate password strength (0-4)
  calculatePasswordStrength(password: string): void {
    if (!password) {
      this.passwordStrength = 0;
      return;
    }

    let strength = 0;

    // Length check
    if (password.length >= 8) strength++;

    // Contains lowercase
    if (/[a-z]/.test(password)) strength++;

    // Contains uppercase
    if (/[A-Z]/.test(password)) strength++;

    // Contains number
    if (/[0-9]/.test(password)) strength++;

    // Contains special char
    if (/[^A-Za-z0-9]/.test(password)) strength++;

    this.passwordStrength = Math.min(4, strength);
  }

  // Get password strength text
  getPasswordStrengthText(): string {
    switch (this.passwordStrength) {
      case 0:
        return 'Very Weak';
      case 1:
        return 'Weak';
      case 2:
        return 'Fair';
      case 3:
        return 'Good';
      case 4:
        return 'Strong';
      default:
        return '';
    }
  }

  // Get password strength class
  getPasswordStrengthClass(): string {
    switch (this.passwordStrength) {
      case 0:
        return 'bg-error';
      case 1:
        return 'bg-error';
      case 2:
        return 'bg-warning';
      case 3:
        return 'bg-success';
      case 4:
        return 'bg-success';
      default:
        return '';
    }
  }

  // Get password strength text class
  getPasswordStrengthTextClass(): string {
    switch (this.passwordStrength) {
      case 0:
        return 'text-error';
      case 1:
        return 'text-error';
      case 2:
        return 'text-warning';
      case 3:
        return 'text-success';
      case 4:
        return 'text-success';
      default:
        return '';
    }
  }

  // Password match validator
  passwordMatchValidator(control: AbstractControl): ValidationErrors | null {
    const password = control.get('password')?.value;
    const confirmPassword = control.get('confirmPassword')?.value;

    if (password && confirmPassword && password !== confirmPassword) {
      return { passwordMismatch: true };
    }

    return null;
  }

  // Password strength validator
  createPasswordStrengthValidator() {
    return (control: FormControl): ValidationErrors | null => {
      const value: string = control.value || '';

      if (!value) {
        return null;
      }

      const hasUpperCase = /[A-Z]/.test(value);
      const hasLowerCase = /[a-z]/.test(value);
      const hasNumeric = /[0-9]/.test(value);
      const hasSpecialChar = /[^A-Za-z0-9]/.test(value);

      const passwordValid =
        hasUpperCase && hasLowerCase && hasNumeric && hasSpecialChar;

      return !passwordValid ? { passwordStrength: true } : null;
    };
  }
}
