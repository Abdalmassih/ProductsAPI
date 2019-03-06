# ProductsAPI

Demo Project

#IMPORTANT NOTES:

-   The following files were attached with the project for convenience (can be found under the root folder):

    1. ERD Model (ERD.png)
    2. Postman sample requests collection (Products.postman_collection.json)
    3. Product.json example file

*   Please set the DB connection to the one used on your machine in the ".env" file.
*   To generate the schema with mock data for testing, please use the provided seeds by running the          migrate command:
                             ```> php artisan migrate:fresh --seed```

-   One final note: this is a proof-of-concept demo project, therefore only one of each similar functionalities group was worked on; since they basically implement the same concept (e.g. "stores", "brands" and "categories" tables all have many-to-many relationships with "products" table which is why you will find that only "categories" is implemented in the product's "store" method); and the same applies for repeated validations.
