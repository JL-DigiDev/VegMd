# VegMd
WebApp to find vegetarian friendly doctor

To install Database, use the "DbCreate.sql" file.
Modify the "config.php" file with your database informations (host, dbname, user, password).

# Admin mode
Use this url: "index.php?p=admin"
    Mail: "admin@test.com"
    Password: "test1234"

On Admin Mode, it's only possible to add a md posted by user.
If you try this in local, change the $dResp condition on False ("contact.php" and "add.php" on "model" folder) to pass the captcha

I don't transmit my database with doctors informations. If you want to try this app on your computer, create your own database.
If you just want to try this app without install on your computer, you can try this at this location: https://vegmd.jldigidev.com
