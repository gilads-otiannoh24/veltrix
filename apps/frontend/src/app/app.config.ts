import {
  ApplicationConfig,
  inject,
  provideAppInitializer,
  provideZoneChangeDetection,
} from '@angular/core';
import { provideRouter } from '@angular/router';

import { routes } from './app.routes';
import { ThemeService } from './core/services/theme.service';
import {
  HTTP_INTERCEPTORS,
  provideHttpClient,
  withInterceptorsFromDi,
} from '@angular/common/http';
import { HttpInterceptorService } from './core/interceptors/http.service';
import {
  provideNgIconsConfig,
  withContentSecurityPolicy,
  NgIcon,
  provideIcons,
} from '@ng-icons/core';
import { ErrorInterceptor } from './core/interceptors/error.service';

function initializeTheme() {
  const themeService = inject(ThemeService);
  themeService.loadTheme();
}

export const appConfig: ApplicationConfig = {
  providers: [
    provideZoneChangeDetection({ eventCoalescing: true }),
    provideRouter(routes),
    provideAppInitializer(initializeTheme),
    provideHttpClient(withInterceptorsFromDi()),
    {
      provide: HTTP_INTERCEPTORS,
      useClass: HttpInterceptorService,
      multi: true,
    },
    {
      provide: HTTP_INTERCEPTORS,
      useClass: ErrorInterceptor,
      multi: true,
    },
    provideNgIconsConfig(
      {
        size: '1.5em',
      },
      withContentSecurityPolicy()
    ),
  ],
};
