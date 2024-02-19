## Authentication Endpoints

### 1. Login

- **URL:** `/auth/login`
- **Method:** `POST`
- **Description:** Authenticate a user.
- **Request Body:**
  ```plaintext
  email: User's email
  password: User's password
### 2. Logout

- **URL:** `/auth/logout`
- **Method:** `POST`
- **Description:** Logout the currently authenticated user.
- **Authorization Header:** `Bearer token`
- **Response:**
  - Success (Status Code: 200 OK):
    ```plaintext
    message: User logged out successfully
    ```
  - Error (Status Code: 401 Unauthorized):
    ```plaintext
    message: Unauthenticated
    ```
