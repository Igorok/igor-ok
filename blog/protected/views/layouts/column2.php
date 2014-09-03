<?php $this->beginContent('/layouts/layout'); ?>
<!-- -->     
    <div class="textCase">
    	<div class="clearfix">
	        <div class="col-md-9">
	        	<?php echo $content; ?>
			    <br /><br />
	        </div>
	        <div class="col-md-3 asideCase">
	            <?php if(!Yii::app()->user->isGuest) $this->widget('UserMenu'); ?>
            	<br />
				<?php $this->widget('TagCloud', array(
					'maxTags'=>Yii::app()->params['tagCloudCount'],
				)); ?>
				<br />
				<?php $this->widget('RecentComments', array(
					'maxComments'=>Yii::app()->params['recentCommentCount'],
				)); ?>
				<br />
	        </div>
        </div>

        <div class="separatorBrown"></div>
	    <!-- -->
	    <h3 class="partnersHeadline">&nbsp;&nbsp;&nbsp;&nbsp;Партнеры</h3>
	    <!-- -->
	    <div class="clearfix">
	        <div class="partnersCase">
	            <!-- баннер -->
	            <!-- BEST LIKE BANNER 200x200-->
	            <script type='text/javascript'>
	            var best_like_width = 200;
	            var best_like_height = 200;
	            var best_like_uid = 46;
	            var uniq = false;</script>
	            <script type='text/javascript' src='http://best-like.ru/banners/load_banners.js'></script>
	            <!-- END BANNER -->
	        </div>
	        <!-- -->
	        <div class="partnersCase">
	            <!-- -->
	            <div class="ipatov_soft_banner">
	                <a href="http://ipatov-soft.ru/" target="_blank">
	                    Создание сайтов
	                </a>
	            </div>
	            <!-- конец баннера -->
	        </div>
	    </div>


    </div>

<?php $this->endContent(); ?>