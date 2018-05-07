# Superhero Directory
This sample project is a directory of superheroes and their powers.  The following functionalit is provided:
* Adding hero/power pairings
* Editing hero names and powers
* Removing hero/power pairings

## Setup Instructions
1. Clone this repository into your web directory.
2. Execute the sql in dump.sql to initialize your database.
3. Enter the appropriate database credentials in lines 9 - 12 of Vendor/DB.php.
4. Visit the site and register some superheroes.

## Usage Instructions
### To add a hero
Enter the hero's name and power in the section at the top of the page and click the "Add" button.
### To edit a hero
Clicking on the hero's name or power will enable "edit mode" for that hero.  Make your changes and click the "Save" button.  Changes are not saved if fields are empty.  Clicking the "Cancel" button will disable "edit mode".
### To remove a hero
Click on the "X" button next to a hero.  The remove function deletes the hero, the power, and the hero/power pairing from the database.  In a perfect world, they wouldn't actually be deleted, however.  Each table would have an "enabled" boolean field, which would be set to 0 instead.