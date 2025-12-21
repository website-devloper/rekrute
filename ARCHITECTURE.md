con# System Architecture

## Overview
**Rekrute** is a web-based recruitment platform connecting Candidates and Recruiters. The system is built using the **Laravel Framework** (v10) and follows a traditional **MVC (Model-View-Controller)** architecture.

## Technology Stack
- **Backend**: PHP 8.1+, Laravel 10
- **Frontend**: Blade Templates, Bootstrap 5, Vanilla CSS/JS
- **Build Tool**: Vite (Initialized, currently manual asset loading)
- **Database**: MySQL

## Core Modules

### 1. **Authentication & Authorization**
- **Roles**: Candidate, Recruiter.
- **Flows**: Sign Up, Sign In, Forgot Password.
- **Controllers**: `HomeController` (Auth logic mixed), `RecruterController`, `CandidateController`.

### 2. **Recruiter Module**
- **Features**:
  - Company Profile Management.
  - Job Posting (`jobs` table).
  - Application Management.
- **Key Controller**: `RecruterController`

### 3. **Candidate Module**
- **Features**:
  - Profile / CV Management (`candidates` table).
  - Job Search & Filtering.
  - Job Applications (`applications` table).
- **Key Controller**: `CandidateController`

## Data Architecture (Schema)
Based on migrations:
- `users`: Core authentication identity.
- `employers`: Extended profile for recruiters/companies.
- `candidates`: Extended profile for job seekers.
- `jobs`: Job listings linked to Employers.
- `applications`: Join table between Candidates and Jobs.
- `job_alerts`: Notification preferences.
- `job_categories`: Taxonomy for jobs.

## Directory Structure
- `app/Http/Controllers`: Application logic.
- `app/Models`: Eloquent ORM definitions.
- `resources/views`: Blade templates organized by user role (`candidate/`, `recruter/`).
- `public/assets`: Static assets (CSS/JS/Fonts).

## Architectural Improvements & Progress
To scale the application, the following architectural upgrades differ from the original state:

### Completed Upgrades
-   **Vite Integration**: 
    -   Moved all CSS assets to `resources/css`.
    -   Configured `vite.config.js` with multiple entry points.
    -   Updated Blade templates to use `@vite()` directive.
    -   Converted Bootstrap to NPM dependency (`resources/js/app.js`).
-   **Route Organization**: 
    -   Refactored `routes/web.php` to use `Route::controller` and `Route::group`.
    -   Grouped routes by feature (Auth, Recruiter, Candidate).
-   **Blade Components**: 
    -   Created `<x-navbar />` and `<x-footer />` components in `resources/views/components`.
    -   Refactored `template.blade.php` to use component syntax.

### Future Roadmap
#### Backend
-   **Service Layer**: Extract business logic (e.g., `ApplyJob`, `PostJob`) from Controllers into dedicated *Services* (e.g., `JobService`, `ApplicationService`) to keep Controllers skinny.
-   **Validation**: Move validation logic from Controllers to FormRequests.

#### Frontend
-   **Component Library**: Extract repeatable UI elements (Job Cards, Buttons, Inputs) into Blade Components.
-   **Asset Cleanup**: Remove unused legacy assets from `public/assets`.

### Infrastructure
-   **CI/CD**: Setup automated testing and deployment pipelines.
