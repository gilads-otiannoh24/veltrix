import { Component, OnInit, output } from '@angular/core';

@Component({
  selector: 'app-study-plan',
  imports: [],
  templateUrl: './study-plan.component.html',
  styleUrl: './study-plan.component.css',
})
export class StudyPlanComponent implements OnInit {
  getTitle = output<string>();
  ngOnInit(): void {
    this.getTitle.emit('Study Plan');
  }
}
