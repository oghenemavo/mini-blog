# Laravel 12 Blog API + Frontend (MVC + jQuery)

This project combines a **Laravel 12 API** (JSON responses) and a **Blade + jQuery frontend**.  
The API is protected by **Sanctum Bearer tokens** for write operations, while read operations are public.

---

## ⚙️ Setup Instructions

1. **Clone the repository**
   ```bash
   git clone https://github.com/oghenemavo/mini-blog.git
   cd mini-blog
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install && npm run build
   ```

3. **Copy environment file**
   ```bash
   cp .env.example .env
   ```

4. **Generate application key**
   ```bash
   php artisan key:generate
   ```

5. **Configure your database**  
   Open `.env` and update:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=laravel_blog
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. **Run migrations**
   ```bash
   php artisan migrate
   ```

7. **Run the development server**
   ```bash
   php artisan serve
   ```
   Now the app is available at [http://127.0.0.1:8000](http://127.0.0.1:8000).

---

## 🌐 Routes

### 🔹 API Endpoints

**Public (no authentication required)**  
| Method | Endpoint            | Description                |
|--------|---------------------|----------------------------|
| GET    | `/api/posts`        | List all posts (paginated) |
| GET    | `/api/posts/{id}`   | Show a single post         |

**Protected (requires Bearer Token)**  
| Method | Endpoint            | Description                |
|--------|---------------------|----------------------------|
| POST   | `/api/posts`        | Create a new post          |
| PUT    | `/api/posts/{id}`   | Update an existing post    |
| PATCH  | `/api/posts/{id}`   | Partially update a post    |
| DELETE | `/api/posts/{id}`   | Delete a post              |

🔑 **Auth header example:**
```
Authorization: Bearer YOUR_TOKEN_HERE
```

---

### 🔹 Frontend (Blade Views)

**Public**  
| Route            | Description                               |
|------------------|-------------------------------------------|
| GET `/posts`     | Show all posts (fetched with jQuery)       |
| GET `/posts/{id}`| Show single post details                   |

**Protected (requires Bearer token input in form)**  
| Route                | Description                  |
|----------------------|------------------------------|
| GET `/posts/create`  | Form to create a post        |
| GET `/posts/{id}/edit` | Form to edit a post        |

---

## 🚀 Workflow

1. Visitors can **browse posts** (`/posts`, `/posts/{id}`) publicly.  
2. Authenticated users obtain a **Bearer token** (via Sanctum).  
3. With the token, users can:
   - Create posts (`/posts/create`)  
   - Edit posts (`/posts/{id}/edit`)  
   - Delete posts (to be added later).  

---

## 🛠 Tech Stack

- **Laravel 12** (API + MVC in one project)  
- **Sanctum** for API authentication  
- **Blade** templates for frontend  
- **jQuery** for AJAX calls  
