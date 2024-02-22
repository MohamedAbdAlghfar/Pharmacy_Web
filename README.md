## Authentication Endpoints

 1. **Login**

- URL: `/auth/login`
- Method: `POST`
- Description: Authenticate a user.
- Request Body:
  ```plaintext
  email: User's email
  password: User's password

- Response:
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

 2. **Logout**

- URL: `/auth/logout`
- Method: `POST`
- Description: Logout the currently authenticated user.
- Authorization Header: `Bearer token`
- Response:
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
 3. **Register**

- URL: `/auth/register`
- Method: `POST`
- Description: Register a new user.
- Request Body:
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


- Response:
- Success (Status Code: 200 OK):
  ```
  {
    "status": "success",
    "message": "user registered successfully",
    "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9...",
    "user": User object
  }
  
## Medicine Endpoints 
**Admin Side**
 1. **Attach Medicine to Pharmacy**

- URL: `/medicine/attach/{medicine_id}/{pharmacy_id}`
- Method: `POST`
- Description: Attach a medicine to a pharmacy with additional data.
- Request Body: Not applicable.
- Response:
  ```plaintext
  {
    "message": "medicine successfully attached."
  }

 2. **Create Medicine**

- URL: `/medicine/create`
- Method: `POST`
- Description: Create a new medicine.
- Request Body:
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
- Response:
  ```plaintext
  {
    "message": "medicine successfully created."
  }

 3. **Delete Medicine**

- URL: `/medicine/delete/{medicine_id}`
- Method: `DELETE`
- Description: Delete an existing medicine.
- Request Body: None
- Response:
  ```plaintext
  {
    "message": "medicine successfully deleted."
  }

 4. **Edit Medicine**

- URL: `/medicine/edit/{medicine_id}`
- Method: `POST`
- Description: Edit an existing medicine.
- Request Body:
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
- Response:
  ```plaintext
  {
    "message": "medicine successfully updated."
  }

 5. **Filter Medicine by Price Range**

- URL: `/medicine/price-range/{minPrice}/{maxPrice}`
- Method: `GET`
- Description: Filter medicines within a specified price range.
- Request Body: None
- Response:
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

 6. **Filter Medicine by Type**

- URL: `/medicine/type/{type}`
- Method: `GET`
- Description: Filter medicines by type.
- Request Body: None
- Response:
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

 7. **Get Medicine by QR Code**

