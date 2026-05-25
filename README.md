# DreamHome Property Management System

## Project Description

DreamHome is a web-based property management system that helps organize rental operations such as managing property owners, properties, tenants, staff, leases, and payments. It features a structured dashboard with role-based access control, allowing users to perform tasks efficiently while ensuring secure and organized management of rental data. 

---

## Team Members

| Name | Role | Module |
|---|---|---|
| Samantha Nicole E. Bogo | Project Controller / Developer | Module 2 - Client & Registration |
| Rishalenn Q. Pelarija | Developer | Module 1 - Property & Owner Management |
| Samantha S. Calunsag | Developer | Module 3 - Staff & Branch Management |
| Ian Kent Bris | Developer | Module 4 - Rental & Viewing Management |


---

## Tech Stack

- Laravel 13.x
- PHP 8.5
- Xampp MySQL (Local) / Railway MySQL (Production)
- Railway (Deployment)
- Tailwind CSS
- Vite
- GitHub

---

## Repository Link

```txt
https://github.com/sammieees/Dream-Home.git
```

---

## Setup Instructions

### Clone Repository

```bash
git clone https://github.com/sammieees/Dream-Home.git
cd dreamhome
```

---

### Install Dependencies

```bash
composer install
npm install
```

---

### Configure Environment

```bash
cp .env.example .env
php artisan key:generate
```

Update `.env` with your database credentials:

```env
 DB_CONNECTION=mysql
 DB_HOST=127.0.0.1
 DB_PORT=3307
 DB_DATABASE=dream_home
 DB_USERNAME=root
 DB_PASSWORD=
```

---

### Import Database

1. Open MySQL Workbench or phpMyAdmin
2. Create a database called `dream_home`
3. Run the SQL script provided in the repository
4. The script includes all tables, sample data, and triggers

---

### Run Database Migration

```bash
php artisan migrate
```

---

### Start Development Server

Open two terminals:

```bash
# Terminal 1
npm run dev

# Terminal 2
php artisan serve
```

Then open your browser at:

```txt
http://127.0.0.1:8000
```

---

## Default Login

### Admin Account

```txt
Email:    kent@gmail.com
Password: kentoy123
```

---

## Database Information

### Database Platform

```txt
Local:      XAMPP MySQL
Production: Railway MySQL
```

---

### Main Tables

| Table | Purpose |
|---|---|
| Branch | Stores branch office details |
| Staff | Stores staff information and roles |
| Properties | Stores lists of properties |
| Tenant | Stores tenant information |
| Lease | Stores lease agreements |
| Payment | Stores payment records |
| users | Stores system login accounts and roles |

---

## Role-Based Access Control

| Role | Access Level |
|---|---|
| Admin | Full access to all modules + User Management |
| Staff | Properties, Clients, Rentals, Payments |


---

## Module Assignment

| Module | Description | Assigned Developer |
|---|---|---|
| Module 1 | Property & Owner Management | Rishalenn Q. Pelarija |
| Module 2 | Client & Registration | Samantha Nicole E. Bogo |
| Module 3 | Staff & Branch Management | Samantha S. Calunsag |
| Module 4 | Rental & Viewing Management | Ian Kent A. Bris |


---

## Deployment Information

### Live URL

```txt
https://dream-home-production-bd07.up.railway.app
```

---

### Hosting Platform

```txt
Railway - https://railway.appi
```

---


## Notes

```txt
1. Make sure XAMPP Apache and MySQL are running before starting the app locally.
2. Run 'npm run dev' and 'php artisan serve' in separate terminals.
3. The default admin account is admin@dreamhome.com with password: password123.
4. Each module has its own Git branch. Members should NOT push directly to main.
5. Business Rules:
   - Lease records cannot be deleted until 3 years after expiry.
   - Property records cannot be deleted until 3 years after withdrawal.
   - Withdrawn properties cannot be inspected.
6. When deploying to Railway, make sure all environment variables are set correctly.
7. The SQL script must be run in the correct order due to foreign key constraints.
```
