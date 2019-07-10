<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Halaman Register</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="wrapper">
  <div id="header">
        
           <div class="container">
           		<img id="logo" src="images/logo.png">
                <div id="menu">
                	<ul>
                    	<li class="nav1"><a href="index.php">HOME</a></li>
                        <li class="nav2"><a href="paging_news.php">NEWS</a></li>
                        <li class="nav3"><a href="paging_product.php">PRODUCTS</a></li>
                        <li class="nav4"><a href="contact.php">CONTACT</a></li> 
                        <li class="nav5"><a href="gallery.php">GALLERY</a></li>
                    </ul>
                </div>
           </div>
            
     </div>
   <!---------------------------------------- END HEADER -------------------------------->
   <div id="greenLine"></div> 
   <div id="content">
        	
       <div class="container">
		   <form class="form_regis" action="process/register_submit.php" method="post" enctype="multipart/form-data">
		   <h1>Register Member</h1>
			<label>Username :</label>
			<input type="text" name="username" placeholder="Username" required>
			   <br><br>
			<label>Password :</label>   
			<input type="password" name="password" placeholder="Password" required>
			   <br><br>
			<label>Email :</label>   
			<input type="email" name="email" placeholder="Email" required>
			   <br><br>
			<label>Gender : </label>
			<input type="radio" name="gender" id="gender" value="male">Male
			<input type="radio" name="gender" id="gender" value="female">Female
			   <br><br>
			<label>City :</label>   
			<input type="text" name="city" placeholder="City" required>
			   <br><br>
			<label>Photo :</label>   
			<input type="file" name="photo_member" placeholder="Photo" required>
			   <br><br>
			<label>Address :</label>   
			<textarea name="address" placeholder="Your Address"></textarea>
			   <br><br>
			<input type="submit" value="Register">
		   </form>
       </div> 
<!--------------------------------------- END CONTENT CONTENT--------------------------->
	   <div id="footer">
        
        	<div class="container">
            	<p> Copyright &copy; Your Company All Right Reserved</p>
            </div>
        
       </div>
<!---------------------------------------- END FOOTER --------------------------------->
</div>
	<script src="lightbox/js/jquery-1.11.0.min.js"></script>
	<script src="lightbox/js/lightbox.js"></script>
</body>
</html>
