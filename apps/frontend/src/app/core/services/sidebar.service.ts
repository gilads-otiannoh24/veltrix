import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root',
})
export class SidebarService {
  sidebarOpen = true;
  partiallyOpen = false;
  isMobile = false;

  constructor() {
    this.isMobile = window.innerWidth < 1024;
    this.performMobileTasks();

    window.addEventListener('resize', () => {
      this.isMobile = window.innerWidth < 1024;

      this.performMobileTasks();
    });
  }

  private performMobileTasks() {
    if (this.isMobile) {
      this.sidebarOpen = false;
      this.partiallyOpen = false;
    } else {
      this.sidebarOpen = true;
    }
  }

  openSidebar() {
    this.sidebarOpen = true;
  }

  closeSidebar() {
    this.sidebarOpen = false;
  }

  toggleSidebar() {
    this.sidebarOpen = !this.sidebarOpen;
  }
  partiallyOpenSidebar() {
    this.partiallyOpen = true;
  }

  partiallyCloseSidebar() {
    this.partiallyOpen = false;
  }

  partiallyToggleSidebar() {
    this.partiallyOpen = !this.partiallyOpen;
  }
}
