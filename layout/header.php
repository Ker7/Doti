<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        
    <title><?php if(isset($title)){ echo $title; }?></title>
    
    <!-- jqPlotter stuff for graphs and visuals -->
    <script language="javascript" type="text/javascript" src="http://localhost/doti/style/jquery.min.js"></script>
    <script language="javascript" type="text/javascript" src="http://localhost/doti/style/jquery.jqplot.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://localhost/doti/style/jquery.jqplot.css" />
    <!-- jqPlotteri plugin omakorda. Logaritmiliste graafikutelgede kuvamiseks! -->
    <script language="javascript" type="text/javascript" src="http://localhost/doti/style/jqplot.logAxisRenderer.js"></script>
        
    <link rel="stylesheet" type="text/css" href="http://localhost/doti/style/main.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/doti/vendor\bootstrap-3.3.6-dist\bootstrap-3.3.6-dist\css/bootstrap.min.css">
</head>
<body>