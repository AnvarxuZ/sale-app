# Laravel + Vue.js Project

## 📌 About the Project
This is a full-stack web application built using Laravel for the backend and Vue.js for the frontend. Vue.js is integrated into Laravel, and the frontend is built and served alongside Laravel's backend.

## 🛠 Tech Stack
- **Frontend:** Vue.js (Vue 3) + Vite
- **Backend:** Laravel (PHP)
- **Database:** PostgreSQL / MySQL (configurable)
- **Build Tools:** Vite, Laravel Mix
- **Containerization:** Docker

---

## 🚀 Installation & Setup

### 1️⃣ Clone the Repository
```sh
git clone https://github.com/AnvarxuZ/sale-app.git
cd sale-app
```

### 5️⃣ Set Up Environment File
Copy the `.env.example` file and rename it to `.env`. Then, configure the database connection and other environment settings.
```sh
cp .env.example .env
```
Update database settings in `.env`:
```
DOCKER_NGINX_PORT=8505
DB_CONNECTION=pgsql
DB_HOST=postgres
DB_PORT=5432
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 2️⃣ Start Docker Containers
```sh
docker-compose up -d --build
```

### 3️⃣ Install Backend Dependencies (Inside PHP Container)
```sh
docker-compose exec php composer install
```

### 4️⃣ Install Frontend Dependencies (Inside PHP Container)
```sh
docker-compose exec php npm install
```

### 6️⃣ Generate Application Key
```sh
```

### 7️⃣ Run Database Migrations
```sh
docker-compose exec php php artisan migrate
```

### 7️⃣ Run Database Migrations
```sh
docker-compose exec php php artisan db:seed
```

### 8️⃣ Build Frontend Assets
```sh
docker-compose exec php npm run build
```

### 9️⃣ Start the Server
```sh
```

---

📩 Contact: anvarjonkomilov@gmail.com

