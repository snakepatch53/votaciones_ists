//function graficar(){
//  let area = new Morris.Area({
//    element   : 'revenue-chart',
//    resize    : true,
//    data      : [
//      { y: '2011 Q1', item1: 9666 },
//      { y: '2011 Q2', item1: 2778 },
//      { y: '2011 Q3', item1: 4912 },
//      { y: '2011 Q4', item1: 3767 },
//      { y: '2012 Q1', item1: 6810 },
//      { y: '2012 Q2', item1: 5670 },
//      { y: '2012 Q3', item1: 4820 },
//      { y: '2012 Q4', item1: 15073 },
//      { y: '2013 Q1', item1: 10687 },
//      { y: '2013 Q2', item1: 8432 }
//    ],
//    xkey      : 'y',
//    ykeys     : ['item1',],
//    labels    : ['Votos'],
//    lineColors: ['#a0d0e0', '#3c8dbc'],
//    hideHover : 'auto'
//  });
//}
//graficar();

function graficar(){
  
  
  let data      = [];
  for(let i=0; i<10; i++){
    data[i] = { y: '2019 Q'+i, item1: 8432 };
  }
  
  let area = new Morris.Area({
    element   : 'revenue-chart',
    resize    : true,
    data,
    xkey      : 'y',
    ykeys     : ['item1'],
    labels    : ['Votos'],
    lineColors: ['#a0d0e0', '#3c8dbc'],
    hideHover : 'auto'
  });
}
graficar();