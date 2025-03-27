import { ComponentFixture, TestBed } from '@angular/core/testing';

import { StudyArea2Component } from './study-area2.component';

describe('StudyArea2Component', () => {
  let component: StudyArea2Component;
  let fixture: ComponentFixture<StudyArea2Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [StudyArea2Component]
    })
    .compileComponents();

    fixture = TestBed.createComponent(StudyArea2Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
