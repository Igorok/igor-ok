<div class="post">
	<div class="h3">
		<?php echo CHtml::link(CHtml::encode($data->title), $data->url); ?>
	</div>
	<p class="author">
		posted by <?php echo $data->author->username . ' on ' . date('d/m/Y',$data->create_time); ?>
	</p>
	<div class="content">
		<?php
			echo $data->short_decription;
		?>
	</div>
	<div class="nav">
		<b>Tags:</b>
		<?php echo implode(', ', $data->tagLinks); ?>
		<br/>
		<?php echo CHtml::link('Permalink', $data->url); ?> |
		<?php echo CHtml::link("Comments ({$data->commentCount})",$data->url.'#comments'); ?> |
		Last updated on <?php echo date('d/m/Y',$data->update_time); ?>
	</div>
</div>
