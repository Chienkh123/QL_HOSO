# Online Fashion Store Management System

## Overview
This is an admin management system for an online men's fashion store. The system allows administrators to manage products, orders, users, and website content through a web-based interface.

## Features

### Product Management
- Add, edit and delete products
- Manage product categories and labels 
- Upload and manage product images
- Track product inventory
- Set product pricing and sizes

### Order Management
- View and process customer orders
- Update order status
- Generate order details
- Track shipping information

### User Management 
- Admin user accounts with secure login
- Manage user permissions
- Change passwords
- View user activity

### Content Management
- Manage website sliders/banners
- Update website information
- Handle customer contact forms
- Upload and organize media files

### Location Management
- Manage cities and districts
- Set up shipping zones
- Configure delivery areas

## Technical Details

### Built With
- PHP
- MySQL
- JavaScript/jQuery 
- Bootstrap
- CKEditor
- CKFinder

### Prerequisites
- PHP 7.0+
- MySQL 5.6+
- Web server (Apache/Nginx)

### Installation
1. Clone the repository
2. Import database schema from SQL file
3. Configure database connection in `inc/myconnect.php`
4. Set up CKFinder configuration in `admin/ckfinder/config.php`
5. Access admin panel at `/admin`

### Directory Structure
admin/
├── css/ # Admin styles
├── js/ # JavaScript files
├── includes/ # Header/footer files
├── inc/ # Core PHP includes
├── ckeditor/ # Text editor
├── ckfinder/ # File manager
└── .php # Admin pages
## Usage
1. Login to admin panel using admin credentials
2. Use the sidebar navigation to access different management sections
3. Follow on-screen instructions for various management tasks

## Security
- Password encryption using MD5
- Session-based authentication
- Input validation and sanitization
- CSRF protection

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss proposed changes.

## License
This project uses multiple components with different licenses:
- CKEditor - Licensed under GPL, LGPL and MPL
- CKFinder - Commercial license required
- Other components as specified in their respective license files

## Contact
For support or queries, please contact the development team.

## Acknowledgments
- CKEditor team
- CKFinder team
- Bootstrap team
