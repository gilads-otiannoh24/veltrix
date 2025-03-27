import { NgClass, NgIf } from '@angular/common';
import { Component, inject, OnInit, output } from '@angular/core';
import { ThemeService } from '../../core/services/theme.service';

@Component({
  selector: 'app-settings',
  imports: [NgIf, NgClass],
  templateUrl: './settings.component.html',
  styleUrl: './settings.component.css',
})
export class SettingsComponent implements OnInit {
  getTitle = output<string>();
  activeTab: string = 'account';
  themeService = inject(ThemeService);

  ngOnInit(): void {
    this.getTitle.emit('Settings');
  }
}
