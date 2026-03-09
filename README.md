# 🖥️ Test Dashboard — Manufacturing Quality Control System

A web-based dashboard for real-time monitoring and management of rack testing in manufacturing environments. Built to support multi-line, multi-bay production floors with role-based access control, live test tracking, and statistical reporting.

---

## 📸 Screenshots

> _Dashboard · Bay Status · Statistics_
> _(Add screenshots of your running application here for maximum impact)_

---

## 🚀 Features

- **Real-time Test Monitoring** — Track each rack's test status (PASS / FAIL / RUNNING / WAITING) per bay and production line.
- **Multi-line Bay Layout** — Supports up to 5 production lines × 2 bays each (10 bays total), configurable per unit.
- **Role-based Access Control** — Three user levels: Technician, Engineer/Leader, and Administrator (level 99).
- **Work Order Management** — Associate racks to work orders (WO), filter and query by WO or model.
- **Statistical Reports** — View time-based and WO-based performance metrics with interactive charts (Chart.js / ECharts).
- **Admin Panel** — Full CRUD for users, with audit log for every sensitive operation.
- **Rack Lifecycle** — Register, update tests, add comments, clean racks, and export data.
- **Excel Export** — Download work order data as `.xlsx` for offline analysis.
- **Responsive UI** — Glassmorphism navbar + Bootstrap 5 layout, works on desktop and large tablets.
- **Login Modal** — Lightweight CSS-only login dialog; no full-page redirect needed.

---

## 🛠️ Tech Stack

| Layer      | Technology                                      |
|------------|-------------------------------------------------|
| Backend    | PHP 8+ (procedural + OOP utilities)             |
| Database   | MySQL / MariaDB                                 |
| Frontend   | HTML5, CSS3, Bootstrap 5.3, Font Awesome 6      |
| Charts     | Chart.js, ECharts, FusionCharts                 |
| Tables     | jQuery DataTables (with Buttons & Editor)       |
| Auth       | PHP Sessions + SHA1 password hashing            |
| Export     | FileSaver.js + custom Excel export              |

---

## 📁 Project Structure

```
generic/
├── bootstrap.php              # DB connection + session bootstrap
├── config/
│   ├── functions.php          # Helper functions (status color, migration utils)
│   ├── queries.php            # Per-location rack + test queries (TR01-01 … TR01-N)
│   └── unit_config.php        # Unit/site configuration constants
├── pages/
│   ├── index.php              # Main dashboard (stats, recent racks, recent tests)
│   ├── login.php              # Authentication handler
│   ├── logout.php             # Session destroy + redirect
│   ├── bay1.php – bay_table.php  # Per-bay rack layout views
│   ├── status.php             # General floor status overview
│   ├── stats.php              # Time-based performance statistics
│   ├── wo_stats.php           # Work order statistics
│   ├── register_rack.php      # Register a new rack into a location
│   ├── update_tests.php       # Update test results for a rack
│   ├── add_comment.php        # Add technician comments
│   ├── clean_rack.php         # Release/clear a rack from a location
│   ├── export_wo.php          # Export WO data to Excel
│   ├── admin_panel.php        # Admin: user management + audit log
│   ├── modals.php             # Rack detail modal (serial lookup)
│   └── manual.php             # Inline user manual
├── dist/
│   ├── Chart.bundle.js / .min.js
│   └── factory_test_system.sql           # Database schema and seed data
├── js/                        # Third-party and custom JS libraries
├── fonts/                     # Font Awesome + Glyphicons
└── img/                       # UI images and icons
```

---

## ⚙️ Installation

### Prerequisites

- PHP 8.0+
- MySQL 5.7+ or MariaDB 10.4+
- Apache or Nginx with `mod_rewrite` enabled
- Composer _(optional, no external PHP packages required)_

### Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/YOUR_USERNAME/test-dashboard.git
   cd test-dashboard
   ```

2. **Create the database**
   ```bash
   mysql -u root -p -e "CREATE DATABASE factory_test_system CHARACTER SET utf8mb4;"
   mysql -u root -p factory_test_system < generic/dist/statuspb.sql
   ```

3. **Configure the connection**

   Edit `generic/bootstrap.php` and update the credentials:
   ```php
   $host     = 'localhost';
   $user     = 'your_db_user';
   $password = 'your_db_password';
   $database = 'factory_test_system';
   ```

4. **Set virtual host / document root**

   Point your web server to the project root. The default internal path is `/Statuspb/`. You can update this in `index.php` and other pages, or configure an Apache/Nginx alias.

5. **Access the application**
   ```
   http://localhost/Statuspb/pages/index.php
   ```

> **Default admin account:** Set up via `admin_panel.php` after first login, or seed the `users` table directly using the SQL schema.

---

## 🗄️ Database Schema (key tables)

| Table           | Description                                         |
|-----------------|-----------------------------------------------------|
| `racks`         | Rack inventory with serial, WO, location, model, status |
| `rack_models`   | Model catalog with unit associations                |
| `test_results`  | Per-rack test outcomes with status and timestamps   |
| `test_catalog`  | Master list of available tests and sequence order   |
| `users`         | Operator/engineer accounts with level and shift     |
| `audit_log`     | Immutable log of all admin operations               |

---

## 👤 User Levels

| Level | Role              | Permissions                                      |
|-------|-------------------|--------------------------------------------------|
| 1     | Technician        | View bays, register/update racks, add comments   |
| 3     | Engineer / Leader | All of above + statistics, WO reports            |
| 99    | Administrator     | Full access including user management, audit log |

---

## 📊 Key Pages

| Page            | URL                  | Description                          |
|-----------------|----------------------|--------------------------------------|
| Dashboard       | `/pages/index.php`   | Overview: stats cards + recent data  |
| Bay View        | `/pages/bay1.php`    | Live rack grid for a specific bay    |
| General Status  | `/pages/status.php`  | Full floor snapshot                  |
| Times / Stats   | `/pages/stats.php`   | Rack processing time analytics       |
| WO Statistics   | `/pages/wo_stats.php`| Work order completion metrics        |
| Admin Panel     | `/pages/admin_panel.php` | User & system administration     |

---

## 🔒 Security Notes

- Passwords are stored as SHA1 hashes. For production, migrate to `password_hash()` / `password_verify()` with bcrypt.
- All user inputs are sanitized with `mysqli_real_escape_string` before queries. Consider migrating to PDO prepared statements for stronger protection.
- Session-based authentication guards all sensitive pages.
- Admin operations are fully logged in the `audit_log` table.

---

## 🤝 Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/my-feature`)
3. Commit your changes (`git commit -m 'Add my feature'`)
4. Push to the branch (`git push origin feature/my-feature`)
5. Open a Pull Request

---

## 📄 License

This project is licensed under the [MIT License](LICENSE).

---

## 👨‍💻 Author

**[Your Name]**
- LinkedIn: [linkedin.com/in/yourprofile](https://linkedin.com/in/yourprofile)
- GitHub: [@YOUR_USERNAME](https://github.com/YOUR_USERNAME)

---

> _Built to solve a real operational need: giving test engineers and technicians instant visibility into every rack on the floor — from registration to sign-off._
