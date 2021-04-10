<!DOCTYPE html>
<html lang="en">
	<head>
	   <title>Add New User</title>
	   <?php include "../parts/meta.php" ?>
	</head>
	<body>
		<header class="navbar">
	      <div class="container display-flex flex-align-center">
	         <div class="flex-none">
	            <h1>User Admin</h1>
	         </div>
	         <div class="flex-stretch"></div>
	         <nav class="flex-none nav flex">
	            <ul>
	               <li><a href="<?= $_SERVER['PHP_SELF'] ?>">List</a></li>
	            </ul>
	         </nav>
	      </div>
	   </header>
	</body>

	<div class="container">
      <div class="card soft">
      	<h2>Add new user</h2>

      	<h3>Personal information</h3>

         <form method="post" class="grid gap-column" action="demo/add_user.php" >
             
            <div class="col-md-12 col-xs-12">
               <div class="form-control">
                  <label for="name" class="form-label">Name</label>
                  <input id="name" name="name" type="text" placeholder="John" class="form-input" value="">
               </div>
            </div>
            <div class="col-md-6 col-xs-12">
               <div class="form-control">
                  <label for="type" class="form-label">Type</label>
                  <input id="type" name="type" type="text" placeholder="John" class="form-input" value="">
               </div>
            </div>
            <div class="col-md-6 col-xs-12">
               <div class="form-control">
                  <label for="classes" class="form-label">Classes</label>
                  <input id="classes" name="classes" type="text" placeholder="Doe" class="form-input" value="">
               </div>
            </div>
            <div class="col-md-12 col-xs-12 bottom-margin-sm">
               <div class="form-control flex-layout">
                  <label for="useremail" class="form-label">Email</label>
                  <input id="user-email" name="email" type="email" placeholder="suculentina@gmail.com" class="form-input" value="">     
               </div>
            </div>
            <input   class="form-button highlighted  col-md-12 col-xs-12" type="submit" value="Submit"  >
         </form>
      </div>
    </div>
</html>