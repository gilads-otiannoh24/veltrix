import { HttpClient } from '@angular/common/http';
import { effect, inject, Injectable, OnInit, signal } from '@angular/core';
import { Router } from '@angular/router';
import { Observable, tap } from 'rxjs';
import moment, { Moment } from 'moment';
import { User } from '../models/user.model';

declare var google: any;

@Injectable({
  providedIn: 'root',
})
export class AuthService {
  private user = signal<User | null>(null);
  private token = signal<string | null>(null);
  private tokenExpiry = signal<{ date: string; timezone: string } | null>(null);

  constructor(private router: Router, private http: HttpClient) {
    effect(() => {
      this.persistUser();
    });
  }

  setUser(user: User) {
    this.user.set(user);

    sessionStorage.setItem('user', JSON.stringify(user));
  }

  private persistUser() {
    const user = sessionStorage.getItem('user');

    if (user === null) {
      this.user.set(null);
      return;
    }

    this.user.set(JSON.parse(user));
  }

  setToken(token: string) {
    this.token.set(token);

    localStorage.setItem('access_token', token);
  }

  private persistToken() {
    const token = sessionStorage.getItem('token');
    this.token.set(token);
  }

  setExpiry(expiry: { date: string; timezone: string }) {
    this.tokenExpiry.set(expiry);

    localStorage.setItem('token_expiry', JSON.stringify(expiry));
  }

  private persistExpiry() {
    const tokenExp = localStorage.getItem('token_expiry');

    if (tokenExp === null) {
      this.tokenExpiry.set(null);
      return;
    }

    this.tokenExpiry.set(JSON.parse(tokenExp));
  }

  login(credentials: { email: string; password: string }): Observable<any> {
    return this.http.post('auth/login', credentials).pipe(
      tap((response: any) => {
        if (response.token) {
          this.setToken(response.token);
          this.setExpiry(response.expiry);
          this.setUser(response.user);
        }
      })
    );
  }

  loginWIthGoogle() {
    return new Promise((resolve, reject) => {
      google.accounts.id.initialize({
        client_id:
          '114732009816-kjv4ang0h8cbgc0ec2maace0je663p9i.apps.googleusercontent.com',
        callback: (response: any) => {
          console.log(response);

          this.http
            .post('auth/login/google', { code: response.credential })
            .pipe(
              tap((response: any) => {
                if (response.token) {
                  this.token.set(response.token);
                  this.tokenExpiry.set(response.expiry);
                }
              })
            )
            .subscribe({
              next: resolve,
              error: reject,
            });
        },
      });

      google.accounts.id.prompt(); // Show the one-tap sign-in prompt
    });
  }

  loginWIthFacebook(code: string) {
    this.http.post('auth/login/facebook', { code: code }).pipe(
      tap((response: any) => {
        if (response.token) {
          this.setToken(response.token);
          this.setExpiry(response.expiry);
          this.setUser(response.user);
        }
      })
    );
  }

  register(data: {
    username: string;
    email: string;
    password: string;
  }): Observable<any> {
    return this.http.post('auth/signup', data).pipe(
      tap((response: any) => {
        if (response.token) {
          this.setToken(response.token);
          this.setExpiry(response.expiry);
          this.setUser(response.user);
        }
      })
    );
  }

  logout(): void {
    this.token.set(null);
    this.tokenExpiry.set(null);

    localStorage.removeItem('token');
    localStorage.removeItem('token_expiry');
    sessionStorage.removeItem('user');
  }

  getToken(): string | false {
    this.persistToken();
    const token = this.token();

    if (token === null || token == '') return false;

    return token;
  }

  getUser(): User | null {
    return this.user();
  }

  getExpiry(): Moment | false {
    this.persistExpiry();
    const Expr = this.tokenExpiry();
    if (Expr === null) return false;

    return moment.utc(Expr.date, true);
  }

  isAuthenticated(): boolean {
    const expiry = this.getExpiry();

    if (!expiry) return false;

    return moment().isBefore(expiry);
  }
}
