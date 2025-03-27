import { CommonModule, NgClass, NgIf } from '@angular/common';
import {
  Component,
  effect,
  inject,
  input,
  OnInit,
  signal,
} from '@angular/core';
import { NgIcon, provideIcons } from '@ng-icons/core';
import {
  heroUsers,
  heroChartPie,
  heroBookOpen,
  heroNewspaper,
  heroCalendar,
  heroArrowTrendingUp,
  heroCog6Tooth,
  heroChevronLeft,
  heroChevronRight,
  heroArrowLeftStartOnRectangle,
} from '@ng-icons/heroicons/outline';
import { SidebarService } from '../../../core/services/sidebar.service';
import { LogoComponent } from '../logo/logo.component';
import { Router, RouterLink } from '@angular/router';
import { AuthService } from '../../../core/services/auth.service';

@Component({
  selector: 'app-sidebar',
  standalone: true,
  imports: [NgIcon, CommonModule, NgClass, NgIf, LogoComponent, RouterLink],
  templateUrl: './sidebar.component.html',
  styleUrl: './sidebar.component.css',
  providers: [
    provideIcons({
      heroUsers,
      heroChartPie,
      heroBookOpen,
      heroNewspaper,
      heroCalendar,
      heroArrowTrendingUp,
      heroCog6Tooth,
      heroChevronLeft,
      heroChevronRight,
      heroArrowLeftStartOnRectangle,
    }),
  ],
})
export class SidebarComponent {
  activePage = input.required<string>();

  constructor(
    public authService: AuthService,
    public sidebarService: SidebarService,
    public router: Router
  ) {}

  logout() {
    this.authService.logout();
    this.router.navigate(['']);
  }
}
