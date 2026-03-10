# 🖥️ Test Dashboard — Manufacturing Communication & Monitoring System

A real-time web communication and traceability system for production floors operating across rotating shifts. Designed for **Technicians, Jr. Engineers, Sr. Engineers, and Area Leaders** to share structured information across 3 to 6 shifts (morning, afternoon, night, and weekends) — without losing context between handoffs.

> ⚡ Optimized to run on **HP T620 Thin Clients** (AMD GX-415GA · 4 GB RAM · Windows 8.1) — no installation required at the workstation.

---

## 📸 Screenshots

> _(Add screenshots of the dashboard, bay view, and statistics panel for maximum visual impact)_

---

## 🎯 Purpose

In multi-shift manufacturing environments, critical information about rack status is frequently lost between shift handoffs. This system solves that problem by centralizing communication in a single web interface, tailored to the **role and responsibility of each user**:

| Role | What the system provides |
|---|---|
| **Technician** | Views their assigned rack's status, tracks test progress, and leaves follow-up comments |
| **Jr. Engineer** | Monitors all racks in their assigned bay, logs observations, and tracks progress per shift |
| **Sr. Engineer / Area Leader** | Global view grouped by Work Order (WO); reviews comments, time statistics, and overall line status |
| **Administrator** | Full user management, system configuration, and immutable audit log |

Information flows from the individual rack → bay → Work Order → full line, regardless of which shift generated it.

---

## 🚀 Features

- **Bay View** — Real-time rack grid with live status (PASS / FAIL / RUNNING / WAITING / PENDING) per rack position (`TR01-01` to `TR01-N`).
- **Per-Rack Comments** — Technicians and Jr. Engineers leave notes visible to incoming shifts.
- **Work Order Grouping** — Sr. Engineers and Leaders view consolidated WO progress without navigating rack by rack.
- **Time Statistics** — Processing times per test, rack, and WO to identify bottlenecks across shifts.
- **Seamless Shift Handoffs** — Incoming operators see the complete history of every rack from the moment they log in.
- **Excel Export** — Download WO data as `.xlsx` for offline reporting.
- **Admin Panel** — User CRUD with role levels, shifts, and bay assignments. Immutable audit log for all sensitive operations.
- **Lightweight Login** — CSS-only modal dialog; no full-page redirect — ideal for quick sessions on thin clients.
- **Responsive Low-Resource UI** — Bootstrap 5 with glassmorphism navbar; optimized for modern browsers on limited hardware.

---

## 🛠️ Tech Stack

| Layer | Technology |
|---|---|
| Backend | PHP 8+ (procedural + OOP utilities) |
| Database | MySQL / MariaDB |
| Frontend | HTML5, CSS3, Bootstrap 5.3, Font Awesome 6 |
| Charts | Chart.js, ECharts, FusionCharts |
| Tables | jQuery DataTables (Buttons + Editor) |
| Authentication | PHP Sessions + SHA1 hashing |
| Export | FileSaver.js + custom Excel exporter |

---

## 📁 Project Structure

```
generic/
├── bootstrap.php                  # DB connection + session bootstrap
├── config/
│   ├── functions.php              # Helpers: status color coding, data migration utils
│   ├── queries.php                # Per-location rack + test queries (TR01-01 … TR01-N)
│   └── unit_config.php            # Unit/site configuration constants
├── pages/
│   ├── index.php                  # Main dashboard (KPIs, recent racks, recent tests)
│   ├── login.php / logout.php     # Authentication
│   ├── bay1.php … bay_table.php   # Bay view: live rack layout grid
│   ├── status.php                 # Full floor general status overview
│   ├── stats.php                  # Time-based performance statistics
│   ├── wo_stats.php               # Consolidated Work Order statistics
│   ├── register_rack.php          # Register a rack into a position
│   ├── update_tests.php           # Update test results for a rack
│   ├── add_comment.php            # Add a comment to a rack
│   ├── clean_rack.php             # Release a position upon completion
│   ├── export_wo.php              # Export WO data to Excel
│   ├── admin_panel.php            # User management and audit log
│   ├── modals.php                 # Rack detail modal (serial number lookup)
│   └── manual.php                 # Inline user manual
├── dist/
│   ├── Chart.bundle.js / .min.js
│   └── factory_test_system.sql    # Database schema and seed data
├── js/                            # Third-party and custom JS libraries
├── fonts/                         # Font Awesome + Glyphicons
└── img/                           # UI images and icons
```

