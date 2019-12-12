<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta charset="ISO-8859-15">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $title_for_layout; ?></title>        
        <link rel="icon" href="<?php echo IMG_URL; ?>front/favicon.ico" type="image/x-icon" />
        
        <!-- CSS -->    
        <link rel="shortcut icon" href="<?php echo IMG_URL; ?>front/favicon.ico">
        <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <!-- Fontawesome css -->
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>front/font-awesome.min.css">
    <!-- Ionicons css -->
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>front/ionicons.min.css">
    <!-- linearicons css -->
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>front/linearicons.css">
    <!-- Nice select css -->
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>front/nice-select.css">
    <!-- Jquery fancybox css -->
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>front/jquery.fancybox.css">
    <!-- Jquery ui price slider css -->
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>front/jquery-ui.min.css">
    <!-- Meanmenu css -->
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>front/meanmenu.min.css">
    <!-- Nivo slider css -->
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>front/nivo-slider.css">
    <!-- Owl carousel css -->
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>front/owl.carousel.min.css">
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>front/bootstrap.min.css">
    <!-- Custom css -->
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>front/default.css">
    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>front/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>front/responsive.css">
         
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
            
    </head>

    <body>
        <div id="preloader"></div>
        
        <?php $this->load->view('layout/header'); ?>  
        
        <!-- page content -->        
        <?php echo $content_for_layout; ?>
        <!-- /page content -->
        
        <!-- footer content -->
        <?php $this->load->view('layout/footer'); ?>   
        <!-- /footer content -->     
         <!-- jquery 3.2.1 -->
    <script src="<?php echo JS_URL; ?>front/vendor/jquery-3.2.1.min.js"></script>
    <!-- Countdown js -->
    <script src="<?php echo JS_URL; ?>front/jquery.countdown.min.js"></script>
    <!-- Mobile menu js -->
    <script src="<?php echo JS_URL; ?>front/jquery.meanmenu.min.js"></script>
    <!-- ScrollUp js -->
    <script src="<?php echo JS_URL; ?>front/jquery.scrollUp.js"></script>
    <!-- Nivo slider js -->
    <script src="<?php echo JS_URL; ?>front/jquery.nivo.slider.js"></script>
    <!-- Fancybox js -->
    <script src="<?php echo JS_URL; ?>front/jquery.fancybox.min.js"></script>
    <!-- Jquery nice select js -->
    <script src="<?php echo JS_URL; ?>front/jquery.nice-select.min.js"></script>
    <!-- Jquery ui price slider js -->
    <script src="<?php echo JS_URL; ?>front/jquery-ui.min.js"></script>
    <!-- Owl carousel -->
    <script src="<?php echo JS_URL; ?>front/owl.carousel.min.js"></script>
    <!-- Bootstrap popper js -->
    <script src="<?php echo JS_URL; ?>front/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?php echo JS_URL; ?>front/bootstrap.min.js"></script>
    <!-- Plugin js -->
    <script src="<?php echo JS_URL; ?>front/plugins.js"></script>
    <!-- Main activaion js -->
    <script src="<?php echo JS_URL; ?>front/main.js"></script>
     <script src="<?php echo JS_URL; ?>front/vendor/modernizr-3.5.0.min.js"></script>   
        
        
        <script type="text/javascript">

            jQuery.extend(jQuery.validator.messages, {
                required: "<?php echo $this->lang->line('required_field'); ?>",
                email: "<?php echo $this->lang->line('enter_valid_email'); ?>",
                url: "<?php echo $this->lang->line('enter_valid_url'); ?>",
                date: "<?php echo $this->lang->line('enter_valid_date'); ?>",
                number: "<?php echo $this->lang->line('enter_valid_number'); ?>",
                digits: "<?php echo $this->lang->line('enter_only_digit'); ?>",
                equalTo: "<?php echo $this->lang->line('enter_same_value_again'); ?>",
                remote: "<?php echo $this->lang->line('pls_fix_this'); ?>",
                dateISO: "Please enter a valid date (ISO).",
                maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
                minlength: jQuery.validator.format("Please enter at least {0} characters."),
                rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
                range: jQuery.validator.format("Please enter a value between {0} and {1}."),
                max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
                min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
            });
            
            
            function change_school(school_id){
                if(school_id){
                    window.location.href = '<?php echo site_url('school/'); ?>'+school_id; 
                }
            }           
        </script>
    </body>
</html>