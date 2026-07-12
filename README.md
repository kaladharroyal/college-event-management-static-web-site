# Neuralink Institute of Innovation - College Event Management Portal

A modern, responsive, and beautifully designed static web application for managing and coordinating college events at the **Neuralink Institute of Innovation (NII)**. This portal allows students to view event schedules, discover activities, learn more about the institute, register for various technical/non-technical events online, and contact event coordinators.

---

## 📂 Project Folder Structure

The project has been restructured into a clean, flat directory hierarchy making all primary pages immediately visible at the root level, with assets neatly organized:

```text
.
├── css/                     # Consolidated styles for the application
│   ├── activities.css
│   ├── event-schedule.css
│   ├── events.css
│   ├── index-styles.css
│   ├── learnmore.css
│   └── registration.css
├── images/                  # Image assets, banners, and coordinator photos
│   └── [All image files]
├── activities.html          # Details of various events & activities
├── connect.php              # PHP database script for registration submission
├── contact-us.html          # Contact details and coordination team profiles
├── day-1.html               # Schedule details for Day 1
├── day-2.html               # Schedule details for Day 2
├── day-3.html               # Schedule details for Day 3
├── DTI documentation.docx    # Project documentation
├── eventschedule.html       # Overview event scheduling panel
├── index.html               # Homepage / Landing page
├── learnmore.html           # Information about Neuralink Institute of Innovation
├── registration.html        # Interactive student registration form
└── success.html             # Registration success confirmation page
```

---

## 🌟 Key Features & Pages

*   **Landing Page (`index.html`):** The entryway featuring links to Event Schedules, Activities, Registration, and Contact Us, matching the institute's futuristic aesthetic.
*   **Event Schedules (`eventschedule.html` & `day-1/2/3.html`):** Multi-day schedule tracking indicating times, names of contests, and locations.
*   **Activities Showcase (`activities.html`):** Responsive grid containing descriptions for events like Hackathons, Guest Lectures, Cultural Nights, Sports, and Seminars.
*   **Student Registration (`registration.html` & `success.html`):** Responsive web form capturing student registration information. Includes input validation, reset functionality, and success confirmation pages.
*   **About & Contacts (`contact-us.html`):** Provides a visual layout of the coordination team cards and interactive social links.

---

## 🛠️ Database Setup (MySQL)

The registration form submits data via `connect.php` to a local MySQL database. Follow these steps to set up the database:

1. Open your database client (e.g., phpMyAdmin, MySQL Workbench, or CLI).
2. Execute the following SQL query to create the database and the target table:

```sql
CREATE DATABASE IF NOT EXISTS college;
USE college;

CREATE TABLE IF NOT EXISTS event_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    gender VARCHAR(50) NOT NULL,
    year INT NOT NULL,
    branch VARCHAR(100) NOT NULL,
    college_name VARCHAR(255) NOT NULL,
    reg_number VARCHAR(100) UNIQUE NOT NULL,
    participation_for VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

3. Ensure your local server credentials in `connect.php` match your environment settings:
    *   **Host:** `localhost`
    *   **Database:** `college`
    *   **User:** `kaladhar` (or `root`)
    *   **Password:** `*********` (or your MySQL password)

---

## 🚀 Running the Project Locally

### 1. Static Content Only
You can preview the front-end pages directly by opening `index.html` in any web browser. For a better developer experience, you can use the **Live Server** extension in VS Code.

### 2. Full Application (with PHP/MySQL Registration)
To test the dynamic registration functionality, run the application using a local web server tool such as **XAMPP**, **WAMP**, or **Laragon**:

1. Move/Copy the project folder to the server root (e.g., `C:/xampp/htdocs/`).
2. Start the **Apache** and **MySQL** services in your server control panel.
3. Import the SQL database configuration.
4. Navigate to `http://localhost/college-event-management-static-web-site/index.html` in your web browser.
