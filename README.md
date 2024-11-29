# Electricity Bill Payment System

# Initial Setup

## 1. Clone the repository
Find a location on your computer where you want to store the project.

Launch a bash console there and clone the project.

`git clone https://github.com/timtech-wiz/ElectricityPayment.git`

## 2. cd into the project
You will need to be inside the project directory that was just created, so cd into it.

`cd project_name`

## 3. Install composer dependencies
Whenever you clone a new Laravel project you must now install all of the project dependencies. This is what actually installs Laravel itself, among other necessary packages to get started.

`composer install`


## 4. Copy the .env file
.env files are not generally committed to source control for security reasons. But there is a .env.example which is a template of the .env file that the project requires.

So you should make a copy of the .env.example file and name it .env so that you can setup your local deployment configuration in the next few steps.

`cp .env.example .env`

## 5. Generate an app encryption key
Laravel requires you to have an app encryption key which is generally randomly generated and stored in your .env file. The app will use this encryption key to encode various elements of your application from cookies to password hashes and more.

Laravel’s command line tools thankfully make it easy to generate this. Run this command in the terminal to generate that key.

`php artisan key:generate`

## 6. Create an empty database for the application
Create an empty database for your project using the database tools you prefer (phpmyadmin, datagrip, or any other mysql client).

## 7. In the .env file, add database information to allow Laravel to connect to the database
You will want to allow Laravel to connect to the database that you just created in the previous step. To do this, you must add the connection credentials in the .env file and Laravel will handle the connection from there.

In the .env file fill in the **DB_HOST**, **DB_PORT**, **DB_DATABASE**, **DB_USERNAME**, and **DB_PASSWORD** options to match the credentials of the database you just created. This will allow you to run migrations in the next step.

## 8. Migrate the database
Once your credentials are in the .env file, now you can migrate your database. This will create all the necessary tables in your database.

`php artisan migrate`

## 9. Seed data into your database
Once you  have migrated and you have confirmed your database has been populated with tables, you can then seed data with this command.
`php artisan de:seed`

## 10. Local development server
To run a local development server you may run the following command. This will start a development server at **http://localhost:8000**.

`php artisan serve`

# API Documentation

## Endpoints

### 1. **GET /providers**
- **Description**: Retrieves a list of providers.
- **Authentication**: None
- **Request**:
  - **Method**: GET
  - **URL**: `/providers`
  - **Headers**: Accept=application/json

- **Response**:
  - **Status Code**: 200 OK
  - **Content-Type**: `application/json`
  - **Response Body**:
    ```json
    [
      {
        "id": 1,
        "name": "Provider 1",
        "description": "Description of provider 1",
        "created_at": "2024-11-29T10:00:00.000000Z",
        "updated_at": "2024-11-29T10:00:00.000000Z"
      },
      {
        "id": 2,
        "name": "Provider 2",
        "description": "Description of provider 2",
        "created_at": "2024-11-29T10:00:00.000000Z",
        "updated_at": "2024-11-29T10:00:00.000000Z"
      }
    ]
    ```

---

### 2. **POST /payment**
- **Description**: Creates a new payment record.
- **Authentication**: **Required** (`auth:sanctum` middleware)
- **Request**:
  - **Method**: POST
  - **URL**: `/payment`
  - **Headers**:
    - `Authorization: Bearer {access_token}` (You need to provide a valid token from Sanctum authentication)
    - `Content-Type: application/json`

  - **Request Body**:
    ```json
    {
      "user_id": 1,
      "meter_number": "4584745739",
      "amount": 1500.00,
      "provider_id": 1
    }
    ```

- **Response**:
  - **Status Code**: 201 Created
  - **Content-Type**: `application/json`
  - **Response Body**:
    ```json
    {
      "status": true,
      "message": "Payment successfully processed",
      "data": {
        "id": 1,
        "customer": "John Doe",
        "meter_number": "4584745739",
        "amount": 1500.00,
        "provider": "[Ikedc]"
        "Payment Date": "2024-11-29T10:30:00.000000Z",
      }
    }
    ```

---

### 3. **GET /payments**
- **Description**: Fetches the payment history for the authenticated user.
- **Authentication**: **Required** (`auth:sanctum` middleware)
- **Request**:
  - **Method**: GET
  - **URL**: `/payments`
  - **Headers**:
    - `Authorization: Bearer {access_token}`

- **Response**:
  - **Status Code**: 200 OK
  - **Content-Type**: `application/json`
  - **Response Body**:
    ```json
    [
      {
        "id": 1,
        "customer": "John Doe",
        "meter_number": "4584745739",
        "amount": 1500.00,
        "provider": "[Ikedc]"
        "Payment Date": "2024-11-29T10:30:00.000000Z",
      },
      {
        "id": 2,
        "user_id": 1,
        "meter_number": "4594745739",
        "amount": 1200.00,
        "provider": "[ibadanIkedc]"
        "Payment Date": "2024-11-29T10:30:00.000000Z",
      }
    ]
    ```

---

## Error Responses

- **401 Unauthorized**: If the user is not authenticated or the token is invalid:
  ```json
  {
    "message": "Unauthorized"
  }

