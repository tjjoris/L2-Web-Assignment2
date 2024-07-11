To test program:
1. copy files: index.php, register.php, connect.php
2. create a folder in your htdocs folder for XAMPP
for me the htdocs folder is located at: 
C:\xampp\htdocs\
3. open XAMPP
4. start Apache
5. open a browser window and in the address bar type:
http://localhost/
followed by the name of the folder you created in your htdocs folder.
You are now running the files on your local server.

Note: the only files being used are index.php, register.php, and connect.php
the rest are junk and can be ignored.

A bit about what's going on.

index.php is using the POST method in the form element to send the encripted 
info to connect.php or register.php.
Those pages then use the $_POST global const built into php to get data that was submitted using post.