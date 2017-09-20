	
	<div class="col-lg-2">
		<!-- Just some space -->
	</div>
	<div class="col-lg-8">

		<?php 

			if(isset($_POST['publish'])) {
	   
	            $post_title			= mysqli_real_escape_string($connection, $_POST['title']);
	            // $post_user       = $_POST['post_user'];
	            $post_author        = mysqli_real_escape_string($connection, $_POST['author']);
	            $post_category_id   = $_POST['post_category_id'];
	            $post_status        = $_POST['post_status'];
	    
	            $post_image         = $_FILES['image']['name'];
	            $post_image_temp    = $_FILES['image']['tmp_name'];
	    
	            $post_tags          = mysqli_real_escape_string($connection, $_POST['post_tags']);
	            $post_content       = mysqli_real_escape_string($connection, $_POST['post_content']);
	            $post_date          = date('d-m-y');

	            $post_comment_count = 4;

	       
	        	move_uploaded_file($post_image_temp, "../images/$post_image");

	        	$query  = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) ";
	        	$query .= "VALUES ($post_category_id, '$post_title', '$post_author', now(), '$post_image', '$post_content', '$post_tags', $post_comment_count, '$post_status')";

	        	$publish_query = mysqli_query($connection, $query);

	        	if (!$publish_query) {
	        		die("Not published. Sorry! " . mysqli_error($connection));
	        	}

	        }

		?>

		<form action="" method="post" enctype="multipart/form-data">

			<div class="form-group">
				<label for="post-title">Post Title: &nbsp;</label>
				<input type="text" class="form-control" name="title" id="post-title">
			</div>

			<div class="form-group">
				<label for="post-category">Category: &nbsp;</label>
				<select name="post_category_id" id="post-category">
					<option selected hidden>Select ID</option>
					<option>10</option>
					<option>20</option>
					<option>30</option>
				</select>
			</div>

			<!-- <div class="form-group">
				<label for="users">Users: &nbsp;</label>
				<select name="post_user" id="">
					<option value=''></option>
				</select>
			</div> -->

			<div class="form-group">
				<label for="post-author">Post Author: &nbsp;</label>
				<input type="text" class="form-control" name="author" id="post-author">
			</div>

			<div class="form-group">
				<label for="post-status">Post Status: &nbsp;</label>
				<select name="post_status" id="post-status">
					<option selected hidden>Select your option</option>
					<option value="approved">Approved</option>
					<option value="published">Published</option>
					<option value="draft">Draft</option>
				</select>
			</div>

			<div class="form-group">
				<label for="post-image">Post Image: &nbsp;</label>
				<input type="file" name="image" id="post-image">
			</div>

			<div class="form-group">
				<label for="post-tags">Post Tags: &nbsp;</label>
				<input type="text" class="form-control" name="post_tags" id="post-tags">
			</div>

			<div class="form-group">
				<label for="post-content">Post Content: &nbsp;</label>
				<textarea class="form-control" name="post_content" id="post-content" rows="10" style="resize: none;"></textarea>
			</div>

			<div class="form-group">
				<input class="btn btn-primary" type="submit" name="publish" value="PUBLISH">
			</div>

		</form>

	</div>
		<div class="col-lg-2">
		<!-- Just some space -->
	</div>