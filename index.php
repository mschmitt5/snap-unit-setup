<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>snap setup methods</title>
</head>
<body>
    <h1>Why we write setup methods in database unit tests</h1>
    <p>You write the setup method so that you do not have to repeat as much code. It does the same thing before each unit test - in our example it wipes the database and inserts test data before each test. Makes the code "DRY -er".</p>
    <p>You also must make sure to call the setup method as a parent (wording here is probably wrong....) so that you do not override defaults - you only amend them.</p>
</body>
</html>
