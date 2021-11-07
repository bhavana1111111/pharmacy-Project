<div class="panel panel-default sidebar-menu">
	<div class="panel-heading"><!--Panel heading start-->
		<h3 class="panel-title">Product categories</h3>
	</div>
	<div class="panel-body">
		<ul class="nav nav-pills nav-stacked category-menu">
			<?php
				getCats();

			?>
		</ul>
	</div>
</div><!--end of side bar-->

<div class="panel panel-default sidebar-menu">
	<div class="panel-heading"><!--Panel heading start-->
		<h3 class="panel-title">Brand Categories</h3>
	</div>
	<div class="panel-body">
		<ul class="nav nav-pills nav-stacked category-menu">
			<?php
				getMCats();
			?>
		</ul>
	</div>
</div><!--end of side bar-->
