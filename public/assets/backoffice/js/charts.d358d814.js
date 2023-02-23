import{A as e,t}from"./theme.7da2ffa8.js";function n(){const o={title:{text:"Line Chart",align:"left",margin:10,style:{fontSize:"20px",fontWeight:"semibold",color:t.colors.gray[600]}},series:[{name:"Earnings",data:[291,249,187,220,98,242,296]},{name:"Spendings",data:[340,120,150,196,25,242,196]}],colors:[t.colors.success[400],t.colors.danger[400]],chart:{type:"line",height:"100%",toolbar:{show:!1},fontFamily:t.fontFamily.sans.join(",")},xaxis:{type:"categories",categories:["Mon","Tue","Wed","Thu","Fri","Sat","Sun"],axisBorder:{show:!1},labels:{datetimeFormatter:{month:"MMM"}}},legend:{position:"top",horizontalAlign:"right",floating:!0,offsetY:-45},grid:{borderColor:t.colors.gray[200],strokeDashArray:3,padding:{left:20}},dataLabels:{enabled:!1},tooltip:{theme:"dark",x:{format:"MMM"},style:{fontSize:"0.875rem",fontFamily:t.fontFamily.sans.join(",")}},stroke:{width:3,curve:"smooth"},responsive:[{breakpoint:1024,options:{legend:{position:"bottom",floating:!1,offsetY:5}}}]};new e(document.getElementById("lineChart"),o).render()}function s(){const o={title:{text:"Area Chart",align:"left",margin:10,style:{fontSize:"20px",fontWeight:"semibold",color:t.colors.gray[600]}},series:[{name:"Earnings",data:[291,249,187,220,98,242,296]},{name:"Spendings",data:[30,120,150,196,25,222,196]}],colors:[t.colors.green[400],t.colors.red[400]],chart:{type:"area",height:"100%",toolbar:{show:!1},fontFamily:t.fontFamily.sans.join(",")},xaxis:{type:"categories",categories:["Mon","Tue","Wed","Thu","Fri","Sat","Sun"],axisBorder:{show:!1},labels:{datetimeFormatter:{month:"MMM"}}},legend:{position:"top",horizontalAlign:"right",floating:!0,offsetY:-45},grid:{borderColor:t.colors.gray[200],strokeDashArray:3,padding:{left:20}},dataLabels:{enabled:!1},tooltip:{theme:"dark",x:{format:"MMM"},style:{fontSize:"0.875rem",fontFamily:t.fontFamily.sans.join(",")}},stroke:{width:3,curve:"smooth"},responsive:[{breakpoint:1024,options:{legend:{position:"bottom",floating:!1,offsetY:5}}}]};new e(document.getElementById("areaChart"),o).render()}function i(){const o={title:{text:"Column Chart",align:"left",margin:10,style:{fontSize:"20px",fontWeight:"semibold",color:t.colors.gray[600]}},series:[{name:"Net Profit",data:[44,55,57,56,61,58,63,60,66]},{name:"Revenue",data:[76,85,101,98,87,105,91,114,94]},{name:"Free Cash Flow",data:[35,41,36,26,45,48,52,53,41]}],colors:[t.colors.yellow[300],t.colors.sky[400],t.colors.green[400]],chart:{type:"bar",height:"100%",toolbar:{show:!1},fontFamily:t.fontFamily.sans.join(",")},xaxis:{type:"categories",categories:["Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct"]},yaxis:{title:{text:"$ (thousands)",style:{color:t.colors.gray[500]}}},legend:{position:"top",horizontalAlign:"right",floating:!0,offsetY:-45},grid:{borderColor:t.colors.gray[200],strokeDashArray:3,padding:{left:20}},dataLabels:{enabled:!1},tooltip:{theme:"dark",y:{formatter:r=>"$ "+r+" thousands"},style:{fontSize:"0.875rem",fontFamily:t.fontFamily.sans.join(",")}},responsive:[{breakpoint:1024,options:{legend:{position:"bottom",floating:!1,offsetY:5}}}]};new e(document.getElementById("columnChart"),o).render()}function l(){const o={title:{text:"Bar Chart",align:"left",margin:10,style:{fontSize:"20px",fontWeight:"semibold",color:t.colors.gray[600]}},series:[{data:[400,430,448,470,540,580,690,1100,1200,1380]}],colors:[t.colors.primary[400]],chart:{type:"bar",height:"100%",toolbar:{show:!1},fontFamily:t.fontFamily.sans.join(",")},plotOptions:{bar:{borderRadius:2,horizontal:!0}},xaxis:{categories:["South Korea","Canada","United Kingdom","Netherlands","Italy","France","Japan","United States","China","Germany"]},grid:{borderColor:t.colors.gray[200],strokeDashArray:3,padding:{left:20}},dataLabels:{enabled:!1},tooltip:{theme:"dark",style:{fontSize:"0.875rem",fontFamily:t.fontFamily.sans.join(",")}}};new e(document.getElementById("barChart"),o).render()}function d(){const o={title:{text:"Radar Chart",margin:10,style:{fontSize:"20px",fontWeight:"semibold",color:t.colors.gray[600]}},series:[{name:"Series 1",data:[80,50,30,40,100,20]},{name:"Series 2",data:[20,30,40,80,20,80]},{name:"Series 3",data:[44,76,78,13,43,10]}],colors:[t.colors.primary[400],t.colors.red[400],t.colors.green[400]],chart:{type:"radar",height:"100%",fontFamily:t.fontFamily.sans.join(",")},xaxis:{categories:["2011","2012","2013","2014","2015","2016"]},grid:{borderColor:t.colors.gray[200]},dataLabels:{enabled:!1},tooltip:{theme:"dark",style:{fontSize:"0.875rem",fontFamily:t.fontFamily.sans.join(",")}}};new e(document.getElementById("radarChart"),o).render()}function h(){const o={title:{text:"Polar Chart",margin:10,style:{fontSize:"20px",fontWeight:"semibold",color:t.colors.gray[600]}},series:[42,47,52,58,65],chart:{type:"polarArea",height:"100%",fontFamily:t.fontFamily.sans.join(",")},labels:["Rose A","Rose B","Rose C","Rose D","Rose E"],fill:{opacity:1},stroke:{width:1,colors:void 0},yaxis:{show:!1},legend:{position:"bottom"},plotOptions:{polarArea:{rings:{strokeWidth:0},spokes:{strokeWidth:0}}},theme:{monochrome:{enabled:!0,color:t.colors.primary[600],shadeTo:"light",shadeIntensity:.6}},tooltip:{theme:"dark",style:{fontSize:"0.875rem",fontFamily:t.fontFamily.sans.join(",")}}};new e(document.getElementById("polarChart"),o).render()}n();s();i();l();d();h();
