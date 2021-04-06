var options = {
	chart: {
		height: 300,
		type: 'bar',
	},
	plotOptions: {
		bar: {
			horizontal: true,
			dataLabels: {
				position: 'top',
			},
		}  
	},
	dataLabels: {
		enabled: true,
		offsetX: -6,
		style: {
			fontSize: '12px',
			colors: ['#fff']
		}
	},
	stroke: {
		show: true,
		width: 1,
		colors: ['#fff']
	},
	series: [{
		data: [44, 55, 41, 64, 22]
	},{
		data: [53, 32, 33, 44, 32]
	}],
	xaxis: {
		categories: [2010, 2012, 2014, 2016, 2018],
	},
	colors: ['#05668D', '#028090', '#00A896', '#02C39A', '#F0F3BD'],
}
var chart = new ApexCharts(
	document.querySelector("#basic-bar-graph-grouped"),
	options
);
chart.render();