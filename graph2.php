<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/highcharts.js"></script>
        <script src="assets/js/exporting.js"></script>
    </head>
    <?php
        require_once("connect.php");
        $CURRENT_DATE = date("Y-m-d");
        $START_DATE = date("Y-m-d", strtotime("-1 day", strtotime($date)));
    ?>
    <?php
    $connect = mysqli_connect($host,$user,$pass,$db) or die("เชื่อมต่อไม่สำเร็จ");
    ?>
    <?php
    $objQuery4 = mysqli_query($connect,"SELECT * FROM showdata");
    while($objResult4 = mysqli_fetch_array($objQuery4))
    {
    $showh1 = $objResult4['showh1'];
    }
    $y2559 = array();
    $date = array();
    $time = array();
    $result = mysqli_query($connect,"SELECT date,time,level FROM water_table WHERE place='$showh1' and date BETWEEN '$START_DATE' AND '$CURRENT_DATE'and  time = '06:00' or time = '06:30' or time = '07:00' or time = '07:30' or time = '08:00' or time = '08:30' or time = '09:00' or time = '09:30' or time = '10:00' or time = '10:30' or time = '11:00' or time = '11:30' or time = '12:00' or time = '12:30' or time = '13:00' or time = '13:30' or time = '14:00' or time = '14:30' or time = '15:00' or time = '15:30' or time = '16:00' or time = '16:30' or time = '17:00' or time = '17:30' or time = '18:00' or time = '18:30' or time = '19:00' or time = '19:30' or time = '20:00' or time = '20:30' or time = '21:00' or time = '21:30' or time = '22:00' or time = '22:30' or time = '23:00' or time = '23:30' or time = '01:00' or time = '01:30' or time = '02:00' or time = '02:30' or time = '03:00' or time = '03:30' or time = '04:00' or time = '04:30' or time = '05:00' or time = '05:30'  order by ID DESC LIMIT 24");
    while($row=mysqli_fetch_array($result))
    {
    array_push($y2559,$row[level]);
    array_push($date,$row[date]);
    array_push($time,$row[time]);
    }
    ?>

    <script>
    $(function () {
    $('#container').highcharts({
    chart: {
    type: 'spline'
    },
    title: {
    text: ''
    },
    subtitle: {
    text: ''
    },
    xAxis: {
    categories: ['<?php echo  implode("<br>','", $time);?>'+'<br>']
    },
    yAxis: {
    title: {
    text: 'ระดับน้ำ (เมตร)'
    }
    },
    tooltip: {
    enabled: true,
    formatter: function() {
    return '<b>'+ this.series.name +'<br>'+'วันที่ '+this.x + 'ระดับน้ำ'+this.y+'เมตร';
    }
    },
    legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'top',
    x: -0,
    y: 150,
    borderWidth: 0
    },
    plotOptions: {
    line: {
    dataLabels: {
    enabled: true
    },
    enableMouseTracking: true
    }
    },
    series: [{
    name: '<?php echo $showh1;?>',
    data: [<?php echo  implode(',', $y2559) // ข้อมูล array แกน y ?>]
    }
    ]
    });
    }
    );
    </script>

    <body>
        <div id="container" style="min-width: 400; min-height: 300; max-height: auto; margin: 0 auto"></div>
    </body>
</html>
