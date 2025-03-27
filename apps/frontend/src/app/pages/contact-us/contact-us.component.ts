import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import {
  FormControl,
  FormGroup,
  ReactiveFormsModule,
  Validators,
} from '@angular/forms';

@Component({
  selector: 'app-contact-us',
  imports: [CommonModule, ReactiveFormsModule],
  templateUrl: './contact-us.component.html',
  styleUrl: './contact-us.component.css',
})
export class ContactUsComponent {
  contactForm: FormGroup;
  successMessage = '';
  errorMessage = '';

  constructor() {
    this.contactForm = new FormGroup({
      name: new FormControl('', Validators.required),
      email: new FormControl('', [Validators.required, Validators.email]),
      message: new FormControl('', Validators.required),
    });
  }
  onSubmit(): void {
    if (this.contactForm.valid) {
      // Simulate sending the form data (replace with actual API call)
      console.log('Form submitted:', this.contactForm.value);
      this.successMessage = 'Your message has been sent successfully!';
      this.errorMessage = '';
      this.contactForm.reset();
    } else {
      this.errorMessage = 'Please fill in all required fields correctly.';
      this.successMessage = '';
    }
  }
}
