import { NgClass, NgFor, NgIf } from '@angular/common';
import { Component, inject, OnInit, output } from '@angular/core';
import { NgIcon, NgIconsModule, provideIcons } from '@ng-icons/core';
import {
  heroArrowTrendingUp,
  heroBars3,
  heroBell,
  heroBookOpen,
  heroCalendar,
  heroChartPie,
  heroMoon,
  heroNewspaper,
  heroSun,
  heroUsers,
} from '@ng-icons/heroicons/outline';
import { ThemeService } from '../../core/services/theme.service';
import { SidebarComponent } from '../../components/shared/sidebar/sidebar.component';
import { AuthService } from '../../core/services/auth.service';
import { User } from '../../core/models/user.model';

interface StudySession {
  time: string;
  endTime: string;
  title: string;
  subtitle: string;
  status: 'in-progress' | 'upcoming';
}

interface Note {
  title: string;
  description: string;
  timeAgo: string;
}

interface Task {
  text: string;
  completed: boolean;
}

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css'],
  imports: [NgClass, NgFor],
})
export class DashboardComponent implements OnInit {
  userName = 'Alex';
  studyStreak = 30;
  stats = {
    totalTime: '12.5h',
    dailyAverage: '1.8h',
    mostProductive: '3.2h',
    dayStreak: 30,
  };

  todaysSessions: StudySession[] = [
    {
      time: '09:00',
      endTime: '10:30',
      title: 'Advanced Physics',
      subtitle: 'Chapter 4: Quantum Mechanics',
      status: 'in-progress',
    },
    {
      time: '11:00',
      endTime: '12:30',
      title: 'Calculus Study Group',
      subtitle: 'Online Meeting - Integration Techniques',
      status: 'upcoming',
    },
    {
      time: '14:00',
      endTime: '16:00',
      title: 'Computer Science',
      subtitle: 'Data Structures & Algorithms',
      status: 'upcoming',
    },
  ];

  recentNotes: Note[] = [
    {
      title: 'Quantum Mechanics - Wave Functions',
      description: "Notes from today's lecture on wave-particle duality...",
      timeAgo: '2h ago',
    },
    {
      title: 'Calculus - Integration by Parts',
      description: 'Formula and examples for integration by parts method...',
      timeAgo: 'Yesterday',
    },
    {
      title: 'Data Structures - Binary Trees',
      description:
        'Implementation and traversal algorithms for binary trees...',
      timeAgo: '2 days ago',
    },
  ];

  tasks: Task[] = [
    { text: 'Complete Physics assignment', completed: true },
    { text: 'Review Calculus notes', completed: false },
    { text: 'Prepare for CS presentation', completed: false },
    { text: 'Submit research paper draft', completed: false },
    { text: 'Schedule study group meeting', completed: false },
  ];

  studyGoals = [
    { course: 'Weekly Study Goal', progress: 83, target: '12.5/15 hours' },
    { course: 'Physics Course', progress: 85, target: '85%' },
    { course: 'Calculus Course', progress: 70, target: '70%' },
    { course: 'Computer Science', progress: 90, target: '90%' },
  ];

  currentMonth = 'May 2025';

  weekStats = {
    studyTime: { value: '12.5', change: 15, label: 'Hours this week' },
    tasksCompleted: { value: '24/30', change: 8, label: 'Tasks this week' },
    notesCreated: { value: '12', change: 20, label: 'New notes' },
    quizScore: { value: '92%', change: 5, label: 'Average score' },
  };

  getTitle = output<string>();
  user: User | null = null;

  constructor(
    public authService: AuthService,
    public themeService: ThemeService
  ) {
    this.userName = authService.getUser()?.username ?? '';
  }

  ngOnInit(): void {
    this.getTitle.emit('Dashboard');
    this.user = this.authService.getUser();
  }

  toggleTaskStatus(index: number): void {
    this.tasks[index].completed = !this.tasks[index].completed;
  }

  addNewNote(): void {
    // Implement add note functionality
  }

  addNewTask(): void {
    // Implement add task functionality
  }

  addSession(): void {
    // Implement add session functionality
  }
}
