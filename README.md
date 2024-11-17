Car Brands and Models Directory
A web application for managing car brands and their models, built with Laravel 11.

Requirements
PHP 8.2+
Laravel 11.x
MySQL 8.0+
Composer
Node.js & NPM
Installation Steps
1. Clone the Repository
bash
Copy code
git clone https://github.com/DEV-ANSH-1121/codelab-test-cars.git
cd codelab-test-cars
2. Install Dependencies
bash
Copy code
composer install
3. Install NPM Dependencies
bash
Copy code
npm install
4. Configure Environment
bash
Copy code
cp .env.example .env
php artisan key:generate
5. Database Setup
Create a new MySQL database:
sql
Copy code
CREATE DATABASE car_brands_db;
Update .env file with your database credentials:
env
Copy code
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=car_brands_db
DB_USERNAME=your_username
DB_PASSWORD=your_password
6. Run Migrations & Seeders
bash
Copy code
php artisan migrate:fresh --seed
7. Build Assets
For development:

bash
Copy code
npm run dev
For production:

bash
Copy code
npm run build
8. Start the Application
bash
Copy code
php artisan serve
Visit http://localhost:8000 in your browser.

Available Routes
Brand Directory: http://localhost:8000/
Manage Brands: http://localhost:8000/brands
Manage Models: http://localhost:8000/models
Features
Brand Directory with Search and Filter
Brand Management (Add/Edit/Delete)
Model Management (Add/Edit/Delete)
Responsive Design
Image Management
Pagination
Troubleshooting
If you encounter any issues:

bash
Copy code
# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Regenerate autoload files
composer dump-autoload

# If npm issues occur
rm -rf node_modules
rm package-lock.json
npm install
License
This project is licensed under the MIT License.

Contact
For any queries, please contact:
Developer Name: [Ansh Suman]
Email: [yepansh001@gmail.com]
GitHub: https://github.com/DEV-ANSH-1121