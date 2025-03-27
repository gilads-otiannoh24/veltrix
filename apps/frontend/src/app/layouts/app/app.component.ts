import { Component, inject, signal } from '@angular/core';
import { RouterModule, RouterOutlet } from '@angular/router';
import { NgIcon, provideIcons } from '@ng-icons/core';
import {
  heroUsers,
  heroChartPie,
  heroBookOpen,
  heroNewspaper,
  heroCalendar,
  heroArrowTrendingUp,
  heroBars3,
  heroMoon,
  heroBell,
  heroSun,
} from '@ng-icons/heroicons/outline';
import { ThemeService } from '../../core/services/theme.service';
import { SidebarComponent } from '../../components/shared/sidebar/sidebar.component';
import { CommonModule } from '@angular/common';
import { SidebarService } from '../../core/services/sidebar.service';

@Component({
  selector: 'app-layout',
  imports: [NgIcon, RouterOutlet, CommonModule, RouterModule, SidebarComponent],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css',
  providers: [
    provideIcons({
      heroUsers,
      heroChartPie,
      heroBookOpen,
      heroNewspaper,
      heroCalendar,
      heroArrowTrendingUp,
      heroBars3,
      heroMoon,
      heroBell,
      heroSun,
    }),
  ],
})
export class AppLayoutComponent {
  themeService = inject(ThemeService);
  sidebarService = inject(SidebarService);
  title = signal('Veltrix');

  constructor() {}

  onActivate(componentInstance: any) {
    if (componentInstance.getTitle) {
      componentInstance.getTitle.subscribe((value: string) => {
        this.title.set(value);
      });
    }
  }
}
