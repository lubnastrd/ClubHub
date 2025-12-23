ClubHub – Organization Management System

ClubHub is a web-based application built with Laravel to help organizations or communities manage their members, schedules, events, and attendance in a centralized, modern, and user-friendly system.

The application implements role-based access control (Admin & Member) with distinct dashboards and a clean, responsive user interface.

✨ Key Features
🔐 Authentication & Roles

User login and logout

Role separation between Admin and Member

Dedicated dashboard for each role

👥 Member Management

View and manage organization members

Structured and readable member data

📅 Activity Schedule

Manage organization activity schedules

Clean and informative schedule display

🎉 Organization Events

Event listing for members

Event detail pop-up for members, including:

Event poster

Full event description

Interactive and user-friendly presentation

📝 Attendance Management

Attendance recording for activities

Member attendance monitoring

🧑‍💻 Technologies Used

Laravel – Backend framework

Blade Template Engine – Server-side rendering

Tailwind CSS – Utility-first CSS framework

Livewire Flux – UI components and interactions

Vanilla JavaScript – Lightweight modal interactions

Flatpickr – Date and time picker

🎨 UI & Design

Modern interface powered by Tailwind CSS

Supports light mode and dark mode

Interactive sidebar navigation

Readable and well-styled data tables

Modal pop-ups for event details

📁 Module Structure
├── Dashboard
├── Member Data
├── Schedule
├── Events
├── Attendance
└── Profile Settings

🚀 Installation Guide
git clone https://github.com/lubnastrd/clubhub.git
cd clubhub
composer install
npm install
npm run build
php artisan migrate
php artisan serve

📌 Notes

Ensure the .env file is properly configured

Storage link is required to display event posters:

php artisan storage:link

📄 License

This project was developed for educational and organizational system development purposes.
You are free to use and extend it according to your needs.
