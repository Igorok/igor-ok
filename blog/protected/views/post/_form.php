<div class="form">

<?php $form=$this->beginWidget('CActiveForm'); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo CHtml::errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>80,'maxlength'=>128, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'short_decription'); ?>
		<?php echo $form->textField($model,'short_decription',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'short_decription'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'page_url'); ?>
		<?php echo $form->textField($model,'page_url',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'page_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'page_keywords'); ?>
		<?php echo $form->textField($model,'page_keywords',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'page_keywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'page_description'); ?>
		<?php echo $form->textField($model,'page_description',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'page_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo CHtml::activeTextArea($model,'content',array('class'=>'form-control')); ?>
		<p class="hint">You may use <a target="_blank" href="http://daringfireball.net/projects/markdown/syntax">Markdown syntax</a>.</p>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tags'); ?>
		<?php $this->widget('CAutoComplete', array(
			'model'=>$model,
			'attribute'=>'tags',
			'url'=>array('suggestTags'),
			'multiple'=>true,
			'htmlOptions'=>array('size'=>50, 'class'=>'form-control'),
		)); ?>
		<p class="hint">Please separate different tags with commas.</p>
		<?php echo $form->error($model,'tags'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',Lookup::items('PostStatus'), array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-default')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->