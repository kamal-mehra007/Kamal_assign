#create a new user and give ownership of a file to that user only

Sudo adduser user1
Touch  file1.txt
Sudo chown user1.txt lock.txt
