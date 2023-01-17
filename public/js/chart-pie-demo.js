// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.querySelector('#myPieChart');

var contentieux = parseInt(document.querySelector('#contentieux').innerHTML)
var courtiers = parseInt(document.querySelector('#courtiers').innerHTML)
var experts = parseInt(document.querySelector('#experts').innerHTML)
var redacteurs = parseInt(document.querySelector('#redacteurs').innerHTML)
var teleoperateurs = parseInt(document.querySelector('#teleoperateurs').innerHTML)

var myPieChart = new Chart(ctx, {
	type: 'doughnut',
	data: {
		labels: ['Contentieux', 'Courtiers', 'Experts', 'Redacteurs', 'Service clientèle'],
		datasets: [{
			// data: [contentieux, courtiers, experts, redacteurs, teleoperateurs],
			data: [20, 10, 10, 20, 40],
			backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#4e73df', '#1cc88a'],
			hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#2e59d9', '#17a673'],
			hoverBorderColor: 'rgba(234, 236, 244, 1)',
		}],
	},
	options: {
		maintainAspectRatio: false,
		tooltips: {
			backgroundColor: 'rgb(255,255,255)',
			bodyFontColor: '#858796',
			borderColor: '#dddfeb',
			borderWidth: 1,
			xPadding: 15,
			yPadding: 15,
			displayColors: false,
			caretPadding: 10,
		},
		legend: {
			display: false
		},
		cutoutPercentage: 80,
	},
});
