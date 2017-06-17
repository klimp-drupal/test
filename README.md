# test

index_orig.php - Original code.
index_new.php - rewritten code within a single file.

The rest of the files are MVC solution.

This code is supposed to get page title from a database and show it within a title tag. Then it should check for a certain get-parameter and if any - retrieve the data and represent it as an html list.

Weaknesses:
1. mysql_* functions are deprecated since php5.5. PHP 5.4 hasn't been receiving security updates since September 2015 afaik.
2. Db connection establishment occurs only if get-parameter has been passed. But we are trying to reach the data out from db before - into getPageTitle(), so it will fail.
3. We should handle possible errors related to database connection.
4. "if ($_GET['some_parameter'])" causes a PHP notice. We should use either isset() or !empty() instead.
5. Seems we are going to show <ul> tag anyway. But we need it only if we have some <li>'s to display.

And basically handling html layout and logic within a single file is a bad practice. I'd suggest to use MVC approach (the simplest one in particular). I haven't done any routing in the context of this task.

Pros comparing to the original code:
- We ensure exception handling so we don't need to check for a proper db connection everywhere we use it.
- And it is test-friendly as well.
- We use PDO which makes us more flexible in terms of database driver.