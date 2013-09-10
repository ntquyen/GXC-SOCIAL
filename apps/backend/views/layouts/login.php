<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/styles.css" />
	<title><?php echo CHtml::encode($this->pageTitle); ?> - Control Panel</title>
	<?php Yii::app()->bootstrap->register(); ?>
    <style type="text/css">
            *{}
            body{background:#ccc;}
            a{}
            #wrapper{width:560px;margin: 100px auto; border-radius:8px; -webkit-border-radius:8px; background:#fff;padding:20px;-webkit-box-shadow:  0px 0px 8px 0px #555555;box-shadow:  0px 0px 8px 0px #555555;border:3px solid #eee;}
            h1{text-align:center; font-size:36px;padding-bottom:20px;}
            .intro{font-size:14px; color:#7A7D7D; line-height:18px; text-align:center;}
            .btnwrapper{text-align:center;margin:50px;}
            .installbtn{border-width:0; cursor:pointer;padding:10px 30px; font-size:14px; border-radius:4px; -webkit-border-radius:4px; color:#fff; font-weight:bold;; background:#ccc; text-decoration:none;background: #7abcff;
            background: -moz-linear-gradient(top,  #7abcff 0%, #60abf8 44%, #4096ee 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#7abcff), color-stop(44%,#60abf8), color-stop(100%,#4096ee));
            background: -webkit-linear-gradient(top,  #7abcff 0%,#60abf8 44%,#4096ee 100%);
            background: -o-linear-gradient(top,  #7abcff 0%,#60abf8 44%,#4096ee 100%);
            background: -ms-linear-gradient(top,  #7abcff 0%,#60abf8 44%,#4096ee 100%);
            background: linear-gradient(to bottom,  #7abcff 0%,#60abf8 44%,#4096ee 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#7abcff', endColorstr='#4096ee',GradientType=0 );
            box-shadow:0px 0px 4px 0px #ccc;-webkit-box-shadow:0px 0px 4px 0px #ccc;}
            .installbtn:hover{color:#000;}
            #footer{text-align:center; border-top:1px dotted #ccc;margin-top:30px;padding-top:10px; color:#ccc; font-size:11px;}
            #footer a{color:#09f;}
            #footer a:hover{color:#f90;}
            
            #installform{background:#f5f5f5; border-radius:4px; -webkit-border-radius:4px;width:500px; padding:20px; margin:20px auto; border:1px solid #eee;}
            h2{margin:0;padding-bottom:30px;text-align:center;}
            
            .fitem{clear:both; font-size:14px;padding-top:5px;}
            .fitem .label{float:left; width:180px; text-align:right;padding:8px 10px 0 0;}
            .fitem .input{float:left;}
            .fitem .tbx{padding:6px; font-size:16px;border:1px solid #ccc;width:240px;}
        </style>
</head>

<body>

<div id="wrapper">

	<?php echo $content; ?>
	
</div><!-- page -->

</body>
</html>
