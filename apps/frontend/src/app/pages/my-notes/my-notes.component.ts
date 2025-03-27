import { Component, OnInit, output } from '@angular/core';

@Component({
  selector: 'app-my-notes',
  imports: [],
  templateUrl: './my-notes.component.html',
  styleUrl: './my-notes.component.css',
})
export class MyNotesComponent implements OnInit {
  getTitle = output<string>();
  ngOnInit(): void {
    this.getTitle.emit('My Notes');
  }
}
