# PWA Project - Web Application Specification and Description

This project is a multi-role web application developed using the Laravel framework, fully compliant with all the required criteria and implementation standards for the **Programming of Web Applications (PWA)** university course.

* **Project Name (Folder):** aivankovic
* **Database Name:** aivankovic

---

## 🏫 Project Context & Design Disclaimer
> ⚠️ **Note for Reviewers:** This application was developed strictly as a **school/academic project** for a university course. The primary focus of development was entirely on **backend architecture, core functionalities, security, and database relational integrity**. Minimal focus was placed on custom frontend design, as UI layout relies on standard template integration rather than bespoke styling.

---

## 💻 Application Features & Overview

### 1. Public Facing Website (Accessible to all visitors)
* **Home Page:** A completely dynamic landing page that fetches and displays featured/selected records from the database in a dedicated *"Offer of the Month"* or *"Featured Items"* section.
* **Catalog / Product Showcase:** A complete list of items retrieved from the database, where each item features a functional *"Read More"* or *"Details"* link leading to a dedicated page showing the full specifications of that specific record.
* **Contact Page:** Displays transparent contact information along with an integrated responsive map.
* **UI/UX Design:** Built using a clean, fully responsive HTML template tailored for all screen sizes, featuring a functional responsive navigation menu and a transparent logo in the header.

### 2. Registered Users Area (`Role: Registered`)
* **User Profile Dashboard:** A dedicated page displaying a complete list of the logged-in user's personal data (such as order history, reservations, or user-generated posts depending on the theme).
* **Protected Functionalities:** Advanced features such as ordering forms, booking modules, rating, or commenting systems are accessible exclusively to authenticated users via hidden navigation links that appear only after a successful login.

### 3. Editor & Administration Panel (`/admin` prefix)
* **Main Dashboard:** The admin home page features an integrated dynamic **Google Chart** component for a visual overview of business statistics (e.g., number of orders per day).
* **Advanced CRUD Systems:** Implemented complete CRUD workflows for at least 3 distinct entities, rendered beautifully using the **DataTables** component (Overview, Create New, Edit, Delete).
* **Feature Toggle (Home Page Promotion):** Admin management tables include a built-in toggle option, allowing administrators to feature or un-feature any database record on the public home page with a single click.
* **WYSIWYG Editor:** Integrated an advanced rich-text editor (such as Summernote/TinyMCE) within the create and edit forms for streamlined content formatting.
* **File Upload Implementation:** Implemented a secure file upload system for uploading and storing entity media files (e.g., product images).
* **Validation Protocols:** Dual-layer validation is enforced across all forms—combining basic frontend validation (required, type) with robust backend validation via Laravel Form Requests.

---

## 🛠️ Technical Specifications & Architecture

The project has been architected following industry-standard positive practices of the Laravel ecosystem:

* **Models & Migrations:** Developed **4 core models** with properly defined and utilized database relationships, managed by **4 migration scripts** that completely map the database schema.
* **Seeders:** Programmed **4 custom seeders**. Every single database table is pre-populated with a **minimum of 5 pre-defined (seeded) records**.
* **Controllers:** Implemented **4 distinct controllers**, with at least 3 handling full CRUD operations.
* **Route Grouping:** Architectural routes within `web.php` are structured using **three different grouping methods** for optimal readability and security (`Route::middleware`, `Route::prefix('admin')`, and nested groups).
* **Authentication Engine:** The entire authentication ecosystem (Registration, Login, Password Reset) is fully handled by the official **Laravel Breeze** package.
* **Admin Interface UI:** The administration backend utilizes a professional Bootstrap-based admin template equipped with an organized sidebar navigation.
* **Version Control:** The repository includes a properly configured `.gitignore` file, successfully shielding sensitive deployment credentials like the local `.env` file from the public repository.
