<!-- /Template Start Here -->
<figure>

<form action="overview.php" method="post" id="security_login" name="security_login">
		
  <div class="label">Sign in to</div>
  <h2>Name of the Admin Site</h2>
  <span>User access not found.</span>
		<fieldset>
    <p>
      <label for="un">Username</label>
      <input type="text" id="un" name="un">
    </p>
    <p>
      <label for="pw">Password</label>
				<input type="password" id="pw" name="pw">
    </p>
  <input type="checkbox" id="cb" name="cb" checked value="rememberme"> Remember me on this computer.
  </fieldset>
  
  <button type="submit" id="login" name="login">Sign in</button>
  
</form>  
<div align="center">Copyright 2010. Dog and Rooster, Inc.</div>

</figure>
<!-- /Template End Here -->

<footer>
	forgot your password? <a id="clickme" name="Recover Your Password Now!">click here</a>
<form action="" method="post" class="recover">
	<input type="text" name="password" onClick="if (this.value == 'Enter your Email Address') { this.value = ''; }" onBlur="if (this.value == '') { this.value = 'Enter your Email Address'; }" value="Enter your Email Address">
  <button type="submit"> Recover Password </button>
</form>
</footer>