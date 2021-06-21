# (file name).php?ref=(ref example)
This system works based on one url paramater, such parameter will then be served as a search query on your mySQL database.
If the Reference ID has been submitted previously, the system will automatically increment the requestedTimes column in mySQL.

If the "?ref=" parameter is not filled, script will relocate the client to a website of choice. Else the script will count the reference and will relocate to your webpage you wish to collect analytics on. 

I've previously tested myself in regards to naming the database you wish to have the data fed to, cannot be called References and I've updated this issue on the source files.

# Scripted in PHP/Javascript
