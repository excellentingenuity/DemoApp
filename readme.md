#Demo App
This is the demo app for the test as requested. 
The time took longer due Chrome crashing during the process and refusing to reopen causing a hard system restart and restart of the homestead dev environment.

The app was developed on Laravel Homestead with PHP 7, using Laravel 5.3 and Vuejs 2 with Botostrap 3 and jquery as well.

The application saves the items into a database which through using Eloquent ORM can render each as a JSON file.
Each entry has a UUID to prevent any id issues in an application that is dealing with multiple products, possibly with similar naming, and with high IO.
