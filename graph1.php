<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/highcharts.js"></script>
        <script src="assets/js/exporting.js"></script>
    </head>
    <?php
        require_once("connect.php");

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
    $result = mysqli_query($connect,"SELECT date,time,level FROM water_table WHERE place='$showh1' order by ID DESC LIMIT 10");
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
    type: 'line' 
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
    return '<b>'+ this.series.name +'<br>'+'เวลา '+this.x + 'ระดับน้ำ'+this.y+'เมตร';
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
    name: '',
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