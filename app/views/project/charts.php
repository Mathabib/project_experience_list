<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?=BASEURL?>/css/chart.css">
    <link rel="stylesheet" href="<?=BASEURL?>/bootstrap/bootstrap.css">
</head>
<body>


<div><h1  class="header_title">Project Sectors Quantity per year</h1></div>
<div class="back_to_list"><a href="<?=BASEURL?>/"><h2> << Back</h2></a></div>

<?php 
if(isset($data['coba'])){
  var_dump($data['coba']);
}

?>

  <?php
    $conn = mysqli_connect('localhost', 'root', '', 'skripsi');
    $yearList = mysqli_query($conn, "SELECT DISTINCT YEAR(project_start) as tahun FROM project_revisi ORDER BY tahun ASC");
    $yearList2 = mysqli_query($conn, "SELECT DISTINCT YEAR(project_start) as tahun FROM project_revisi ORDER BY tahun ASC");
    $yearList3 = mysqli_query($conn, "SELECT DISTINCT YEAR(project_start) as tahun FROM project_revisi ORDER BY tahun ASC");
    $yearList4 = mysqli_query($conn, "SELECT DISTINCT YEAR(project_start) as tahun FROM project_revisi ORDER BY tahun ASC");
  ?>

 
<div class="filter">
  <form action="<?=BASEURL?>/project/open_chart" method="POST" >
    <label class="label" for="year_start">From Year: </label>
    <select name="from_year">
    <option value="">Select Year</option>
            <?php while($row = mysqli_fetch_assoc($yearList3)):?>
              <option value="<?php echo $row['tahun'] ?>"><?php echo $row['tahun'] ?></option>
            <?php endwhile ?>
    </select>

    <label class="label" for="year_last">to Year: </label>
    <select name="to_year">
    <option value="">Select Year</option>
            <?php while($row = mysqli_fetch_assoc($yearList4)):?>
              <option value="<?php echo $row['tahun'] ?>"><?php echo $row['tahun'] ?></option>
            <?php endwhile ?>
    </select>

    <button class="submit_button" name="submit">FILTER</button>
  </form>
  </div>


<div class="kontainer_wadah">

  <div  class="wadah">
    <canvas id="myChart" height="100"></canvas>
  </div>
</div>




<script src="<?=BASEURL?>/chartjs/chart.js"></script>



<?php




$tahun = $data['year'];


$tahunJson = json_encode($tahun);

$nickelJson = json_encode($data['sektor']['nickel']);
$powerJson = json_encode($data['sektor']['power']);
$coalJson = json_encode($data['sektor']['coal']);
$oil_gasJson = json_encode($data['sektor']['oil_gas']);
$tinJson = json_encode($data['sektor']['tin']);
$metalJson = json_encode($data['sektor']['metal']);
$goldJson = json_encode($data['sektor']['gold']);
$infrastructureJson = json_encode($data['sektor']['infrastructure']);
$buildingJson = json_encode($data['sektor']['building']);
$haul_roadJson = json_encode($data['sektor']['haul_road']);


   
    ?>


<script>
  
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
  type: 'bar',
  data: {
    labels: <?= $tahunJson ?>,
    datasets: [
        {
      label: 'nickel',
      data: <?= $nickelJson?> ,
      borderWidth: 1,
      backgroundColor: 'rgb(196, 193, 164)'
    },

    {
      label: 'Power',
      data: <?= $powerJson?> ,
      borderWidth: 1,
      backgroundColor: 'rgb(54, 162, 235)'
    },

    {
      label: 'coal',
      data: <?= $coalJson?> ,
      borderWidth: 1,
      backgroundColor: 'rgb(15, 15, 15)'
    },

    {
      label: 'oil_gas',
      data: <?= $oil_gasJson?> ,
      borderWidth: 1,
      backgroundColor: 'rgb(162, 197, 121)'
    },

    {
      label: 'tin',
      data: <?= $tinJson?> ,
      borderWidth: 1,
      backgroundColor: 'rgb(125, 124, 124)'
    },

    {
      label: 'metal',
      data: <?= $metalJson?> ,
      borderWidth: 1,
      backgroundColor: 'rgb(97, 103, 122)'
    },

    {
      label: 'gold',
      data: <?= $goldJson?> ,
      borderWidth: 1,
      backgroundColor: 'rgb(255, 176, 0)'
    },

    {
      label: 'infrastructure',
      data: <?= $infrastructureJson?> ,
      borderWidth: 1,
      backgroundColor: 'rgb(79, 111, 82)'
    },

    {
      label: 'building',
      data: <?= $buildingJson?> ,
      borderWidth: 1,
      backgroundColor: 'rgb(1, 116, 190)'
    },

    {
      label: 'haul road',
      data: <?= $haul_roadJson?> ,
      borderWidth: 1,
      backgroundColor: 'rgb(206, 206, 90)'
    },
    
    
],


    
  },
  options: {
    plugins: {
      legend: {
        labels: {
          font: {
            size: 18
          }
        }

      }
    },
    scales: {
      y: {
        beginAtZero: true,
        ticks: {
            font: {
              weight: 'bold',
              
            },
            color: 'rgb(0,0,0)'
        },
        border: {
          display: true
        },
        grid: {
          color : 'rgb(0, 0, 0)'
        }
      },

      x:{
        beginAtZero: true,
        ticks: {
            
            font: {
              size: 20,
              weight: 'bold'
            },
            color: 'rgb(0,0,0)'
        },
        border: {
          display: true
        },
        grid: {
          color : 'rgb(0, 0, 0)'
        }
      }
    }
  }
});
</script>

    
</body>
</html>