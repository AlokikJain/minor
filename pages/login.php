<h2>Login form</h2>
    
  <form class="fform" action="login.php" method="post">
        <fieldset>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" autofocus class="form-control" id="email" placeholder="Enter email" name="email" required>
            </div>

            <div class="form-group">
              <label for="pwd">Password:</label>
              <input class="form-control" name="pwd" placeholder="Enter password" type="password"/>
            </div>

            <div class="form-group">
                <button class="btn btn-default" type="submit">Log In</button>
            </div>
            or a<a href="/register.php"> new user</a>
        </fieldset>
    </form>