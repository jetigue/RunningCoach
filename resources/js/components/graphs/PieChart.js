import Chart from 'chart.js';

export default {
	template: `
		<canvas height="200" width="200"></canvas>
	`,

	props: ['labels', 'colors', 'values', 'title'],

	mounted() {

		let data = {
		    labels: this.labels,

			datasets: [{
		        data: this.values,
		        backgroundColor: this.colors,
			}]
		}

		let options = {

			legend: {
				display: true,
				position: 'bottom',
			},
			title: {
				display: true,
				text: this.title,
				fontSize: 16,
				fontColor: '#292B2C',
	    	}
		}

		let pieChart = new Chart(
			this.$el.getContext('2d'),
				{
					type: "pie",
					data: data,
					options: options
				});
	}
};
