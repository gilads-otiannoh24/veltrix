import { Injectable } from '@angular/core';
import { Subscription, timer } from 'rxjs';

export interface Alert {
  id: number;
  message: string;
  type: 'warning' | 'error' | 'success' | 'info';
}

@Injectable({
  providedIn: 'root',
})
export class GlobalToastService {
  alerts: Alert[] = [];
  activeTimeouts = new Map<number, Subscription>();

  constructor() {}

  addAlert(alert: Alert): void {
    this.alerts.push(alert);

    const timeout = timer(7000).subscribe(() => this.removeAlert(alert.id));

    this.activeTimeouts.set(alert.id, timeout);
  }

  getNextId(): number {
    let id = this.alerts.length;

    while (
      this.alerts.some((n) => n.id === id) ||
      this.activeTimeouts.has(id)
    ) {
      id++;
    }

    return id;
  }

  removeAlert(id: number): void {
    this.alerts = this.alerts.filter((a) => a.id !== id);

    if (this.activeTimeouts.has(id)) {
      this.activeTimeouts.get(id)?.unsubscribe();
      this.activeTimeouts.delete(id);
    }
  }

  new(message: string, type: 'warning' | 'error' | 'success' | 'info') {
    const alert: Alert = {
      id: this.getNextId(),
      message: message,
      type: type,
    };

    this.addAlert(alert);
  }
}
