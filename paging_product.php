<?php
session_start();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Paging Product</title>
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
				<form action="search_product.php" method="get">
					<input type="text" name="search" placeholder="Search Product">
					<input type="submit" value="Search">
				</form>
			</div>
                <!--------------------------------------------------------------------------------->
                <?php
				include "config/config.php";
				$view = 6;
				
				if(isset($_GET['page'])){
				$page_aktif = $_GET['page'];
				}else{
				$page_aktif = 1;
				}
				$awaldata = ($page_aktif-1)*$view;
				
				$sql = "SELECT * FROM product_tbl LIMIT $awaldata,$view";
				
				$qproducts = $koneksi->query($sql);
				$rowproducts = $qproducts->fetch_assoc();
				
				do {
				?>
                <!--------------------------------------------------------------------------------->
                <div class="product_item">
                	<div class="number_icon"><?php echo $rowproducts['id_product'];?></div>
                    <h2 class="product_title"><?php echo $rowproducts['name_product'];?></h2>
					<img style="width:100%; height: 200px;" src="properti/<?php echo $rowproducts['gambar_product']; ?>">
                    <p class="product_desc"><?php echo substr($rowproducts['description_product'],0,250); ?>
                    </p>
                    <a href="product_detail.php?id_product=<?php echo $rowproducts['id_product'];?>" class="detail_product">Read More</a>
               </div>
				<?php } while($rowproducts = $qproducts-> fetch_assoc());?>
				<?php
				$sqltotal = "SELECT * FROM product_tbl";
				$qtotal = $koneksi->query($sqltotal);
				$total_data = $qtotal->num_rows;									 
                $total_page = ceil($total_data/$view);
                ?>
				<div class="pembungkusnomor" style="height: 30px; padding-top: 10px;">
				<?php for($i=1; $i<=$total_page; $i++) {?>
				<?php if($i == $page_aktif) {?>
					<span class="pagelinkactive">
						<?php echo $i; ?>
					</span>
					<?php }else{ ?>
					<a class="pagelink" href="?page=<?php echo $i; ?>">
					<?php echo $i; ?></a>
					<?php } ?>
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
