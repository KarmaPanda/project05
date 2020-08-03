# Team Chicago
- Adira Blumenthal
- Joo Eon Park
- Elise Frelinger

## Choices
Technician (Adira): 
- set up the database on the class server
- pulled data from database to be displayed on studentlist.php
- Worked with the IA to get the HTML form integrated with the database system

IA (Elise):
- A student can access the database with editing capabilities (through "Your Account") while a non-student visitor can access the database without editing capabilities (through "View All Students")
- "Your Account" button links to portal.php and allows the student to add, edit, or delete profiles. Canceling the database page or HTML form leads back to this page
- The "Add New Profile" button links directly to the HTML form for convenience
- The choreography is clear and structured, but forgiving of user misclicks 
	- The "Edit Profile" and "Delete Profile" buttons give the student clear options, but the choice to delete remains easily accessible under the umbrella of editing (and vice versa)
	- After hitting "Edit Profile" or "Delete Profile," the option to create a profile is not prominent, but still accessible
- After creating a profile, a user can inspect their profile (and make sure they are happy), or visit the homepage to find out more about the class


Visual Designer (Joo Eon):
- Implemented same background, fonts, and color scheme to new pages (portal.php, db.php, and renderform.php)
- The layout for student list page (studentlist.php) was fixed to fit the new 'quote' content that replaced the 'photo' content
- The database table (db.php) was styled using Bootstrap, using the table classes for styling and layout
- Table column widths fixed with "table-layout: fixed" and manually setting the widths of each column
- Buttons styled using Bootstrap. Specific colors used to convey meaning (e.g. red buttons for delete, conveying "danger" to user... yellow button for edit, conveying "warning" to user)
- Renderform styled using Bootstrap. Built-in grid layout used to control the width of each input text area (typically shorter areas like first name are narrow, and longer areas like quote and wider)
