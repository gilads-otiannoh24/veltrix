import {
  HttpEvent,
  HttpHandler,
  HttpInterceptor,
  HttpRequest,
} from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from '../../../environments/environment';

@Injectable({
  providedIn: 'root',
})
export class HttpInterceptorService implements HttpInterceptor {
  private baseUrl: string = environment.apiUrl;

  constructor() {}

  intercept(
    req: HttpRequest<any>,
    next: HttpHandler
  ): Observable<HttpEvent<any>> {
    const clonedRequest = req.clone({
      setHeaders: {
        'Content-Type': 'application/json',
        Authorization: 'Bearer ',
      },
      withCredentials: true,
    });

    if (clonedRequest.url.startsWith('http')) {
      return next.handle(clonedRequest);
    }

    // Prepend base URL to the request
    const modifiedReq = clonedRequest.clone({
      url: `${this.baseUrl}${req.url}`,
    });

    return next.handle(modifiedReq);
  }
}
