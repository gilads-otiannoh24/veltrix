import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root',
})
export class ThemeService {
  private currentTheme: 'light' | 'dark' = 'light';

  constructor() {
    this.loadTheme();
  }

  setTheme(theme: 'light' | 'dark'): void {
    this.currentTheme = theme;
    document.documentElement.setAttribute('data-theme', theme); // For DaisyUI
    localStorage.setItem('theme', theme); // Save to localStorage
  }

  getTheme(): 'light' | 'dark' {
    return this.currentTheme;
  }

  getDarkMode() {
    return this.currentTheme === 'dark';
  }

  loadTheme(): void {
    const savedTheme = localStorage.getItem('theme') as 'light' | 'dark';
    const systemTheme = this.getSystemTheme();

    if (savedTheme) {
      this.setTheme(savedTheme);
    } else this.setTheme(systemTheme);
  }

  toggleDarkMode() {
    if (this.currentTheme === 'dark') {
      this.setTheme('light');
    } else this.setTheme('dark');
  }

  getSystemTheme() {
    if (
      window.matchMedia &&
      window.matchMedia('(prefers-color-scheme: dark)').matches
    ) {
      return 'dark';
    }

    return 'light';
  }
}
