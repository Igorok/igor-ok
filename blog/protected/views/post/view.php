<?php
	$this->breadcrumbs=array(
		$model->title,
	);
	$this->pageTitle=$model->title;
	$this->pageMetaKeywords=$model->page_keywords;
	$this->pageMetaDescription=$model->page_description;
?>

<h3>
	<?php echo CHtml::encode($model->title); ?>
</h3>
<p class="author">
	posted by <?php echo $model->author->username . ' on ' . date('d/m/Y',$model->create_time); ?>
</p>
<div class="content">
	<?php
		echo $model->content;
	?>
</div>
<div class="nav">
	<b>Tags:</b>
	<?php echo implode(', ', $model->tagLinks); ?>
	<br/>
	<?php echo CHtml::link('Permalink', $model->url); ?> |
	<?php echo CHtml::link("Comments ({$model->commentCount})",$model->url.'#comments'); ?> |
	Last updated on <?php echo date('d/m/Y',$model->update_time); ?>
</div>



<div id="comments">
	<?php if($model->commentCount>=1): ?>
		<h3>
			<?php echo $model->commentCount>1 ? $model->commentCount . ' comments' : 'One comment'; ?>
		</h3>

		<?php $this->renderPartial('_comments',array(
			'post'=>$model,
			'comments'=>$model->comments,
		)); ?>
	<?php endif; ?>

	<h3>Leave a Comment</h3>

	<?php if(Yii::app()->user->hasFlash('commentSubmitted')): ?>
		<div class="flash-success">
			<?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
		</div>
	<?php else: ?>
		<?php $this->renderPartial('/comment/_form',array(
			'model'=>$comment,
		)); ?>
	<?php endif; ?>

</div><!-- comments -->
