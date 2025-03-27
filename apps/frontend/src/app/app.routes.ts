import { Routes } from '@angular/router';
import { SignupComponent } from './pages/auth/signup/signup.component';
import { HomeComponent } from './pages/home/home.component';
import { AuthGuard } from './core/guards/auth.guard';
import { DashboardComponent } from './pages/dashboard/dashboard.component';
import { LoginComponent } from './pages/auth/login/login.component';
import { AppLayoutComponent } from './layouts/app/app.component';
import { MyNotesComponent } from './pages/my-notes/my-notes.component';
import { ProgressComponent } from './pages/progress/progress.component';
import { CommunityComponent } from './pages/community/community.component';
import { StudyAreaComponent } from './pages/study-area/study-area.component';
import { StudyPlanComponent } from './pages/study-plan/study-plan.component';
import { ProfileComponent } from './pages/profile/profile.component';
import { SettingsComponent } from './pages/settings/settings.component';
import { StudyArea2Component } from './pages/study-area2/study-area2.component';
import { Error404Component } from './pages/errors/error-404/error-404.component';
import { Error401Component } from './pages/errors/error-401/error-401.component';
import { Error403Component } from './pages/errors/error-403/error-403.component';
import { Error500Component } from './pages/errors/error-500/error-500.component';
import { ForgotPasswordComponent } from './pages/auth/forgot-password/forgot-password.component';
import { NotAuthGuard } from './core/guards/not-auth.guard';
import { TermsOfServiceComponent } from './pages/terms-of-service/terms-of-service.component';
import { AboutUsComponent } from './pages/about-us/about-us.component';
import { ContactUsComponent } from './pages/contact-us/contact-us.component';
import { CookiePolicyComponent } from './pages/cookie-policy/cookie-policy.component';
import { MaintenanceComponent } from './pages/maintenance/maintenance.component';
import { PrivacyPolicyComponent } from './pages/privacy-policy/privacy-policy.component';

export const routes: Routes = [
  {
    path: '',
    title: 'Veltrix | Home',
    component: HomeComponent,
    pathMatch: 'full',
  },

  // legal and public
  {
    path: 'terms-of-service',
    title: 'Veltrx | Terms of Service',
    component: TermsOfServiceComponent,
  },
  {
    path: 'about-us',
    title: 'Veltrx | About Us',
    component: AboutUsComponent,
  },
  {
    path: 'contact-us',
    title: 'Veltrx | Contact Us',
    component: ContactUsComponent,
  },
  {
    path: 'cookie-policy',
    title: 'Veltrx | Cookie Policy',
    component: CookiePolicyComponent,
  },
  {
    path: 'maintenance',
    title: 'Veltrx | Maintenance',
    component: MaintenanceComponent,
  },
  {
    path: 'privacy-policy',
    title: 'Veltrx | Privacy Policy',
    component: PrivacyPolicyComponent,
  },

  // auth
  {
    path: '',

    children: [
      {
        path: 'signup',
        component: SignupComponent,
        title: 'Veltrix | Signup',
        canActivate: [NotAuthGuard],
      },
      {
        path: 'login',
        component: LoginComponent,
        title: 'Veltrix | Login',
        canActivate: [NotAuthGuard],
      },
      {
        path: 'forgot-password',
        component: ForgotPasswordComponent,
        title: 'Veltrix | Recover Password',
        canActivate: [NotAuthGuard],
      },
    ],
  },

  // dashboard
  {
    path: '',
    component: AppLayoutComponent,
    children: [
      {
        path: 'dashboard',
        title: 'Veltrix | Dashboard',
        component: DashboardComponent,
        canActivate: [AuthGuard],
      },
      {
        path: 'my-notes',
        title: 'Veltrix | My Notes',
        component: MyNotesComponent,
        canActivate: [AuthGuard],
      },
      {
        path: 'progress',
        title: 'Veltrix | Progress',
        component: ProgressComponent,
        canActivate: [AuthGuard],
      },
      {
        path: 'study-area',
        title: 'Veltrix | Study Area',
        component: StudyAreaComponent,
        canActivate: [AuthGuard],
      },
      {
        path: 'study-area2',
        title: 'Veltrix | Study Area',
        component: StudyArea2Component,
        canActivate: [AuthGuard],
      },
      {
        path: 'study-plan',
        title: 'Veltrix | Study Plan',
        component: StudyPlanComponent,
        canActivate: [AuthGuard],
      },
      {
        path: 'profile',
        title: 'Veltrix | Profile',
        component: ProfileComponent,
        canActivate: [AuthGuard],
      },
      {
        path: 'settings',
        title: 'Veltrix | Settings',
        component: SettingsComponent,
        canActivate: [AuthGuard],
      },
    ],
  },

  {
    path: 'community',
    title: 'Veltrix | Community',
    component: CommunityComponent,
  },

  {
    path: 'error-401',
    component: Error401Component,
    title: '401 Unauthorized',
  },

  {
    path: 'error-403',
    component: Error403Component,
    title: '403 Access Denied',
  },

  {
    path: 'error-500',
    component: Error500Component,
    title: '500 Server Error',
  },

  { path: '**', component: Error404Component, title: '404 Not Found' },
];
