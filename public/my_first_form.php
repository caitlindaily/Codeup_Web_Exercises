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
               <input id="to" name="to" type="email">
            </p>  
            <p> 
                <label for="from">From :</label> 
                <input id="from" name="from" type="email">
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
                <label for="sent_folder">Would you like to save to sent folder</label>
                <input id="sent_folder" name="sent_folder" type="checkbox" checked>
            </p>
            <p>
                <button type="submit">Send</button>
            </p>      
        </form>

        <form method="POST">
    <h2>Multiple Choice Questionaire</h2>    
        <p>Is Codeup awesome?
            <label for="codeup">Duh<input id="codeup" name="codeup" type="radio" value="yes">
            <label for="codeup">Heck no<input id="codeup2" name="codeup" type="radio" value="no">
        </p>
        <p>What is your favorite season?
            <label for="season1">Spring<input id="season1" name="season" type="radio">
            <label for="season2">Summer<input id="season2" name="season" type="radio">    
            <label for="season3">Autumn<input id="season3" name="season" type="radio">    
            <label for="season4">Winter<input id="season4" name="season" type="radio">

        </p> 
        <p>What languages are you familiar with?</p>
            <input id="language1" name="l1" type="checkbox"><label for="language1">PHP<br></label>
            <input id="language2" name="l2" type="checkbox"><label for="language2">Javascript<br></label> 
            <input id="language3" name="l3" type="checkbox"><label for="language3">.NET<br></label>
            <input id="language4" name="l4" type="checkbox"><label for="language4">HTML<br></label> 
            
            <button type="submit">Submit</button>
        </form>
</body>
</html>
