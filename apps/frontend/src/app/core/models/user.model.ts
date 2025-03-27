export interface User {
  id: string;
  username: string;
  email: string;
  role: 'student' | 'admin';
  profilePicture?: string;
}

export interface AuthResponse {
  user: User;
  token: string;
}
