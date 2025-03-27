import { CommonModule, NgClass, NgFor, NgIf } from '@angular/common';
import { Component, OnInit, HostListener, inject } from '@angular/core';
import { ThemeService } from '../../core/services/theme.service';
import { LogoComponent } from '../../components/shared/logo/logo.component';
import { RouterLink } from '@angular/router';

@Component({
  selector: 'app-root',
  imports: [CommonModule, LogoComponent, RouterLink],
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css'],
})
export class HomeComponent implements OnInit {
  themeService = inject(ThemeService);
  darkMode = false;
  mobileMenuOpen = false;
  currentTestimonial = 0;

  features = [
    {
      icon: 'book',
      title: 'Study Area',
      description:
        'Access your study materials, take notes, and engage with AI-powered learning assistance.',
      color: 'text-error',
    },
    {
      icon: 'sticky-note',
      title: 'Smart Notes',
      description:
        'Organize your thoughts with our powerful note-taking system with tags, folders, and search.',
      color: 'text-info',
    },
    {
      icon: 'list-check',
      title: 'Study Plan',
      description:
        'Create and manage your study schedule, track courses, and set milestones for your learning journey.',
      color: 'text-success',
    },
    {
      icon: 'chart-line',
      title: 'Progress Tracking',
      description:
        'Visualize your academic progress with detailed analytics and performance insights.',
      color: 'text-warning',
    },
    {
      icon: 'users',
      title: 'Community',
      description:
        'Connect with fellow students, join study groups, and participate in discussions.',
      color: 'text-secondary',
    },
    {
      icon: 'brain',
      title: 'AI Assistant',
      description:
        'Get personalized help from our AI tutor that adapts to your learning style and needs.',
      color: 'text-primary',
    },
  ];

  testimonials = [
    {
      name: 'Alex Johnson',
      role: 'Computer Science Student',
      image: '/placeholder.svg?height=80&width=80',
      quote:
        'Veltrix has completely transformed how I organize my studies. The progress tracking feature helps me stay motivated and focused on my goals.',
      rating: 5,
    },
    {
      name: 'Sarah Williams',
      role: 'Physics Major',
      image: '/placeholder.svg?height=80&width=80',
      quote:
        "The AI study assistant is like having a personal tutor available 24/7. It's helped me understand complex concepts that I was struggling with.",
      rating: 5,
    },
    {
      name: 'Michael Chen',
      role: 'Medical Student',
      image: '/placeholder.svg?height=80&width=80',
      quote:
        'I love how Veltrix integrates all my study needs in one place. The note-taking system is particularly impressive with its organization features.',
      rating: 4,
    },
  ];

  pricingPlans = [
    {
      name: 'Free',
      price: '0',
      features: [
        'Basic Study Area',
        'Limited Notes (50)',
        'Simple Study Plan',
        'Basic Progress Tracking',
        'Community Access',
      ],
      cta: 'Get Started',
      popular: false,
    },
    {
      name: 'Pro',
      price: '9.99',
      features: [
        'Advanced Study Area',
        'Unlimited Notes',
        'Comprehensive Study Plan',
        'Detailed Analytics',
        'Community Access',
        'AI Study Assistant (Limited)',
      ],
      cta: 'Start Free Trial',
      popular: true,
    },
    {
      name: 'Premium',
      price: '19.99',
      features: [
        'Everything in Pro',
        'Unlimited AI Assistant',
        'Priority Support',
        'Advanced Analytics',
        'Study Group Creation',
        'Offline Access',
      ],
      cta: 'Start Free Trial',
      popular: false,
    },
  ];

  stats = [
    { value: '50,000+', label: 'Students' },
    { value: '1M+', label: 'Notes Created' },
    { value: '10,000+', label: 'Study Hours' },
    { value: '95%', label: 'Satisfaction' },
  ];

  constructor() {}

  ngOnInit(): void {
    this.darkMode = this.themeService.getDarkMode();
  }

  toggleDarkMode(): void {
    this.themeService.toggleDarkMode();
    this.darkMode = this.themeService.getDarkMode();
  }

  toggleMobileMenu(): void {
    this.mobileMenuOpen = !this.mobileMenuOpen;
  }

  nextTestimonial(): void {
    this.currentTestimonial =
      (this.currentTestimonial + 1) % this.testimonials.length;
  }

  prevTestimonial(): void {
    this.currentTestimonial =
      (this.currentTestimonial - 1 + this.testimonials.length) %
      this.testimonials.length;
  }

  scrollToSection(sectionId: string): void {
    const element = document.getElementById(sectionId);
    if (element) {
      element.scrollIntoView({ behavior: 'smooth' });
    }
    this.mobileMenuOpen = false;
  }

  @HostListener('window:scroll', ['$event'])
  onWindowScroll() {
    const header = document.querySelector('header');
    if (header) {
      if (window.pageYOffset > 50) {
        header.classList.add('bg-base-100');
        header.classList.add('shadow-lg');
      } else {
        header.classList.remove('bg-base-100');
        header.classList.remove('shadow-lg');
      }
    }
  }
}
