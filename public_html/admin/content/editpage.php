
<div class="col-10">
	<div class="container">

	<h1>Edit <?php echo $pageTitle; ?></h1>
		<nav class="fg-white bg-black bg-noise border">
<ul>
<li><a href="#">hufdsfih</a></li>
<li><a href="#">huih</a></li>
<li><a href="#">huih</a></li>
</ul>
</nav>
		<div class="">
		<form>
		<div class="col-12">
			<label for="pagetitle">Title:</label>
			<input type="text" name="pagetitle" id="pagetitle" value="<?php echo $pageTitle; ?>">
			</div>
			<div class="col-12">
			<label for="pagecontent">Content:</label>
			<textarea name="pagecontent" id="pagecontent" class="col-12"><?php __getContent($pageId) ?></textarea>
			</div>
			<input type="submit">
		</form>
		</div>
	</div>
</div>