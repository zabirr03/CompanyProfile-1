<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Services</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="wrapper">
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
				$koneksi = new mysqli("localhost","root","","progresss_bisnis_db_ridho");
				
				$sql = "SELECT * FROM product_tbl";
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
                    <a href="product_detail.php?id_product=<?php echo $rownews['id_product'];?>" class="detail_product">Read More</a>
                </div>
				<?php } while($rowproducts = $qproducts-> fetch_assoc());?>
                

                
         
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
