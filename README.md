## Authentication Endpoints

### 1. Login

- **URL:** `/auth/login`
- **Method:** `POST`
- **Description:** Authenticate a user.
- **Request Body:** 
  email: User's email 
  password: User's password
- **Response:**
- Success (Status Code: 200 OK):
  ```
  {
    "status": "success",
    "message": "user logged in successfully",
    "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9...",
    "user": User object
  }
  ```
- Error (Status Code: 401 Unauthorized):
  ```
  {
    "error": "invalid_credentials"
  }
  ```

### 2. Logout

- **URL:** `/auth/logout`
- **Method:** `POST`
- **Description:** Logout the currently authenticated user.
- **Authorization Header:** `Bearer token`
- **Response:**
- Success (Status Code: 200 OK):
  ```
  {
    "message": "user logged out successfully"
  }
  ```
- Error (Status Code: 401 Unauthorized):
  ```
  {
    "message": "user doesn't logged out"
  }
  ```

### 3. Register

- **URL:** `/auth/register`
- **Method:** `POST`
- **Description:** Register a new user.
- **Request Body:**
- name: User's name
- email: User's email
- age: User's age
- address: User's address
- gender: User's gender
- phone: User's phone number
- password: User's password
- password_confirmation: User's password confirmation
- academic_degree: User's academic degree
- image: User's image (file)
- **Response:**
- Success (Status Code: 200 OK):
  ```
  {
    "status": "success",
    "message": "user registered successfully",
    "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9...",
    "user": User object
  }
  ```








