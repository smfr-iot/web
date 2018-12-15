<?php
//Creates new record as per request
    //Connect to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "baal";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Database Connection failed: " . $conn->connect_error);
    }

    //Get current date and time
    date_default_timezone_set('Asia/Dhaka');
    $d = date("Y-m-d");
    //echo " Date:".$d."<BR>";
    $t = date("H:i:s");

    if(!empty($_POST['status']) && !empty($_POST['station']))
    {
      $status = $_POST['status'];
      $station = $_POST['station'];
      $Power = $_POST['Power'];

      $sql = "INSERT INTO logs (station, status, Power, Date, Time)
    
    VALUES ('".$station."', '".$status."','".$Power."', '".$d."', '".$t."')";

    if ($conn->query($sql) === TRUE) {
        echo "OK";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }


  $conn->close();
    //echo "closed";
?>
<?php 
/* Open connection to "zing_db" MySQL database. */
$mysqli = new mysqli("localhost","root","","baal");
 
/* Check the connection. */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
 

$data=mysqli_query($mysqli,"SELECT * FROM logs");
//echo"done to";
?>
<script>
var Voltage1=[<?php 
while($info=mysqli_fetch_array($data))
    echo $info['station'].','; /* We use the concatenation operator '.' to add comma delimiters after each data value. */

?>];




<?php
$data=mysqli_query($mysqli,"SELECT * FROM logs");
?>
var myLabels=[<?php 
while($info=mysqli_fetch_array($data))
    echo '"'.$info['Time'].'",'; /* The concatenation operator '.' is used here to create string values from our database names. */
?>];
        

        <?php
$data=mysqli_query($mysqli,"SELECT * FROM logs");
?>
var current1=[<?php 
while($info=mysqli_fetch_array($data))
    echo '"'.$info['status'].'",'; /* The concatenation operator '.' is used here to create string values from our database names. */
?>];
        <?php
$data=mysqli_query($mysqli,"SELECT * FROM logs");
?>

var power=[<?php 
while($info=mysqli_fetch_array($data))
    echo '"'.$info['Power'].'",'; /* The concatenation operator '.' is used here to create string values from our database names. */
?>];












</script>



    <?php
    /* Close the connection */
    $mysqli->close(); 



    ?><!DOCTYPE html>
<html>

<head>
  <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
  <a href="http://192.168.0.101/b/web.php""><button>REFRESH</button></a>
  <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
  </script>
  <style>
    html,
    body {
      height: 100%;
      width: 100%;
      margin-left: 10;
      padding: 0;
    }
    
    #myChart {
      height: 100%;
      width: 100%;
      min-height: 150px;
    }
    
    .zc-ref {
      display: none;
    }
  </style>
</head>

<body>
  <br><br><br><br>
  PRESS TO GO TO CONTROL OUTPUT <br><br>
<a href="http://192.168.8.101"><button>CONTROL PANEL</button></a>
    
<br />
  <p>Charging</p>
  <div id="myChart"><a class="zc-ref" href="https://www.zingchart.com">Powered by ZingChart</a></div>
  <script>
    var myConfig = {
      type: 'line',
      backgroundColor: '#2C1C39',
      title: {
        text: 'Time Based Power-RED / Voltage-YELLOW / Current-GREEN',
        adjustLayout: true,
        fontColor: "#E3E3E5",
        marginTop: 7
      },
      legend: {
        align: 'center',
        verticalAlign: 'top',
        backgroundColor: 'none',
        borderWidth: 0,
        item: {
          fontColor: '#E3E3E5',
          cursor: 'hand'
        },
        marker: {
          type: 'circle',
          borderWidth: 0,
          cursor: 'hand'
        }
      },
      plotarea: {
        margin: 'dynamic 70'
      },
      plot: {
        aspect: 'spline',
        lineWidth: 2,
        marker: {
          borderWidth: 0,
          size: 5
        }
      },
      scaleX: {
         lineColor: '#E3E3E5',
         zooming: true,
         zoomTo: [0, 15],
        // minValue: 1459468800000,
        // step: 'day',
        // item: {
        //   fontColor: '#E3E3E5'
        // },
        // transform: {
        //   type: 'time',
          
        // }

        "labels":myLabels
      },
      scaleY: {
        minorTicks: 1,
        lineColor: '#E3E3E5',
        tick: {
          lineColor: '#E3E3E5'
        },
        minorTick: {
          lineColor: '#E3E3E5'
        },
        minorGuide: {
          visible: true,
          lineWidth: 1,
          lineColor: '#E3E3E5',
          alpha: 0.7,
          lineStyle: 'dashed'
        },
        guide: {
          lineStyle: 'dashed'
        },
        item: {
          fontColor: '#E3E3E5'
        }
      },
      tooltip: {
        borderWidth: 0,
        borderRadius: 3
      },
      preview: {
        adjustLayout: true,
        borderColor: '#E3E3E5',
        mask: {
          backgroundColor: '#E3E3E5'
        }
      },
      crosshairX: {
        plotLabel: {
          multiple: true,
          borderRadius: 3
        },
        scaleLabel: {
          backgroundColor: '#53535e',
          borderRadius: 3
        },
        marker: {
          size: 7,
          alpha: 0.5
        }
      },
      crosshairY: {
        lineColor: '#E3E3E5',
        type: 'multiple',
        scaleLabel: {
          decimals: 2,
          borderRadius: 3,
          offsetX: -5,
          fontColor: "#2C2C39",
          bold: true
        }
      },
      shapes: [{
        type: 'rectangle',
        id: 'view_all',
        height: '20px',
        width: '75px',
        borderColor: '#E3E3E5',
        borderWidth: 1,
        borderRadius: 3,
        x: '85%',
        y: '11%',
        backgroundColor: '#53535e',
        cursor: 'hand',
        label: {
          text: 'View All',
          fontColor: '#E3E3E5',
          fontSize: 12,
          bold: true
        }
      }],
      series: [{
        values:power,
        lineColor: '#E34247',
        marker: {
          backgroundColor: '#E34247'
        }
      }, {
        values:Voltage1,
        lineColor: '#FEB32E',
        marker: {
          backgroundColor: '#FEB32E'
        }
      }, {
        values:current1,
        lineColor: '#31A59A',
        marker: {
          backgroundColor: '#31A59A'
        }
      }]
    };

    zingchart.bind('myChart', 'shape_click', function(p) {
      if (p.shapeid == "view_all") {
        zingchart.exec(p.id, 'viewall');
      }
    })

    zingchart.render({
      id: 'myChart',
      data: myConfig,
    });
  </script>
</body>

</html>