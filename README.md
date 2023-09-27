# Contact Form PHP Application

This is a simple PHP application that allows users to submit contact information via a web form. The application performs the following tasks:

1. Validates user input for each field (Full Name, Phone Number, Email, Subject, and Message) using PHP.
2. Stores valid form submissions in a MySQL database table (`contact_form`).
3. Sends an email notification to the site owner containing the form submission details.
4. Prevents duplicate submissions when the user refreshes the page.

## Requirements

- PHP server with MySQL support.
- MySQL database with a table named `contact_form` 

```sql
CREATE TABLE contact_form (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    ip_address VARCHAR(45) NOT NULL,
    timestamp DATETIME NOT NULL
);
