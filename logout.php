<?php
include "header.php";


if(isset($_SESSION['name'])){
	session_destroy();
	
	echo " you have loged out sucessfully";
	 header('refresh:5, url=index.php ');
	}else{
		
		echo "You are laready loged Out";
		header('refresh:5, url=index.php ');
		}
	

?>

 </div> 
</div>

</div>
</div>
</body>
</html>