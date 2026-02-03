## CRUD Operations Explained

This project allows you to Create, Read, Update, and Delete (CRUD) "Products". Here is how each part works in simple English.

### 1. Create (Adding a new Product)
**The Goal:** You want to add a new product to the database.

*   **Step 1:** You go to the page to add a product. The route `/products/create` calls the `create` function in the `ProductController`.
*   **Step 2:** The controller shows you a form. This form is in the file `resources/views/products/create.blade.php`.
*   **Step 3:** You fill in the details (Name, Qty, Price, Description) and click "Save".
*   **Step 4:** The form sends this data using a `POST` request to `/products`.
*   **Step 5:** The `store` function in `ProductController` receives this data.
    *   It checks if the data is correct (validates it).
    *   It saves the new product to the database using `Product::create($data)`.
    *   Finally, it takes you back to the list of products.

### 2. Read (Viewing Products)
**The Goal:** You want to see a list of all products.

*   **Step 1:** You go to the main products page (URL: `/products`).
*   **Step 2:** The route `/products` calls the `index` function in the `ProductController`.
*   **Step 3:** The controller asks the database for *all* products using `Product::all()`.
*   **Step 4:** The controller sends this list of products to the view `resources/views/products/index.blade.php`.
*   **Step 5:** The view uses a loop (`@foreach`) to display each product in a table.

### 3. Update (Editing a Product)
**The Goal:** You want to change the details of an existing product.

*   **Step 1:** You click "Edit" on a product. The route `/products/{product}/edit` calls the `edit` function in `ProductController`.
*   **Step 2:** The controller finds that specific product and shows you a form with the current details filled in. This is in `resources/views/products/edit.blade.php`.
*   **Step 3:** You change the information and click "Update".
*   **Step 4:** The form sends the new data using a `PUT` request (a special type of POST request for updates) to `/products/{product}/update`.
*   **Step 5:** The `update` function in `ProductController` receives the new data.
    *   It validates the data.
    *   It updates the product in the database using `$product->update($data)`.
    *   It takes you back to the product list with a success message.

### 4. Delete (Removing a Product)
**The Goal:** You want to verify remove a product permanently.

*   **Step 1:** You click the "Delete" button next to a product.
*   **Step 2:** This submits a form that sends a `DELETE` request to `/products/{product}/destroy`.
*   **Step 3:** The `destroy` function in `ProductController` receives this request.
*   **Step 4:** It deletes the product from the database using `$product->delete()`.
*   **Step 5:** It takes you back to the product list with a message saying the product was deleted.
