import { Component, OnInit, output } from '@angular/core';

@Component({
  selector: 'app-study-area',
  imports: [],
  templateUrl: './study-area.component.html',
  styleUrl: './study-area.component.css',
})
export class StudyAreaComponent implements OnInit {
  getTitle = output<string>();
  ngOnInit(): void {
    this.getTitle.emit('Study Area');
  }
}
