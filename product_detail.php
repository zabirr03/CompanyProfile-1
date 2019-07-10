<?php
session_start();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Product Detail</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="wrapper">
	<!--		START LOGIN FORM-->
    <div class="container">
		<div class="login" style="height: 50px; float: right;">
			<?php
			if (isset($_SESSION['username'])){?>	
			<p class="welcome">
				Halo. Selamat Datang <?php echo $_SESSION['username'];?>
				<a href="process/logout_submit.php">Log out</a>
			</p>
			<?php } else{ ?>
			<form action="process/login_submit.php" method="post" class="member_frm_lgn">
				<input type="text" name="username" placeholder="Username">
				<input type="password" name="password" placeholder="Password" required>
				<input type="submit" value="login">
				<a href="register.php">
				<input type="button" value="register">
				</a>
			</form>
			<?php } ?>
		</div>	
	</div>
<!--		END LOGIN FORM-->
  <div id="header">
        
           <div class="container">
           		<img id="logo" src="images/logo.png">
                <div id="menu">
                	<ul>
                    	<li class="nav1"><a href="index.html">HOME</a></li>
                        <li class="nav2"><a href="news.html">NEWS</a></li>
                        <li class="nav3"><a href="products.html">PRODUCTS</a></li>
                        <li class="nav4"><a href="contact.html">CONTACT</a></li> 
                        <li class="nav5"><a href="gallery.html">GALLERY</a></li>
                    </ul>
                </div>
           </div>
            
     </div>
   <!---------------------------------------- END HEADER -------------------------------->
   <div id="greenLine"></div>
   		<div id="content">
        	
            <div class="container">
				<?php
				$id_product = $_GET['id_product'];
				
				$koneksi = new mysqli("localhost","root","","progresss_bisnis_db_ridho");
			$sql = "SELECT * FROM product_tbl WHERE id_product = $id_product";
				$pquery = $koneksi->query($sql);
				$rowproducts = $pquery->fetch_assoc();
				?>
 
                <div class="newsitemd">
					
                    <h2 class="news_title"><?php echo $rowproducts['name_product'];?>
					</h2>
                    <p class="crt_date"><?php echo $rowproducts['price'];?></p>
                    <div class="clear"></div>
                    <p class="news_desc" style="margin-top: 10px">
                    <img src="properti/<?php echo $rowproducts['gambar_product'];?>"align="left" width="200px" height="200px" float="left"> 
					<?php echo $rowproducts['description_product'];?>
                    </p>
                </div>
                
   <!------------- Form Comment ---------------------------------------------->
                 <form class="comment_form" action="process/adding_comment.php" method="post">				<h4>Leave A Comment</h4>
                    <input type="hidden" name="id_news" value="#"><br>
                    <input type="email" placeholder="Email" name="email" required><br>
                    <input type="text" placeholder="Username" name="username" required><br>
                    <textarea name="comment" placeholder="Your Comment" required></textarea><br>
                	<input type="submit" value="Comment">
                 </form>
   <!-------------------------------------------------------------------------->
   
   <!------------- List Comment ----------------------------------------------->             
                 <div class="comment_wrap">
                 	<h1>Comments (4)</h1>
                   
                 	<div class="comment_list">
                    	<div class="user_photo">
                         <img src="photo_member/profile-5.png" />
                        </div>
                        <div class="box_desc">
                          <h2>Gladis</h2>
                          <p> Mauris tincidunt, nulla quis rhoncus malesuada, nibh ante pulvinar dolor, ut lacinia libero risus nec orci.tiam auctor tincidunt augue at pharetra. Morbi velit eros, sagittis in facilisis non, rhoncus </p>
                          <span>2014-03-28 11:41:11</span>
                        </div>
    
                    </div>
                    
                    <div class="comment_list">
                    	<div class="user_photo">
                         <img src="photo_member/profile-2.jpg" />
                        </div>
                        <div class="box_desc">
                          <h2>Supriadi</h2>
                          <p> Mauris tincidunt, nulla quis rhoncus malesuada, nibh ante pulvinar dolor, ut lacinia libero risus nec orci.tiam auctor tincidunt augue at pharetra. Morbi velit eros, sagittis in facilisis non, rhoncus </p>
                          <span>2014-03-28 11:41:11</span>
                        </div>
    
                    </div>
                    
                    <div class="comment_list">
                    	<div class="user_photo">
                         <img src="photo_member/profile-1.jpg" />
                        </div>
                        <div class="box_desc">
                          <h2>Kodir</h2>
                          <p> Mauris tincidunt, nulla quis rhoncus malesuada, nibh ante pulvinar dolor, ut lacinia libero risus nec orci.tiam auctor tincidunt augue at pharetra. Morbi velit eros, sagittis in facilisis non, rhoncus </p>
                          <span>2014-03-28 11:41:11</span>
                        </div>
    
                    </div>
                    
                    <div class="comment_list">
                    	<div class="user_photo">
                         <img src="photo_member/profile-3.jpg" />
                        </div>
                        <div class="box_desc">
                          <h2>Parno</h2>
                          <p> Mauris tincidunt, nulla quis rhoncus malesuada, nibh ante pulvinar dolor, ut lacinia libero risus nec orci.tiam auctor tincidunt augue at pharetra. Morbi velit eros, sagittis in facilisis non, rhoncus </p>
                          <span>2014-03-28 11:41:11</span>
                        </div>
    
                    </div>
                 
                 </div>
                 
                 
   <!-------------------------------------------------------------------------->      
         		
            </div><!--- END CONTENT Container -->
            
        </div>
<!---------------------------------------- END CONTENT ------------------------------->
		<div id="footer">
        
        	<div class="container">
            	<p> Copyright &copy; Your Company All Right Reserved</p>
            </div>
        
        </div>
<!---------------------------------------- END FOOTER -------------------------------->  
</div>
</body>
</html>