- URL: `/medicine/get/{medicine_QR}`
- Method: `GET`
- Description: Retrieve a medicine by its QR code.
- Request Body: None
- Response:
  ```plaintext
  {
    "name": "Medicine's name",
    "id": "Medicine's ID",
    "filename": "Medicine's image filename",
    "price": "Medicine's price",
    "N_of_pieces": "Total number of pieces across all pharmacies"
  }

 8. **Show All Medicines**

Description: This endpoint retrieves all available medicines.

- URL: `/medicine/showAll`
- Method: `GET`
- Request Body: None
- Response:
  - Success: 
    - Status Code: `200 OK`
    - Content: JSON array containing details of all medicines, including their names, IDs, filenames of their photos, and prices.
  - Error: 
    - Status Code: `404 Not Found`
    - Content: JSON object with an error message indicating that no medicines were found within the specified range.

 9. **Show Medicine**

Description: This endpoint retrieves details of a specific medicine by its ID.

- URL: `/medicine/show/{medicine_id}`
- Method: `GET`
- Request Body: None
- Response:
  - Success: 
    - Status Code: `200 OK`
    - Content: JSON object containing details of the medicine, including its name, ID, filename of its photo, and price.
  - Error: 
    - Status Code: `404 Not Found`
    - Content: JSON object with an error message indicating that no medicine was found with the specified ID.

## ORDER ENDPOINTS

**Admin Side**

1. **Make Order**

- URL: `/order/make/{medicine_id}/{pharmacy_id}`
- Method: `POST`
- Description: Creates a new order for a specific medicine at a particular pharmacy.
- Request Body:
    - None
- Response:
    - Success: Status code `200 OK`, JSON response with a message indicating successful order creation.
    - Error: Status code `404 Not Found` if the medicine does not exist in the pharmacy.

2. **Cancel Order**

- URL: `/order/cancel/{order_id}`
- Method: `DELETE`
- Description: Cancels an existing order.
- Request Body:
    - None
- Response:
    - Success: Status code `200 OK`, JSON response with a message indicating successful order cancellation.
    - Error: Status code `404 Not Found` if no order is found with the specified ID.

3. **Print Order**

- URL: `/order/print/{order_id}`
- Method: `GET`
- Description: Retrieves details of a specific order by its ID.
- Request Body:
    - None
- Response:
    - Success: Status code `200 OK`, JSON response containing details of the order, including medicine name, price, creation date, and pharmacy name.
    - Error: Status code `404 Not Found` if no order is found with the specified ID.

**Owner Side**

1. **Show All Orders**

- URL: `/order/showAll`
- Method: `GET`
- Description: Retrieves details of all orders.
- Request Body:
    - None
- Response:
    - Success: Status code `200 OK`, JSON response containing details of all orders, including medicine name, price, creation date, pharmacy name, and medicine photo filename.

2. **Show Orders in This Day**

- URL: `/order/showToday`
- Method: `GET`
- Description: Retrieves details of orders placed on the current day.
- Request Body:
    - None
- Response:
    - Success: Status code `200 OK`, JSON response containing details of orders placed on the current day, including medicine name, price, creation date, and pharmacy name.

3. **Show Orders in This Week**

- URL: `/order/showThisWeek`
- Method: `GET`
- Description: Retrieves details of orders placed within the current week.
- Request Body:
    - None
- Response:
    - Success: Status code `200 OK`, JSON response containing details of orders placed within the current week, including medicine name, price, creation date, and pharmacy name.
## Pharmacy Endpoints 
**Owner Side**

 1. **Create Pharmacy**

- URL: `/pharmacy/create`
- Method: `POST`
- Description: Create a new pharmacy.
- Request Body:
  ```plaintext
  {
    "name": "Pharmacy's name",
    "address": "Pharmacy's address",
    "phone": "Pharmacy's phone number",
    "user_id": "Owner's user ID",
    "image": "Pharmacy's image (file)"
  }
- Response:
  ```plaintext
  {
    "message": "pharmacy successfully created."
  }

 2. **Delete Pharmacy**

- URL: `/pharmacy/delete/{id}`
- Method: `DELETE`
- Description: Delete an existing pharmacy.
- Request Body: None
- Response:
  ```plaintext
  {
    "message": "pharmacy successfully deleted."
  }

 3. **Edit Pharmacy**

- URL: `/pharmacy/edit/{id}`
- Method: `POST`
- Description: Edit an existing pharmacy.
- Request Body:
  ```plaintext
  {
    "name": "New pharmacy name",
    "address": "New pharmacy address",
    "phone": "New pharmacy phone number",
    "user_id": "Owner's user ID",
    "image": "New pharmacy image (file)"
  }
- Response:
  ```plaintext
  {
    "message": "Pharmacy successfully updated."
  }

 4. **Show All Pharmacies**

- URL: `/pharmacy/showAll`
- Method: `GET`
- Description: Retrieve details of all pharmacies.
- Request Body: None
- Response:
  ```plaintext
  [
    {
      "name": "Pharmacy1",
      "id": "1",
      "filename": "pharmacy1.jpg",
      "address": "Address of Pharmacy1",
      "phone": "Phone number of Pharmacy1"
    },
    {
      "name": "Pharmacy2",
      "id": "2",
      "filename": "pharmacy2.jpg",
      "address": "Address of Pharmacy2",
      "phone": "Phone number of Pharmacy2"
    },
    ...
  ]

 5. **Show Pharmacy**

- URL: `/pharmacy/show/{id}`
- Method: `GET`
- Description: Retrieve details of a specific pharmacy by its ID.
- Request Body: None
- Response:
  ```plaintext
  {
    "name": "Pharmacy1",
    "id": "1",
    "filename": "pharmacy1.jpg",
    "address": "Address of Pharmacy1",
    "phone": "Phone number of Pharmacy1",
    "photo": "Filename of Pharmacy1's photo",
    "Medicines": [
      {
        "name": "Medicine1",
        "n_of_pieces": "Number of pieces of Medicine1 in Pharmacy1",
        "buy": "Number of purchases of Medicine1 in Pharmacy1",
        "photo": "Filename of Medicine1's photo"
      },
      {
        "name": "Medicine2",
        "n_of_pieces": "Number of pieces of Medicine2 in Pharmacy1",
        "buy": "Number of purchases of Medicine2 in Pharmacy1",
        "photo": "Filename of Medicine2's photo"
      },
      ...
    ],
    "Orders": [
      {
        "price": "Price of order1 in Pharmacy1"
      },
      {
        "price": "Price of order2 in Pharmacy1"
      },
      ...
    ]
  }
