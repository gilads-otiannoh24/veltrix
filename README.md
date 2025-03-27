# Veltrix - AI-Powered Study Tool

Veltrix is an innovative study tool designed to help students study more effectively by generating AI-powered short notes from uploaded study materials. The platform provides an intuitive and seamless experience for students to summarize, edit, and organize their notes efficiently.

## Features

- **AI-Powered Note Generation** - Upload study materials and receive concise, well-structured short notes.
- **Built-in Text Editor** - Edit and refine AI-generated notes with an easy-to-use editor.
- **Cloud Storage** - Save and access notes from anywhere.
- **Dark Mode** - Comfortable reading for late-night study sessions.
- **User-Friendly Interface** - Minimalist and sleek design with a **purple-themed UI**.

## Tech Stack

### Frontend

- **Angular** - Modern and reactive UI framework.
- **AlpineJS (Optional Enhancements)** - For lightweight UI interactions.
- **Tailwind CSS** - For fast and efficient styling.
- **Quill.js** - A rich text editor for note editing.

### Backend

- **CodeIgniter 4** - Robust and lightweight PHP framework for API development.
- **JWT Authentication** - Secure user authentication.
- **MySQL (Dockerized)** - Database for storing user data and study notes.

### AI Integration

- **Google Gemini API (or other AI models)** - AI-powered text summarization for generating short notes.

## Installation

### Prerequisites

Ensure you have the following installed:

- Node.js & npm
- PHP 8+
- Composer
- MySQL (or Docker for containerized setup)

### Setup Instructions

#### Backend (CodeIgniter 4)

1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/veltrix.git
   cd veltrix/backend
   ```
2. Install dependencies:
   ```bash
   composer install
   ```
3. Configure environment:
   - Copy `.env.example` to `.env` and update database credentials.
   - Run migrations if applicable:
     ```bash
     php spark migrate
     ```
4. Start the development server:
   ```bash
   php spark serve
   ```

#### Frontend (Angular)

1. Navigate to the frontend directory:
   ```bash
   cd ../frontend
   ```
2. Install dependencies:
   ```bash
   npm install
   ```
3. Start the development server:
   ```bash
   ng serve --open
   ```

## API Versioning & Rate Limiting

- API follows **RESTful principles** with **versioning (e.g., /api/v1/...)**.
- Rate limiting is enforced to prevent excessive usage and abuse.

## Future Enhancements

- **Lecturer & Tutor Integration** - Provide additional tools for lesson planning.
- **Gamification & Study Challenges** - Engage students with interactive study tools.
- **Mobile App** - Expand Veltrix into a cross-platform experience.
- **AI Model Customization** - Enable users to tweak AI-generated summaries based on their preferences.

## License

This project is licensed under the MIT License.

## Contributing

Contributions are welcome! Feel free to open an issue or submit a pull request.

## Contact

For inquiries, reach out via [your-email@example.com] or visit the [GitHub Repository](https://github.com/yourusername/veltrix).
