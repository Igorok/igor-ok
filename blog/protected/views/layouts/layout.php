<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/blog/public/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/blog/public/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/blog/public/css/ie.css" media="screen, projection" />
	<![endif]-->
	<!--link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/blog/public/css/main.css" /-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/blog/public/css/form.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo Yii::app()->request->baseUrl; ?>/blog/blog/public/js/html5shiv.js"></script>
      <script src="<?php echo Yii::app()->request->baseUrl; ?>//blog/blog/public/js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/blog/public/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/blog/public/css/style.css" />
    <script type="text/javascript" src="/blog/public/javascript/bootstrap.min.js"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
    <div id="wrap" class="container-fluid">
        <!-- Fixed navbar -->
        <div class="container">
          <!-- mobile logo -->
          <a class="mobileLogo" href="/">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo.png" alt="">
          </a>
          <!-- header start -->
          <div class="navbar navbar-inverse">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/blog/public/img/logo.png" alt="">
                </a>
            </div>
              
            <div class="navbar-collapse collapse">   
                <div class="row">
                    <div class="knp_menu navbar-left clearfix">
                        <?php $this->widget('zii.widgets.CMenu',array(
                            'items'=>array(
                                array('label'=>'Home', 'url'=>array('post/index')),
                                array('label'=>'About', 'url'=>array('site/page', 'view'=>'about')),
                                array('label'=>'Contact', 'url'=>array('site/contact')),
                                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                            ),
                        )); ?>
                    </div>
                </div>
                
            </div><!--/.nav-collapse -->
        </div>
        <!-- header end -->
        <?php echo $content; ?>
      
        </div>
        <!-- -->
    </div>
    <!-- footer -->
    <div class="container">
        <div id="footer">
            <div class="copyRight">
                &copy; ipatov-soft.ru
            </div>
        </div>
    </div>
    <!-- end footer -->
    <!-- scroll top -->
    <div class="btn btn-default btn-lg scrollTopButton">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </div>
    <!-- end scroll top -->    
</body>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter22878043 = new Ya.Metrika({id:22878043,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true});
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/22878043" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</html>
