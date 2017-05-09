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
    $PLACE = array();
    $place_query = mysqli_query($connect,"SELECT * FROM data");
    while ($result_place = mysqli_fetch_array($place_query)) {
    array_push($PLACE,$result_place['h1']);
    
    }
    $COUNT= count($PLACE);
    for ($i=0; $i <$COUNT ; $i++)
    {
    $map[$i] = array();
    $date = array();
    $time = array();
    $result = array();
    $result = mysqli_query($connect,"SELECT date,time,level FROM water_table WHERE place='$PLACE[$i]' order by ID DESC LIMIT 12");
    while($row=mysqli_fetch_array($result))
    {
    array_push($map[$i],$row[level]);
    array_push($date,$row[date]);
    array_push($time,$row[time]);
    }
    }
    ?>
    <script>
    $(function () {
    $('#container').highcharts({
    chart: {
    type: 'spline' //รูปแบบของ แผนภูมิ ในที่นี้ให้เป็น line
    },
    title: {
    text: '' //
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
    series: [
    <?php 
    for ($i=0; $i <$COUNT ; $i++)
    {
    ?>
    {
    name: [<?php echo $i?>],
    data: [<?php echo  implode(',', $map[$i]) // ข้อมูล array แกน y ?>]
    },
    <?php 
    }
    ?>
    ]
    });
    }
    );
    </script>
    
    <body>
        <div id="container" style="min-width: 400; min-height: 300; max-height: auto; margin: 0 auto"></div>
    </body>
</html>