---

## ⚙️ Installation

### Requirements

- PHP 8.0+
- MySQL 5.7+ or MariaDB 10.4+
- Apache or Nginx with `mod_rewrite` enabled
- Modern browser (Chrome, Firefox, Edge) — no installation required on the thin client

### Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/fmartinez-cli/test-dashboard.git
   cd test-dashboard
   ```

2. **Create the database**
   ```bash
   mysql -u root -p -e "CREATE DATABASE factory_test_system CHARACTER SET utf8mb4;"
   mysql -u root -p factory_test_system < generic/dist/factory_test_system.sql
   ```

3. **Configure the connection**

   Edit `generic/bootstrap.php`:
   ```php
   $host     = 'localhost';
   $user     = 'your_db_user';
   $password = 'your_db_password';
   $database = 'factory_test_system';
   ```

4. **Set up the virtual host**

   Point your web server document root to the project directory. The default internal path is `/Statuspb/`. This can be adjusted via an Apache/Nginx alias.

5. **Access the application**
   ```
   http://your-server/Statuspb/pages/index.php
   ```

---

## 🗄️ Database — Key Tables

| Table | Description |
|---|---|
| `racks` | Rack inventory: serial number, WO, location, model, status |
| `rack_models` | Model catalog with production unit associations |
| `test_results` | Per-rack test outcomes with start/end timestamps |
| `test_catalog` | Master list of available tests and sequence order |
| `users` | User accounts with role level, shift, bay assignment, and last login |
| `audit_log` | Immutable log of all administrative operations |

---

## 👤 Access Levels

| Level | Role | Access |
|---|---|---|
| 1 | Technician | View assigned rack, register/update racks, add comments |
| 2 | Jr. Engineer | Full bay monitoring, comments, shift-by-shift tracking |
| 3 | Sr. Engineer / Area Leader | Statistics, WO-level views, time reports, full floor visibility |
| 99 | Administrator | Full access: user management, system config, audit log |

---

## 📊 Key Pages

| Page | URL | Description |
|---|---|---|
| Dashboard | `/pages/index.php` | Overview: KPI cards + recent racks and tests |
| Bay View | `/pages/bay1.php` | Live rack grid for a specific bay |
| General Status | `/pages/status.php` | Full floor snapshot |
| Times / Stats | `/pages/stats.php` | Rack processing time analytics |
| WO Statistics | `/pages/wo_stats.php` | Work order completion metrics |
| Admin Panel | `/pages/admin_panel.php` | User and system administration |

---

## 🔄 Shift Handoff Workflow

```
Outgoing Shift                        Incoming Shift
──────────────────────────────────    ──────────────────────────────────
Technician leaves rack comment   ───► New technician sees full history
Jr. Engineer updates test result ───► Jr. Engineer resumes from last state
                                      Sr. Engineer / Leader reviews WO
                                      regardless of which shift did what
```

---

## 🖥️ Production Environment

The system was designed and tested to run on limited thin client hardware:

- **Device:** HP Thin Client T620
- **Processor:** AMD GX-415GA
- **Memory:** 4.0 GB RAM
- **Operating System:** Windows 8.1
- **Access:** Web browser pointing to the central server — no local installation

All logic and data reside on the server; the thin client only renders the interface.

---

## 🔒 Security Notes

- Passwords are stored as SHA1 hashes. For production, migrating to `password_hash()` with bcrypt is recommended.
- All user inputs are sanitized with `mysqli_real_escape_string`. Migrating to PDO with prepared statements is recommended for stronger protection.
- Authentication is managed via PHP sessions.
- All administrative operations are recorded in the `audit_log` table.

---

## 🤝 Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you'd like to change.

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/my-feature`)
3. Commit your changes (`git commit -m 'feat: description of change'`)
4. Push to the branch (`git push origin feature/my-feature`)
5. Open a Pull Request

---

## 📄 License

This project is licensed under the [MIT License](LICENSE).

---

## 👨‍💻 Author

**Fernando Martinez Barbosa**
- LinkedIn: [linkedin.com/in/your-profile](https://linkedin.com/in/your-profile)
- GitHub: [@fmartinez-cli](https://github.com/fmartinez-cli)

---

> _Built to solve a real communication problem in manufacturing: making sure the morning shift technician knows exactly where the night shift technician left off._