## User Endpoints 
**Admin Side**

 1. **View My Profile**

- URL: `/user/profile`
- Method: `GET`
- Description: Retrieve details of the currently authenticated user.
- Request Body: None
- Response:
  ```plaintext
  {
    "id": "User's ID",
    "name": "User's name",
    "email": "User's email",
    "age": "User's age",
    "address": "User's address",
    "phone": "User's phone number",
    "role": "User's role",
    "gender": "User's gender",
    "salary": "User's salary",
    "academic_degree": "User's academic degree",
    "filename": "Filename of user's photo"
  }

 2. **Delete My Profile**

- URL: `/user/profile/delete`
- Method: `DELETE`
- Description: Delete the profile of the currently authenticated user.
- Request Body: None
- Response:
  ```plaintext
  {
    "message": "your profile successfully deleted."
  }

   **Owner Side**
 1. **Edit My Profile**

- URL: `/user/profile/edit`
- Method: `POST`
- Description: Edit the profile of the currently authenticated user.
- Request Body:
  ```plaintext
  {
    "name": "New user name",
    "email": "New user email",
    "age": "New user age",
    "address": "New user address",
    "gender": "New user gender",
    "phone": "New user phone number",
    "academic_degree": "New user academic degree",
    "image": "New user image (file)"
  }
- Response:
  ```plaintext
  {
    "message": "profile successfully updated."
  }

 2. **View Users**

- URL: `/user/viewAll`
- Method: `GET`
- Description: Retrieve details of all users.
- Request Body: None
- Response:
  ```plaintext
  [
    {
      "id": "User1's ID",
      "name": "User1's name",
      "email": "User1's email",
      "age": "User1's age",
      "address": "User1's address",
      "phone": "User1's phone number",
      "role": "User1's role",
      "gender": "User1's gender",
      "salary": "User1's salary",
      "academic_degree": "User1's academic degree",
      "filename": "Filename of User1's photo"
    },
    {
      "id": "User2's ID",
      "name": "User2's name",
      "email": "User2's email",
      "age": "User2's age",
      "address": "User2's address",
      "phone": "User2's phone number",
      "role": "User2's role",
      "gender": "User2's gender",
      "salary": "User2's salary",
      "academic_degree": "User2's academic degree",
      "filename": "Filename of User2's photo"
    },
    ...
  ]

 3. **Delete User**

- URL: `/user/delete/{id}`
- Method: `DELETE`
- Description: Delete a user by ID.
- Request Body: None
- Response:
  ```plaintext
  {
    "message": "user successfully deleted."
  }

 4. **Edit User**

- URL: `/user/edit/{id}`
- Method: `POST`
- Description: Edit a user by ID.
- Request Body:
  ```plaintext
  {
    "name": "New user name",
    "email": "New user email",
    "age": "New user age",
    "address": "New user address",
    "gender": "New user gender",
    "phone": "New user phone number",
    "academic_degree": "New user academic degree",
    "image": "New user image (file)"
  }
- Response:
  ```plaintext
  {
    "message": "user successfully updated."
  }

 5. **Make User Owner**

- URL: `/user/makeOwner/{id}`
- Method: `GET`
- Description: Make a user owner by ID.
- Request Body: None
- Response:
  ```plaintext
  {
    "message": "this user turned into OWNER successfully."
  }
## Statistics Endpoints 

**Owner Side**

 1. **Total Orders Price in This Day**

- URL: `/statistics/totalOrdersPrice/day/{id}`
- Method: `GET`
- Description: Calculate the total price of orders made by a pharmacy on the current day.
- Request Body: None
- Response: Total price of orders made on the current day

 2. **Total Orders Price in This Month**

- URL: `/statistics/totalOrdersPrice/month/{id}`
- Method: `GET`
- Description: Calculate the total price of orders made by a pharmacy in the current month.
- Request Body: None
- Response: Total price of orders made in the current month










