<!-- top tiles -->
<div class="row ">
    <div class="tile_count">
        <?php if(has_permission(VIEW, 'student', 'student')){ ?>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <div class="stats-count-inner">
                <span class="count_top"><i class="fa fa-group"></i>
                    <?php echo $this->lang->line('total'); ?>
                    <?php echo $this->lang->line('student'); ?></span>
                <div class="count">
                    <?php echo $total_student ? $total_student : 0; ?>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php if(has_permission(VIEW, 'guardian', 'guardian')){ ?>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <div class="stats-count-inner">
                <span class="count_top"><i class="fa fa-paw"></i>
                    <?php echo $this->lang->line('total'); ?>
                    <?php echo $this->lang->line('guardian'); ?></span>
                <div class="count">
                    <?php echo $total_guardian ? $total_guardian : 0; ?>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php if(has_permission(VIEW, 'teacher', 'teacher')){ ?>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <div class="stats-count-inner">
                <span class="count_top"><i class="fa fa-users"></i>
                    <?php echo $this->lang->line('total'); ?>
                    <?php echo $this->lang->line('teacher'); ?></span>
                <div class="count">
                    <?php echo $total_teacher ? $total_teacher : 0; ?>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php if(has_permission(VIEW, 'hrm', 'employee')){ ?>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <div class="stats-count-inner">
                <span class="count_top"><i class="fa fa-user-md"></i>
                    <?php echo $this->lang->line('total'); ?>
                    <?php echo $this->lang->line('employee'); ?></span>
                <div class="count">
                    <?php echo $total_employee ? $total_employee :0; ?>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php if(has_permission(VIEW, 'accounting', 'income')){ ?>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <div class="stats-count-inner">
                <span class="count_top">
                    <?php echo isset($school_setting->currency_symbol) ? $school_setting->currency_symbol : '$';  ?>
                    <?php echo $this->lang->line('total'); ?>
                    <?php echo $this->lang->line('income'); ?>
                </span>
                <div class="count green">
                    <?php echo $total_income ? $total_income : '0.00'; ?>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php if(has_permission(VIEW, 'accounting', 'expenditure')){ ?>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <div class="stats-count-inner">
                <span class="count_top">
                    <?php echo isset($school_setting->currency_symbol) ? $school_setting->currency_symbol : '$';  ?>
                    <?php echo $this->lang->line('total'); ?>
                    <?php echo $this->lang->line('expenditure'); ?>
                </span>
                <div class="count red">
                    <?php echo $total_expenditure? $total_expenditure : '0.00'; ?>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<!-- /top tiles -->

<?php if($this->session->userdata('role_id') == SUPER_ADMIN){ ?>



<div class="section2">
    <div class="row section2_1">
        <div class="col-md-3 sec1_col1">
            <div class="row">
                <div class="col-md-7">
                    <h3>Teacher</h3>
                    <a href="#">Enter</a>

                    <br>

                </div>
                <div class="col-md-5">
                    <img src="<?php echo IMG_URL; ?>/teacher.png" width="80px height:80px;">
                </div>
            </div>

            <a href="#" class="info">More Info<i class="fa fa-arrow-circle-right"></i></a>
        </div>
        <div class="col-md-3 sec1_col2">
            <div class="row">
                <div class="col-md-7">
                    <h3>Class</h3>
                    <a href="#">Enter</a>

                    <br>

                </div>
                <div class="col-md-5">
                    <img src="<?php echo IMG_URL; ?>/class.png" width="80px height:80px;">
                </div>
            </div>

            <a href="#" class="info">More Info<i class="fa fa-arrow-circle-right"></i></a>
        </div>
        <div class="col-md-3 sec1_col3">
            <div class="row">
                <div class="col-md-7">
                    <h3>Section</h3>
                    <a href="#">Enter</a>

                    <br>

                </div>
                <div class="col-md-5">
                    <img src="<?php echo IMG_URL; ?>/section.png" width="80px height:80px;">
                </div>
            </div>

            <a href="#" class="info">More Info<i class="fa fa-arrow-circle-right"></i></a>
        </div>
        <div class="col-md-3 sec1_col4">
            <div class="row">
                <div class="col-md-7">
                    <h3>Subject</h3>
                    <a href="#">Enter</a>

                    <br>

                </div>
                <div class="col-md-5">
                    <img src="<?php echo IMG_URL; ?>/book.png" width="80px height:80px;">
                </div>
            </div>

            <a href="#" class="info">More Info<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>



    <div class="row section2_2">
        <div class="col-md-3 sec2_col1">
            <div class="row">
                <div class="col-md-7">
                    <h3>Class Routine</h3>
                    <a href="#">Enter</a>

                    <br>

                </div>
                <div class="col-md-5">
                    <img src="<?php echo IMG_URL; ?>/rotuine.png" width="80px height:80px;">
                </div>
            </div>

            <a href="#" class="info">More Info<i class="fa fa-arrow-circle-right"></i></a>
        </div>
        <div class="col-md-3 sec2_col2">
            <div class="row">
                <div class="col-md-7">
                    <h3>Guardian</h3>
                    <a href="#">Enter</a>

                    <br>

                </div>
                <div class="col-md-5">
                    <img src="<?php echo IMG_URL; ?>/guardian.png" width="80px height:80px;">
                </div>
            </div>

            <a href="#" class="info">More Info<i class="fa fa-arrow-circle-right"></i></a>
        </div>
        <div class="col-md-3 sec2_col3">
            <div class="row">
                <div class="col-md-7">
                    <h3>Student</h3>
                    <a href="#">Enter</a>

                    <br>

                </div>
                <div class="col-md-5">
                    <img src="<?php echo IMG_URL; ?>/student.png" width="80px height:80px;">
                </div>
            </div>

            <a href="#" class="info">More Info<i class="fa fa-arrow-circle-right"></i></a>
        </div>
        <div class="col-md-3 sec2_col4">
            <div class="row">
                <div class="col-md-7">
                    <h3>Attendance</h3>
                    <a href="#">Enter</a>

                    <br>

                </div>
                <div class="col-md-5">
                    <img src="<?php echo IMG_URL; ?>/attendance.png" width="80px height:80px;">
                </div>
            </div>

            <a href="#" class="info">More Info<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
    
    
    
        <div class="row section2_3">
        <div class="col-md-3 sec3_col1">
            <div class="row">
                <div class="col-md-7">
                    <h3>Exam</h3>
                    <a href="#">Enter</a>

                    <br>

                </div>
                <div class="col-md-5">
                    <img src="<?php echo IMG_URL; ?>/exam.png" width="80px height:80px;">
                </div>
            </div>

            <a href="#" class="info">More Info<i class="fa fa-arrow-circle-right"></i></a>
        </div>
        <div class="col-md-3 sec3_col2">
            <div class="row">
                <div class="col-md-7">
                    <h3>Exam Schedule</h3>
                    <a href="#">Enter</a>

                    <br>

                </div>
                <div class="col-md-5">
                    <img src="<?php echo IMG_URL; ?>/schedule.png" width="80px height:80px;">
                </div>
            </div>

            <a href="#" class="info">More Info<i class="fa fa-arrow-circle-right"></i></a>
        </div>
        <div class="col-md-3 sec3_col3">
            <div class="row">
                <div class="col-md-7">
                    <h3>Exam Attendance</h3>
                    <a href="#">Enter</a>

                    <br>

                </div>
                <div class="col-md-5">
                    <img src="<?php echo IMG_URL; ?>/marks.png" width="80px height:80px;">
                </div>
            </div>

            <a href="#" class="info">More Info<i class="fa fa-arrow-circle-right"></i></a>
        </div>
        <div class="col-md-3 sec3_col4">
            <div class="row">
                <div class="col-md-7">
                    <h3>Exam Marks</h3>
                    <a href="#">Enter</a>

                    <br>

                </div>
                <div class="col-md-5">
                    <img src="<?php echo IMG_URL; ?>/exam attendance.png" width="80px height:80px;">
                </div>
            </div>

            <a href="#" class="info">More Info<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
    
    
    
        <div class="row section2_4">
        <div class="col-md-3 sec4_col1">
            <div class="row">
                <div class="col-md-7">
                    <h3>Promotion</h3>
                    <a href="#">Enter</a>

                    <br>

                </div>
                <div class="col-md-5">
                    <img src="<?php echo IMG_URL; ?>/promotion.png" width="80px height:80px;">
                </div>
            </div>

            <a href="#" class="info">More Info<i class="fa fa-arrow-circle-right"></i></a>
        </div>
        <div class="col-md-3 sec4_col2">
            <div class="row">
                <div class="col-md-7">
                    <h3>Library</h3>
                    <a href="#">Enter</a>

                    <br>

                </div>
                <div class="col-md-5">
                    <img src="<?php echo IMG_URL; ?>/library.png" width="80px height:80px;">
                </div>
            </div>

            <a href="#" class="info">More Info<i class="fa fa-arrow-circle-right"></i></a>
        </div>
        <div class="col-md-3 sec4_col3">
            <div class="row">
                <div class="col-md-7">
                    <h3>Transport</h3>
                    <a href="#">Enter</a>

                    <br>

                </div>
                <div class="col-md-5">
                    <img src="<?php echo IMG_URL; ?>/bus.png" width="80px height:80px;">
                </div>
            </div>

            <a href="#" class="info">More Info<i class="fa fa-arrow-circle-right"></i></a>
        </div>
        <div class="col-md-3 sec4_col4">
            <div class="row">
                <div class="col-md-7">
                    <h3>Announcement</h3>
                    <a href="#">Enter</a>

                    <br>

                </div>
                <div class="col-md-5">
                    <img src="<?php echo IMG_URL; ?>/announcement.png" width="80px height:80px;">
                </div>
            </div>

            <a href="#" class="info">More Info<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
    
    
    
        <div class="row section2_1">
        <div class="col-md-3 sec1_col1">
            <div class="row">
                <div class="col-md-7">
                    <h3>Event</h3>
                    <a href="#">Enter</a>

                    <br>

                </div>
                <div class="col-md-5">
                    <img src="<?php echo IMG_URL; ?>/events.png" width="80px height:80px;">
                </div>
            </div>

            <a href="#" class="info">More Info<i class="fa fa-arrow-circle-right"></i></a>
        </div>
        <div class="col-md-3 sec1_col2">
            <div class="row">
                <div class="col-md-7">
                    <h3>Visitor</h3>
                    <a href="#">Enter</a>

                    <br>

                </div>
                <div class="col-md-5">
                    <img src="<?php echo IMG_URL; ?>/visitor.png" width="80px height:80px;">
                </div>
            </div>

            <a href="#" class="info">More Info<i class="fa fa-arrow-circle-right"></i></a>
        </div>
        <div class="col-md-3 sec1_col3">
            <div class="row">
                <div class="col-md-7">
                    <h3>Accounting</h3>
                    <a href="#">Enter</a>

                    <br>

                </div>
                <div class="col-md-5">
                    <img src="<?php echo IMG_URL; ?>/accounting.png" width="80px height:80px;">
                </div>
            </div>

            <a href="#" class="info">More Info<i class="fa fa-arrow-circle-right"></i></a>
        </div>
        <div class="col-md-3 sec1_col4">
            <div class="row">
                <div class="col-md-7">
                    <h3>Report</h3>
                    <a href="#">Enter</a>

                    <br>

                </div>
                <div class="col-md-5">
                    <img src="<?php echo IMG_URL; ?>/report.png" width="80px height:80px;">
                </div>
            </div>

            <a href="#" class="info">More Info<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

</div>




<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel tile overflow_hidden">
            <div class="x_title">
                <h4 class="head-title">
                    <?php echo $this->lang->line('school'); ?>
                    <?php echo $this->lang->line('statistics'); ?>
                </h4>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <script type="text/javascript">
                    $(function() {
                        $('#school-stats').highcharts({
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: '<?php  if($this->session->userdata('
                                role_id ') != SUPER_ADMIN){ ?>
                                <?php echo $this->session->userdata('school_name'); ?>
                                <?php }else{ ?>
                                <?php echo $this->global_setting->brand_name ? $this->global_setting->brand_name : SMS; ?>
                                <?php } ?>
                                '
                            },
                            xAxis: {
                                categories: ['<strong><?php echo $this->lang->line('
                                    class '); ?></strong>', '<strong><?php echo $this->lang->line('
                                    student '); ?></strong>', '<strong><?php echo $this->lang->line('
                                    teacher '); ?></strong>', '<strong><?php echo $this->lang->line('
                                    employee '); ?></strong>', '<strong><?php echo $this->lang->line('
                                    income '); ?></strong>', '<strong><?php echo $this->lang->line('
                                    expenditure '); ?></strong>'
                                ]
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: '<?php echo $this->lang->line('
                                    school '); ?> <?php echo $this->lang->line('
                                    all '); ?> <?php echo $this->lang->line('
                                    statistics '); ?>'
                                }
                            },
                            tooltip: {
                                pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
                                shared: true
                            },
                            plotOptions: {
                                column: {
                                    stacking: 'percent'
                                }
                            },
                            series: [
                                <?php if(isset($schools) && !empty($schools)){ ?>
                                <?php foreach($schools as $obj){ ?> {
                                    name: '<?php echo $obj->school_name; ?>',
                                    data: [<?php echo implode(',',$stats[$obj->id]); ?>]
                                },
                                <?php } ?>
                                <?php } ?>
                            ],
                            credits: {
                                enabled: false
                            }
                        });
                    });
                </script>

                <div id="school-stats" style=" width: 99%; vertical-align: top; height:250px; "></div>
            </div>
        </div>
    </div>

</div>

<?php } ?>

<div class="row">
    <div class="col-md-8 col-sm-8 col-xs-12">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel tile overflow_hidden">
                <div class="x_title">
                    <h3 class="head-title">
                        <?php echo $this->lang->line('calendar'); ?>
                    </h3>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div id="calendar"></div>
                    <link rel='stylesheet' href='<?php echo VENDOR_URL; ?>fullcalendar/lib/cupertino/jquery-ui.min.css' />
                    <link rel='stylesheet' href='<?php echo VENDOR_URL; ?>fullcalendar/fullcalendar.css' />
                    <script type="text/javascript" src='<?php echo VENDOR_URL; ?>fullcalendar/lib/jquery-ui.min.js'></script>
                    <script type="text/javascript" src='<?php echo VENDOR_URL; ?>fullcalendar/lib/moment.min.js'></script>
                    <script type="text/javascript" src='<?php echo VENDOR_URL; ?>fullcalendar/fullcalendar.min.js'></script>
                    <script type="text/javascript">
                        $(function() {
                            $('#calendar').fullCalendar({
                                header: {
                                    left: 'prev,next today',
                                    center: 'title',
                                    right: 'month,agendaWeek,agendaDay'
                                },
                                buttonText: {
                                    today: 'today',
                                    month: 'month',
                                    week: 'week',
                                    day: 'day'
                                },

                                //events and holidays
                                events: [
                                    <?php if(isset($events) && !empty($events)){ ?>
                                    <?php foreach($events as $obj){ ?> {
                                        title: "<?php echo $obj->title; ?>",
                                        start: '<?php echo date('
                                        Y - m - d ', strtotime($obj->event_from)); ?>T<?php echo date('
                                        H: i: s ', strtotime($obj->event_from)); ?>',
                                        end: '<?php echo date('
                                        Y - m - d ', strtotime($obj->event_to)); ?>T<?php echo date('
                                        H: i: s ', strtotime($obj->event_to)); ?>',
                                        backgroundColor: '<?php echo $theme->color_code; ?>', //red
                                        url: '<?php echo site_url('
                                        event / view / '.$obj->id); ?>', //red
                                        color: '#ffffff' //red
                                    },
                                    <?php } ?>
                                    <?php } ?>
                                    <?php if(isset($holidays) && !empty($holidays)){ ?>
                                    <?php foreach($holidays as $obj){ ?> {
                                        title: "<?php echo $obj->title; ?>",
                                        start: '<?php echo date('
                                        Y - m - d ', strtotime($obj->date_from)); ?>T<?php echo date('
                                        H: i: s ', strtotime($obj->date_from)); ?>',
                                        end: '<?php echo date('
                                        Y - m - d ', strtotime($obj->date_to)); ?>T<?php echo date('
                                        H: i: s ', strtotime($obj->date_to)); ?>',
                                        backgroundColor: '<?php echo $theme->color_code; ?>', //red
                                        url: '<?php echo site_url('
                                        announcement / holiday / view / '.$obj->id); ?>', //red
                                        color: '#ffffff' //red
                                    },
                                    <?php } ?>
                                    <?php } ?>
                                ]
                            });
                        });
                    </script>

                </div>
            </div>
        </div>

        <?php if(isset($news) && !empty($news)){ ?>
        <div class="col-md-6 col-sm-4 col-xs-12">
            <div class="x_panel tile overflow_hidden">
                <div class="x_title">
                    <h4 class="head-title">
                        <?php echo $this->lang->line('latest'); ?>
                        <?php echo $this->lang->line('news'); ?>
                    </h4>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <ul class="list-unstyled msg_list">
                        <?php foreach($news as $obj ){ ?>
                        <li>
                            <a href="<?php echo site_url('announcement/news/view/'.$obj->id); ?>">
                                <span class="image">
                                    <?php  if($obj->image != ''){ ?>
                                    <img src="<?php echo UPLOAD_PATH; ?>/news/<?php echo $obj->image; ?>" alt="" width="70" />
                                    <?php }else{ ?>
                                    <img src="<?php echo IMG_URL; ?>default-user.png" alt="Profile Image" />
                                    <?php } ?>
                                </span>
                                <span>
                                    <span>
                                        <?php echo $obj->title; ?></span>
                                    <span class="message"></span>
                                    <span class="time">
                                        <?php echo get_nice_time($obj->created_at); ?></span>
                                </span>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php if(isset($notices) && !empty($notices)){ ?>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel tile overflow_hidden">
                <div class="x_title">
                    <h4 class="head-title">
                        <?php echo $this->lang->line('latest'); ?>
                        <?php echo $this->lang->line('notice'); ?>
                    </h4>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <ul class="list-unstyled msg_list">

                        <?php foreach($notices as $obj ){ ?>
                        <li>
                            <a href="<?php echo site_url('announcement/notice/view/'.$obj->id); ?>">
                                <span>
                                    <span>
                                        <?php echo $obj->title; ?></span>
                                    <span>&nbsp;</span>
                                    <span class="time">
                                        <?php echo get_nice_time($obj->created_at); ?></span>
                                </span>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php } ?>

    </div>

    <div class="col-md-4 col-sm-4 col-xs-12">

        <?php if($this->session->userdata('role_id') != SUPER_ADMIN){ ?>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title">
                        <h4 class="head-title">
                            <?php echo $this->lang->line('student'); ?>
                            <?php echo $this->lang->line('statistics'); ?>
                        </h4>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <script type="text/javascript">
                            $(function() {
                                $('#student-stats').highcharts({
                                    chart: {
                                        type: 'pie',
                                        options3d: {
                                            enabled: true,
                                            alpha: 45,
                                            beta: 0
                                        }
                                    },
                                    title: {
                                        text: '<?php echo $this->lang->line('
                                        class '); ?> <?php echo $this->lang->line('
                                        statistics '); ?>'
                                    },
                                    tooltip: {
                                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                                    },
                                    plotOptions: {
                                        pie: {
                                            allowPointSelect: true,
                                            cursor: 'pointer',
                                            depth: 35,
                                            dataLabels: {
                                                enabled: true,
                                                format: '{point.name}'
                                            }
                                        }
                                    },
                                    series: [{
                                        type: 'pie',
                                        name: '<?php echo $this->lang->line('
                                        student '); ?>',
                                        data: [
                                            <?php if(isset($students) && !empty($students)){ ?>
                                            <?php foreach($students as $obj){ ?> ['<?php echo $this->lang->line('
                                                class '); ?> <?php echo $obj->class_name; ?>', <?php echo $obj->total_student; ?>
                                            ],
                                            <?php } ?>
                                            <?php } ?>
                                        ]
                                    }],
                                    credits: {
                                        enabled: false
                                    }
                                });
                            });
                        </script>
                        <div id="student-stats" style=" width: 99%; vertical-align: top; height:250px; "></div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel tile fixed_height_320">
                    <div class="x_title">
                        <h4 class="head-title">
                            <?php echo $this->lang->line('message'); ?>
                        </h4>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <script type="text/javascript">
                            $(function() {
                                $('#private-message').highcharts({
                                    chart: {
                                        type: 'column'
                                    },
                                    title: {
                                        text: ''
                                    },
                                    xAxis: {
                                        type: 'category'
                                    },
                                    yAxis: {
                                        title: {
                                            text: '<?php echo $this->lang->line('
                                            private_messaging '); ?>'
                                        }
                                    },
                                    legend: {
                                        enabled: false
                                    },
                                    plotOptions: {
                                        series: {
                                            borderWidth: 0,
                                            dataLabels: {
                                                enabled: true,
                                                format: '{point.y:.1f}%'
                                            }
                                        }
                                    },
                                    tooltip: {
                                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                                        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
                                    },
                                    series: [{
                                        name: '<?php echo $this->lang->line('
                                        message '); ?>',
                                        colorByPoint: true,
                                        data: [{
                                            name: '<?php echo $this->lang->line('
                                            new '); ?>',
                                            y: <?php echo count($new); ?>,
                                            drilldown: null
                                        }, {
                                            name: '<?php echo $this->lang->line('
                                            inbox '); ?>',
                                            y: <?php echo count($inboxs); ?>,
                                            drilldown: null
                                        }, {
                                            name: '<?php echo $this->lang->line('
                                            send '); ?>',
                                            y: <?php echo count($sents); ?>,
                                            drilldown: null
                                        }, {
                                            name: '<?php echo $this->lang->line('
                                            draft '); ?>',
                                            y: <?php echo count($drafts); ?>,
                                            drilldown: null
                                        }, {
                                            name: '<?php echo $this->lang->line('
                                            trash '); ?>',
                                            y: <?php echo count($trashs); ?>,
                                            drilldown: null
                                        }]
                                    }],
                                    credits: {
                                        enabled: false
                                    }
                                });
                            });
                        </script>
                        <div id="private-message" style=" width: 99%; vertical-align: top;height: 260px;"></div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h4 class="head-title">
                            <?php echo $this->lang->line('user'); ?>
                        </h4>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <script type="text/javascript">
                            $(function() {
                                $('#system-users').highcharts({
                                    chart: {
                                        type: 'pie',
                                        options3d: {
                                            enabled: true,
                                            alpha: 45
                                        }
                                    },
                                    title: {
                                        text: ''
                                    },
                                    tooltip: {
                                        pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
                                    },
                                    subtitle: {
                                        text: ''
                                    },
                                    plotOptions: {
                                        pie: {
                                            allowPointSelect: true,
                                            innerSize: 100,
                                            depth: 30,
                                            dataLabels: {
                                                format: '<b>{point.name}</b>'
                                            }
                                        }
                                    },
                                    credits: {
                                        enabled: false
                                    },
                                    series: [{
                                        name: '<?php echo $this->lang->line('
                                        user '); ?>',
                                        data: [
                                            <?php if(isset($users) && !empty($users)){ ?>
                                            <?php foreach($users as $obj){ ?> ['<?php echo $obj->name; ?>', <?php echo $obj->total_user; ?>],
                                            <?php } ?>
                                            <?php } ?>
                                        ]
                                    }]
                                });
                            });
                        </script>
                        <div id="system-users" style=" width: 100%; vertical-align: top; height:260px; "></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo VENDOR_URL; ?>/chart/js/highcharts.js"></script>
<script src="<?php echo VENDOR_URL; ?>/chart/js/highcharts-3d.js"></script>
<script src="<?php echo VENDOR_URL; ?>/chart/js/modules/exporting.js"></script>

<style type="text/css">
    .fc-time {
        display: none;
    }
</style>