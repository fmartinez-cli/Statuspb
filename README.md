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

<img width="566" height="595" alt="image" src="https://github.com/user-attachments/assets/fcd1c835-76ae-4c8e-87cd-95b68a70c538" />

 DATABASE SCHEMA


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
