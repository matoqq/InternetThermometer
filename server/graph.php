<?php include("dbinfo.php"); ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<!--<link rel="stylesheet" href="styles.css" type="text/css">-->
<script type="text/javascript" src="http://d3js.org/d3.v3.min.js"></script>
</head>

<body>

<style>
.line {
  fill: none;
  stroke: white;      // starts invisible, made visible with transition
  stroke-width: 1px;  // half is inside the margin, half is outside
}
rect {
  fill: none;
  stroke: black;
  stroke-width: 1px;  // half is inside the margin, half is outside
}
.axis path, .axis line {
  fill: none;
  stroke: #000;
  shape-rendering: crispEdges;
}

#arrayDiv, #outputDiv{
    display: none;
}
</style>

<table width="100%" border="1px solid black">
            <tr><td>
                <a href="../">Home</a>
                <a href="/database.php">Database</a>
                <!--<a href="/graph.php">Graph</a>-->
                
                </td></tr>
            <tr><td><h1>Graph</h1></td></tr>
        </table><br>

<div id="arrayDiv" border="1px"><?php
// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM sensors_table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo $row["time"].",".$row["temperature1"].";";
    }
} else {
    echo "0 results";
}
$conn->close();
?></div>
<div id="outputDiv"></div>

<script>
var input = document.getElementById("arrayDiv").innerHTML;
var splitArray = input.split(";");
var n = splitArray.length;

var data = new Array();
for(var y=0;y<n-1;y++){
  var row = splitArray[y].split(",");
    var date = new Date(row[0]);
    var time = date.getTime();
    document.getElementById("outputDiv").innerHTML += y+") "+ time + "<br>";
  var xy = {x:time, y:row[1]};

  data.push(xy);
}

var outerWidth  = 960, outerHeight = 500;    // includes margins
var margin = {top: 100, right: 20, bottom: 80, left: 80};   // clockwise as in CSS
var width = outerWidth - margin.left - margin.right,       // width of plot inside margins
    height = outerHeight - margin.top - margin.bottom;     // height   "     "
document.body.style.margin="0px"; // Eliminate default margin from <body> element
function xValue(d) { return d.x; }       // accessors
function yValue(d) { return d.y; }
var x = d3.scale.linear()                // interpolator for X axis -- inner plot region
    .domain(d3.extent(data,xValue))
    .range([0,width]);
var y = d3.scale.linear()                // interpolator for Y axis -- inner plot region
    .domain(d3.extent(data,yValue))
    .range([height,0]);                  // remember, (0,0) is upper left -- this reverses "y"
var line = d3.svg.line()                 // SVG line generator
    .x(function(d) { return x(d.x); } )
    .y(function(d) { return y(d.y); } );
var xAxis = d3.svg.axis()                // x Axis
    .scale(x)
    .ticks(5)                            // request 5 ticks on the x axis
    .orient("bottom");
var yAxis = d3.svg.axis()                // y Axis
    .scale(y)
    .ticks(4)
    .orient("left");
var svg = d3.select("body").append("svg")
    .attr("width",  outerWidth)
    .attr("height", outerHeight);        // Note: ok to leave this without units, implied "px"
var g = svg.append("g")                  // <g> element is the inner plot area (i.e., inside the margins)
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

g.append("g")                            // render the Y axis in the inner plot area
    .attr("class", "y axis")
    .call(yAxis);
g.append("g")                            // render the X axis in the inner plot area
    .attr("class", "x axis")
    .attr("transform", "translate(0," + height + ")")  // axis runs along lower part of graph
    .call(xAxis);
g.append("text")                         // inner x-axis label
    .attr("class", "x label")
    .attr("text-anchor", "end")
    .attr("x", width - 6)
    .attr("y", height - 6)
    .text("inner x-axis label");
g.append("text")                         // outer x-axis label
    .attr("class", "x label")
    .attr("text-anchor", "end")
    .attr("x", width/2)
    .attr("y", height + 2*margin.bottom/3 + 6)
    .text("outer x-axis label");
g.append("text")                         // plot title
    .attr("class", "x label")
    .attr("text-anchor", "middle")
    .attr("x", width/2)
    .attr("y", -margin.top/2)
    .attr("dy", "+.75em")
    .text("plot title");
g.append("text")                         // inner y-axis label
    .attr("class", "y label")
    .attr("text-anchor", "end")
    .attr("x", -6)
    .attr("y", 6)
    .attr("dy", ".75em")
    .attr("transform", "rotate(-90)")
    .text("inner y-axis label");
g.append("text")                         // outer y-axis label
    .attr("class", "x label")
    .attr("text-anchor", "middle")
    .attr("x", -height/2)
    .attr("y", -6 - margin.left/3)
    .attr("dy", "-.75em")
    .attr("transform", "rotate(-90)")
    .text("outer y-axis label");
g.append("path")                         // plot the data as a line
    .datum(data)
    .attr("class", "line")
    .attr("d", line);
g.append("rect")                         // plot a rectangle that encloses the inner plot area
    .attr("width", width)
    .attr("width", width)
    .attr("height", height);
svg.append("circle")                     // plot a circle in the upper left of the SVG element
    .attr("cx", 0)
    .attr("cy", 0)
    .attr("r", 10);
svg.append("circle")                     // plot a circle in the lower right of the SVG element
    .attr("cx", outerWidth)
    .attr("cy", outerHeight)
    .attr("r", 10);
g.selectAll(".dot")                      // plot a circle at each data location
    .data(data)
  .enter().append("circle")
    .attr("class", "dot")
    .attr("cx", function(d) { return x(d.x); } )
    .attr("cy", function(d) { return y(d.y); } )
    .attr("r", 5);
svg.append("rect")                      // plot a rectangle that encloses the entire SVG element
    .attr("x", 0)
    .attr("y", 0)
    .attr("width", outerWidth)
    .attr("height", outerHeight);
d3.selectAll("path").transition()       // data transition
    .style("stroke", "steelblue");
    //.delay(1000)
    //.duration(2000);

</script>
</body>
</html>
