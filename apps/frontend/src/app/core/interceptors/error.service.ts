import {
  HttpErrorResponse,
  HttpEvent,
  HttpHandler,
  HttpInterceptor,
  HttpRequest,
} from '@angular/common/http';
import { Injectable } from '@angular/core';
import { catchError, Observable, throwError } from 'rxjs';
import { GlobalToastService } from '../services/global-toast.service';

@Injectable()
export class ErrorInterceptor implements HttpInterceptor {
  constructor(private alertService: GlobalToastService) {}

  intercept(
    req: HttpRequest<any>,
    next: HttpHandler
  ): Observable<HttpEvent<any>> {
    return next.handle(req).pipe(
      catchError((error: HttpErrorResponse) => {
        let errorMessage = '';

        // **Server-side error**
        switch (error.status) {
          case 0:
            errorMessage = 'Server is down! Please try again later.';
            break;
          case 400:
            errorMessage = 'Bad request. Please check your input.';
            break;
          case 404:
            errorMessage = 'Resource not found.';
            break;
          case 500:
            errorMessage = 'Internal Server Error! Please try again later.';
            break;
        }

        // Send error message to the alert system
        if (errorMessage) {
          this.alertService.new(errorMessage, 'error');
        }

        return throwError(() => error);
      })
    );
  }
}
