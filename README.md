-   API Documentation
-
-   This API provides endpoints for user authentication, user management, customer management, category management,
-   product management, invoice management, and generating sales reports.
-
-   Endpoints:
-
-   -   `/auth/register` (POST): Register a new user.
-   -   `/auth/login` (POST): User login.
-   -   `/auth/send-otp` (POST): Send OTP (One-Time Password) for user verification.
-   -   `/auth/verify-otp` (POST): Verify OTP for user verification.
-   -   `/auth/logout` (POST): User logout.
-   -   `/user/profile` (GET): Get user profile information.
-   -   `/user/reset-password` (PATCH): Reset user password.
-   -   `/user/profile` (PUT): Update user profile information.
-   -   `/customers` (GET, POST): Get a list of customers or create a new customer.
-   -   `/customers/{id}` (GET, PUT, DELETE): Get, update, or delete a specific customer.
-   -   `/categories` (GET, POST): Get a list of categories or create a new category.
-   -   `/categories/{id}` (GET, PUT, DELETE): Get, update, or delete a specific category.
-   -   `/products` (GET, POST): Get a list of products or create a new product.
-   -   `/products/{id}` (GET, PUT, DELETE): Get, update, or delete a specific product.
-   -   `/invoices` (GET, POST): Get a list of invoices or create a new invoice.
-   -   `/invoices/{id}` (GET, PUT, DELETE): Get, update, or delete a specific invoice.
-   -   `/sales-report/{fromDate}/{toDate}` (GET): Generate a sales report between the specified dates.
-   -   `/summary` (GET): Get a summary of sales data.
-
-   Note: Some endpoints require authentication using a token.

-
-   Response Types:
-
-   -   Success Response:
-   ```json
    {
        "success": true,
        "message": "The success message",
        "data": {}
    }
    ```
-
-   -   Error Response (Note that the `errors` field is optional, as well as some time the error code will be 200 instead of 400 or 500):
-   ```json
    {
        "success": false,
        "message": "The error message",
        "errors": []
    }
    ```
-
