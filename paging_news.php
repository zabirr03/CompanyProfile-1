<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Paging News</title>
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
				<div class="top">
				<style>
					.top{
						height: 25px;
						padding: 10px;
					}
					.top form{
						float: left;
						width: 250px;
						
					}
				</style>
				<form action="search_news.php" method="get">
					<input type="text" name="search" placeholder="Search News">
					<input type="submit" value="Search">
				</form>
			</div>
				<?php
				include "config/config.php";
//				buat variabel untuk membatasi jumlah data
				$view = 3;
//				tentukan sebuah halaman apakah ada parameter atau tidak
				if(isset($_GET['page'])){
//					jika ada halaman yg aktif diawali dengan parameter ?page maka->
					$page_aktif = $_GET['page'];
				}else{
//					jika tidak ada halaman yg aktif. maka halaman yg ke 1
					$page_aktif = 1;
				}
//				tentukan awal data yg aktif
				$awaldata = ($page_aktif-1)*$view; //jadi ini total=0
//				perintah untuk menampilkan data dari data ke berapa dan  jumlah yang ditampilkan
				$sql = "SELECT * FROM news_tbl LIMIT $awaldata,$view";
//				echo $sql;
				
				$query = $koneksi->query($sql);
				$rownews = $query->fetch_assoc();
			
				do {
				
				?>
            	<div class="newsitem">
                	<div class="date_circle"><p class="day">28<span class="month">06</span></p></div>
					
                    <h2 class="news_title"><?php echo $rownews['title']; ?></h2>
                    <div class="clear"></div>
					
					<div class="img_box" style="width: 221px; height: 182px; float:left;">
						<img style="float:left; margin-top:15px; width: 100%;" src="news_images/<?php echo $rownews['images']; ?>" class="news_image">
					</div>
                    
                    <p class="news_synopsis"><?php echo substr ($rownews['description'],0,250); ?></p>
                    <a href="news_detail.php?id_news=<?php echo $rownews['id_news'];?>" class="link_detail">Read More</a>
                </div>
               <?php } while($rownews = $query->fetch_assoc()); ?>
			   <?php
				//tentukan jumlah data yg sebenarnya---
				$sqltotal = "SELECT * FROM news_tbl";
				$qtotal = $koneksi->query($sqltotal);
				$total_data = $qtotal->num_rows;
				
				//berapa halaman yang di depan
				$total_page = ceil($total_data/$view);
				
				//tampilkan link jumlah halaman dengan looping
				?>
				<div class="pembungkusnomor" style="padding-top: 10px; height: 30px;">
					<?php for($i=1; $i<=$total_page; $i++) {?>
<!--					jika start $i /= page yg aktif-->
					 <?php if($i == $page_aktif) {?>
						<span class="pagelinkactive">
							<?php echo $i; ?>
					    </span>
<!--					end start $i /= page yg aktif-->
<!--					page link untuk ke halaman lainnya-->
					<?php }else{ ?>
					<a class="pagelink" href="?page=<?php echo $i; ?>">
							<?php echo $i; ?>
					
					</a>
					<?php } ?>
<!--					END page link untuk ke halaman lainnya-->
					
					<?php } ?>
				</div>
				<style>
					.pagelinkactive{
						background-color: #60b000;
						color: #FFF;
						text-align: center;
						height: 20px;
						width: 25px;
						display: block;
						float: left;
						border-radius: 3px;
						margin-right: 5px;
					}
					.pagelink{
						background-color: #000;
						color: #FFF;
						text-align: center;
						height: 20px;
						width: 25px;
						display: block;
						float: left;
						border-radius: 3px;
						margin-right: 5px;
						text-decoration: none;
					}
					.pagelink:hover{
						background-color: #60b000;
					}
				</style>
         
            </div><!--- END CONTENT WRAPPER -->
            
        </div>
<!---------------------------------------- END CONTENT ------------------------------->
		<div id="footer">
        
        	<div class="container">
            	<p> Copyright &copy; Your Company All Right Reserved</p>
            </div>
        
        </div>
<!---------------------------------------- END FOOTER --------------------------------->  
</div>
</body>
</html>
