import { Component, OnInit, output } from '@angular/core';
import { AuthService } from '../../core/services/auth.service';

@Component({
  selector: 'app-profile',
  imports: [],
  templateUrl: './profile.component.html',
  styleUrl: './profile.component.css',
})
export class ProfileComponent implements OnInit {
  getTitle = output<string>();

  constructor(public authService: AuthService) {}

  ngOnInit(): void {
    this.getTitle.emit('Profile');
  }
}
