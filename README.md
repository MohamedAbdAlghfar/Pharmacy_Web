## Authentication Endpoints

### 1. Login

- **URL:** `/auth/login`
- **Method:** `POST`
- **Description:** Authenticate a user.
- **Request Body:**
  ```plaintext
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
  ```plaintext
  {
    "name": "User's name",
    "email": "User's email",
    "age": "User's age",
    "address": "User's address (optional)",
    "gender": "User's gender",
    "phone": "User's phone number",
    "password": "User's password",
    "password_confirmation": "User's password confirmation",
    "academic_degree": "User's academic degree",
    "image": "User's image (file)"
  }


- **Response:**
- Success (Status Code: 200 OK):
  ```
  {
    "status": "success",
    "message": "user registered successfully",
    "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9...",
    "user": User object
  }
  
## Medicine Endpoints (Admin Side)

### 1. Attach Medicine to Pharmacy

- **URL:** `/medicine/attach/{medicine_id}/{pharmacy_id}`
- **Method:** `POST`
- **Description:** Attach a medicine to a pharmacy with additional data.
- **Request Body:** Not applicable.
- **Response:**
  ```plaintext
  {
    "message": "medicine successfully attached."
  }
### 2. Create Medicine

- **URL:** `/medicine/create`
- **Method:** `POST`
- **Description:** Create a new medicine.
- **Request Body:**
  ```plaintext
  {
    "name": "Medicine's name",
    "description": "Medicine's description",
    "qr_code": "Medicine's QR code",
    "price": "Medicine's price",
    "N_of_pieces": "Number of pieces",
    "type": "Medicine's type",
    "company_name": "Company's name",
    "image": "Medicine's image (file)",
    "pharmacy_id": "Pharmacy ID"
  }
- **Response:**
  ```plaintext
  {
    "message": "medicine successfully created."
  }

### 3. Delete Medicine

- **URL:** `/medicine/delete/{medicine_id}`
- **Method:** `DELETE`
- **Description:** Delete an existing medicine.
- **Request Body:** None
- **Response:**
  ```plaintext
  {
    "message": "medicine successfully deleted."
  }

### 4. Edit Medicine

- **URL:** `/medicine/edit/{medicine_id}`
- **Method:** `POST`
- **Description:** Edit an existing medicine.
- **Request Body:**
  ```plaintext
  {
    "name": "New medicine name",
    "description": "New medicine description",
    "qr_code": "New QR code",
    "price": "New price",
    "N_of_pieces": "New number of pieces",
    "type": "New type",
    "company_name": "New company name",
    "image": "New image (file)",
    "pharmacy_id": "Pharmacy ID"
  }
- **Response:**
  ```plaintext
  {
    "message": "medicine successfully updated."
  }
### 5. Filter Medicine by Price Range

- **URL:** `/medicine/price-range/{minPrice}/{maxPrice}`
- **Method:** `GET`
- **Description:** Filter medicines within a specified price range.
- **Request Body:** None
- **Response:**
  ```plaintext
  [
    {
      "name": "Medicine's name",
      "id": "Medicine's ID",
      "filename": "Medicine's image filename",
      "price": "Medicine's price",
      "N_of_pieces": "Total number of pieces across all pharmacies"
    },
    {
      "name": "Another Medicine's name",
      "id": "Another Medicine's ID",
      "filename": "Another Medicine's image filename",
      "price": "Another Medicine's price",
      "N_of_pieces": "Total number of pieces across all pharmacies"
    },
    ...
  ]
### 6. Filter Medicine by Type

- **URL:** `/medicine/type/{type}`
- **Method:** `GET`
- **Description:** Filter medicines by type.
- **Request Body:** None
- **Response:**
  ```plaintext
  [
    {
      "name": "Medicine's name",
      "id": "Medicine's ID",
      "filename": "Medicine's image filename",
      "price": "Medicine's price",
      "N_of_pieces": "Total number of pieces across all pharmacies"
    },
    {
      "name": "Another Medicine's name",
      "id": "Another Medicine's ID",
      "filename": "Another Medicine's image filename",
      "price": "Another Medicine's price",
      "N_of_pieces": "Total number of pieces across all pharmacies"
    },
    ...
  ]
### 7. Get Medicine by QR Code

- **URL:** `/medicine/get/{medicine_QR}`
- **Method:** `GET`
- **Description:** Retrieve a medicine by its QR code.
- **Request Body:** None
- **Response:**
  ```plaintext
  {
    "name": "Medicine's name",
    "id": "Medicine's ID",
    "filename": "Medicine's image filename",
    "price": "Medicine's price",
    "N_of_pieces": "Total number of pieces across all pharmacies"
  }
### 8. Show All Medicines

**Description:** This endpoint retrieves all available medicines.

- **URL:** `/medicine/showAll`
- **Method:** `GET`
- **Request Body:** None
- **Response:**
  - **Success:** 
    - **Status Code:** `200 OK`
    - **Content:** JSON array containing details of all medicines, including their names, IDs, filenames of their photos, and prices.
  - **Error:** 
    - **Status Code:** `404 Not Found`
    - **Content:** JSON object with an error message indicating that no medicines were found within the specified range.
### 9. Show Medicine

**Description:** This endpoint retrieves details of a specific medicine by its ID.

- **URL:** `/medicine/show/{medicine_id}`
- **Method:** `GET`
- **Request Body:** None
- **Response:**
  - **Success:** 
    - **Status Code:** `200 OK`
    - **Content:** JSON object containing details of the medicine, including its name, ID, filename of its photo, and price.
  - **Error:** 
    - **Status Code:** `404 Not Found`
    - **Content:** JSON object with an error message indicating that no medicine was found with the specified ID.










