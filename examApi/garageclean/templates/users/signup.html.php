<div class="container">

<form action="index.php?controller=user&task=signUp" method="POST">

            <div class="form-group">
                <label for="username">Username</label>

                <input type="text" class="form-control" name="username">
            </div>

            <div class="form-group">
            <label for="password">Password</label>

                <input type="password" class="form-control" name="password">
            </div>        

            <div class="form-group">
            <label for="retypePassword">Re-type password</label>

                <input type="password" class="form-control" name="retypePassword">
            </div>        

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email">
            </div>

            <div class="form-group">
                 <input type="submit" value="Register" class="btn btn-success">
            </div>
</form>
      
</div>