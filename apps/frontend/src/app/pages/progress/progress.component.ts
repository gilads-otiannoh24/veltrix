import { Component, OnInit, output } from '@angular/core';

@Component({
  selector: 'app-progress',
  imports: [],
  templateUrl: './progress.component.html',
  styleUrl: './progress.component.css',
})
export class ProgressComponent implements OnInit {
  getTitle = output<string>();
  ngOnInit(): void {
    this.getTitle.emit('Progress');
  }
}
