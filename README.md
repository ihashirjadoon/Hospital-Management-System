# Appointify Hospital Management System

Welcome to the Appointify Hospital Management System repository! This repository contains the source code for a hospital management system designed to facilitate appointment scheduling for COVID tests and vaccines.

## Overview

Appointify is a web-based platform that allows local hospitals to register themselves and manage appointments for COVID tests and vaccines. Patients can browse hospitals, select doctors, and schedule appointments for tests or vaccinations. The system includes three panels: Admin, Hospital, and Patient.

### Features:
- **Hospital Registration**: Hospitals can register themselves on the platform.
- **Appointment Management**: Hospitals can manage appointments, approve or cancel appointment requests.
- **Patient Registration**: Patients can register on the platform to schedule appointments.
- **Admin Panel**: Admin has access to all functionalities, including managing hospital registrations, approving appointments, and overseeing system operations.
- **Test Report Submission**: Hospitals can post test reports on the platform for patients to download.

## Repository Structure

The repository is organized as follows:

- **.vscode**: Contains settings for Visual Studio Code.
- **assets**: Contains additional assets such as images.
- **css**: Cascading Style Sheets for styling the website.
- **database**: Contains the MySQL database file (`appointify.sql`) for setting up the database.
- **hospital**: Files related to the hospital panel, including:
  - PHP files for hospital dashboard, login, logout, and managing appointments.
- **images**: Images used in the website.
- **js**: JavaScript files for implementing functionality.
- **Admin**: Files related to the admin panel, including:
  - PHP files for admin dashboard, login, logout, managing hospitals, and appointments.
- Individual PHP files for various functionalities, including:
  - `index.php`: Homepage.
  - `about.php`: About page.
  - `doctors.php`: List of doctors.
  - `news.php`: News section.
  - `protect.php`: Information on COVID protection.
  - `register_hospital.php`: Hospital registration page.

## Usage

1. Clone this repository to your local machine.
2. Set up a web server environment (e.g., XAMPP).
3. Import the `appointify.sql` database file into your MySQL database.
4. Configure the database connection in the PHP files if necessary.
5. Access the website through a web browser.

```bash
git clone https://github.com/your-username/hospital-management-system.git

```

## Download XAMPP

To set up a local web server environment, download XAMPP from the following link:

[Download XAMPP](https://www.apachefriends.org/download.html)

### Contributing

Contributions to the Appointify Hospital Management System are welcome! Feel free to fork this repository, make changes, and submit pull requests.

### License

This project is licensed under the MIT License.
