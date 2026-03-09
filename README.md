# 📊 Status Dashboard

Real-time server monitoring dashboard (node, server, and work order levels).

## 🚀 Demo

![Dashboard Demo](demo/status-dashboard-demo.gif)

*Quick overview: server navigation and real-time data updates.*

## ✨ Features

- Multi-level monitoring (node, server, work order)
- Dynamic filters by status and location
- Responsive interface for technicians and engineers

## 🛠️ Tech Stack

- PHP, MySQL, HTML/CSS, JavaScript
- Bootstrap 5 for responsive design

================================================================================
                    TEST DASHBOARD - PROJECT STRUCTURE
================================================================================

STATUSPB/
│
├── 📁 .git/                      # Version control
├── 📄 .gitignore                  # Git ignore file
├── 📄 README.md                   # Project documentation
├── 📄 LICENSE                      # MIT License
│
├── 🐘 index.php                     # Main entry point
├── 🐘 conexion.php                  # Database connection
│
├── 📁 modules/                      # Core application
│   └── 📁 generic/
│       ├── 🐘 bootstrap.php          # Bootstrap loader
│       │
│       ├── 📁 config/                # Configuration
│       │   ├── 🐘 functions.php
│       │   ├── 🐘 queries.php
│       │   └── 🐘 unit_config.php
│       │
│       └── 📁 pages/                  # Application pages
│           ├── 🐘 index.php             # Dashboard home
│           ├── 🐘 bay1.php - bay10.php  # Bay pages
│           ├── 🐘 bay_table.php         # Bay table view
│           ├── 🐘 status.php             # General status
│           ├── 🐘 stats.php              # Statistics main
│           ├── 🐘 wo_stats.php           # WO statistics
│           ├── 🐘 export_wo.php          # Excel export
│           ├── 🐘 admin_panel.php        # Admin panel
│           ├── 🐘 login.php               # Login handler
│           ├── 🐘 logout.php              # Logout handler
│           ├── 🐘 modals.php              # Rack modals
│           ├── 🐘 manual.php               # User manual
│           └── 🐘 register_rack.php       # Rack registration
│
├── 📁 public/                     # Public assets
│   ├── 📁 css/                      # Stylesheets
│   │   ├── 🎨 style.css
│   │   ├── 🎨 default.css
│   │   ├── 🎨 bootstrap5.0.2.min.css
│   │   └── 🎨 dataTables/
│   │
│   ├── 📁 js/                       # JavaScript
│   │   ├── 📜 functions.js
│   │   ├── 📜 bootstrap.min.js
│   │   ├── 📜 jquery.js
│   │   └── 📁 dataTables/
│   │
│   └── 📁 img/                      # Images
│       ├── 🖼️ checkicon.png
│       ├── 🖼️ try6.jpg
│       └── 🖼️ admin.png
│
├── 📁 dist/                       # Distribution
│   ├── 📜 Chart.js
│   └── 🗄️ statuspb.sql              # Database dump
│
└── 📁 fonts/                      # Font Awesome
    └── 📁 font-awesome/

================================================================================
                         DATABASE SCHEMA
================================================================================

📊 factory_test_system
├── users
├── racks
├── rack_models
├── test_catalog
├── test_results
├── comments
├── audit_log
├── business_units
└── model_test_sequence

================================================================================
                         ACCESS LEVELS
================================================================================

👤 Level 1  - Technician
👥 Level 3  - Engineer/Leader
👑 Level 99 - Administrator

================================================================================
                         MAIN FEATURES
================================================================================

🏠 Home Dashboard     → Overview & quick access
📊 Bay Pages (1-10)   → Individual bay management
📈 Statistics         → WO search & analytics
📉 WO Statistics      → Detailed WO performance
📋 General Status     → Overall system status
👤 Admin Panel        → User & rack management
📝 Personal Notepad   → User notes (3 tabs)
📚 User Manual        → Help documentation
📎 Export to Excel    → Data export

## 📌 Key Features in Detail

### Node Level View
- Real-time status of individual nodes
- Quick health checks and alerts

### Server Level View
- Aggregated server metrics
- Performance monitoring

### Work Order Integration
- Track testing progress
- Script execution status
- Repair workflow visibility

## 🚀 Getting Started

1. Clone repository to C:\xampp\htdocs\Statuspb
2. Import database: dist/factory_test_system.sql
3. Configure database in modules/generic/bootstrap.php
4. Access: http://localhost/Statuspb/
5. Default admin: Clock: 99999 / Password: admin123

## 📄 License
Apache License, Version 2.0
