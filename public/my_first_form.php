<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <?php  
        var_dump($_GET);
        var_dump($_POST);
    ?>
    <h2>User Login</h2>
        <form method="POST">
        <p>
            <label for="username">Username</label>
            <input id="username" name="username" type="text" placeholder="Username">
        </p>
        <p>
            <label for="password">Password</label>
            <input id="password" name="password" type="password" placeholder="Password">
        </p>
        <p>
            <label for="post_body">Posting</label>
            <textarea name="post_body" rows="5" cols="120" placeholder="Type Here"></textarea>
        </p> 
        <p>
            <button type="submit">Log In</button>
        </p>
           
        </form>
    <h2>Compose an Email</h2>    
        <form method="POST">
            <p>
               <label for="to">To :</label>
               <input id="to" name="to" type="text">
            </p>  
            <p> 
                <label for="from">From :</label> 
                <input id="from" name="from" type="text">
            </p>
            <p>
                <label for="subject">Subject</label>
                <input id="subject" name="subject" type="text">
            </p>
            <p>
                <label for="body">Message</label>
                <textarea name="body" cols="120" rows="10"></textarea>
            </p>  
            <p>
                <button type="submit">Send</button>
            </p>      
        </form>
</body>
</html>
