# DIU Lab Portal

A robust web-based management system developed for the Department of Computer Science at Daffodil International University (DIU). The DIU Lab Portal facilitates real-time tracking, reporting, and maintenance of computer lab infrastructure. It empowers students, teachers, and administrators to interact with lab systems efficiently, streamlining operations and reducing downtime through digital management.

---

## ✨ Project Overview

The DIU Lab Portal centralizes the administration of lab computers, allowing various user roles to perform specific actions:

- **Students & Teachers**: Register, log in, and report technical issues.
- **Admins**: Monitor problems, update PC statuses, and manage lab information.
- **Super Admins**: Oversee all labs, manage admin roles, and configure system settings.

By integrating real-time problem reporting and monitoring capabilities, the system enhances productivity and ensures the timely resolution of issues.

---

## 🔮 Key Features

### User Access
- Secure registration and authentication (Students, Teachers, Admins)
- Password recovery module

### Lab Monitoring
- Report PC issues with descriptions
- View lab-wise PC health and operational status
- Track reported problems and resolutions

### Administrative Operations
- Manage lab rooms and assign PCs
- Update PC and lab statuses
- View comprehensive report dashboards

### Super Admin Capabilities
- Add/remove admin users
- Monitor cross-department labs
- Access configuration and system logs

---

## 🔹 Technology Stack

| Layer       | Technology Used             |
|-------------|-----------------------------|
| Frontend    | HTML, CSS, JavaScript       |
| Backend     | PHP                         |
| Database    | MySQL                       |
| Diagramming | PlantUML, dbdiagram.io      |
| Version control| Git & github             |

---

## 🗋 Database Schema Overview

**Database Name:** `diu_lab`

**Tables:**

1. **register_table**
   - `name`: VARCHAR
   - `email`: VARCHAR
   - `password`: VARCHAR

2. **lab_room**
   - `pc_name`: VARCHAR
   - `status`: VARCHAR

3. **problems**
   - `lab_room`: VARCHAR (FK)
   - `pc_name`: VARCHAR (FK)
   - `problem_status`: VARCHAR
   - `description`: TEXT

4. **admin**
   - `employee_id`: INT (PK)
   - `password`: VARCHAR

Entity Relationship Diagrams are stored in the documentaion folder.

---

## 🚀 Getting Started

### Prerequisites
- Web server (XAMPP)
- MySQL 

### Setup Instructions
```bash
# Step 1: Clone the Repository
git clone https://github.com/your-username/diu-lab-portal.git
cd diu-lab-portal

# Step 2: Configure Environment
cp .env.example .env
# Update database credentials and environment variables

# Step 3: Initialize Database
# Import schema from /db/diu_lab.sql into your database server

# Step 4: Start Application
# Depending on your backend stack:
# PHP -> Run via XAMPP
# Python -> flask run
# Node.js -> npm start
```

---

## 🚧 Future Plans

### Feature Expansion
- Notification system for reported issues
- Role-specific dashboards
- Audit logs and change history

### Technology Upgrades
- Docker containerization
- RESTful API with token-based authentication
- Progressive Web App (PWA) support

---

## 🏆 Key Achievements
- Digital transformation of lab issue tracking
- Significantly reduced lab downtime
- Improved communication between students and lab administrators
- Scalable and modular design for future integration

---

## 💼 Contributing
We welcome community contributions! To contribute:

1. Fork this repository
2. Create a new branch (`git checkout -b feature/my-feature`)
3. Commit your changes (`git commit -am 'Add new feature'`)
4. Push to the branch (`git push origin feature/my-feature`)
5. Open a Pull Request

---

## 📅 Maintainers
- Md. Nazmus Shakib Khan - Lead Developer
- DIU Software Engineering Team

---

## 📄 License
This project is licensed under the MIT License - see the LICENSE.md file for details.

---

## 🙏 Acknowledgements
Special thanks to:
- Daffodil International University
- Faculty of Science & Information Technology
- Contributors and testers

---

For queries, suggestions, or bug reports, please open an issue or email us directly at: #khan35-998@diu.edu.bd

---

