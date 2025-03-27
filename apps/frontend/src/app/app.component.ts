import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { AuthService } from './core/services/auth.service';
import { GlobalToastService } from './core/services/global-toast.service';
import { CommonModule } from '@angular/common';
import { NgIcon, provideIcons } from '@ng-icons/core';
import {
  heroCheckBadge,
  heroExclamationTriangle,
  heroInformationCircle,
  heroXMark,
} from '@ng-icons/heroicons/outline';

@Component({
  selector: 'app-root',
  imports: [RouterOutlet, CommonModule, NgIcon],
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css'],
  providers: [
    provideIcons({
      heroExclamationTriangle,
      heroCheckBadge,
      heroInformationCircle,
      heroXMark,
    }),
  ],
})
export class AppComponent {
  constructor(public alertService: GlobalToastService) {}
}
