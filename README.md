# leave-management
## Installation
###  **step 1:** 
     clone the project in your /usr/share/nginx/html/ by using git clone command.
     by using git clone https://github.com/sujeetkryadav/leave-management.git
     and update composer using "composer update" command . After composer update run 
    " php artisan dump-autoload" command.
### **step 2:**
      After successfull installation ,create a Database "test" and run migration command.
      php artisan migrate
### **step 3:**
      After migration you need to seed the user table in which Admin will be automatically 
      create with username "admin@gmail.com" and password "admin" by using 
      "php artisan db:seed --class=AdminSeeder" command.
      and admin ULR will be "http://[your server]/admin/login".
### **step 4:**
     Now your project is ready to be use.
     you can run you project and Either login (if user exist) or create new user.
    
  
