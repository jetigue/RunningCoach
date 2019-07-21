import Chart from 'chart.js';

export default {
	template: `
		<canvas height="133" width="200" class="graph"></canvas>
	`,

	props: ['labels', 'values', 'color', 'title'],

		mounted() {

		let data = {
		    labels: this.labels,

			datasets: [{
		        data: this.values,
		        backgroundColor: this.color,
		        borderWidth: 1
			}]
		}

		let options = {

			legend: false,

			title: {
				display: true,
				text: this.title,
				fontSize: 16,
				fontColor: this.color,
	    	},

			scales: {
	    		yAxes: [{
	    			display: true,
	        		ticks: {
	            		beginAtZero:true
	        		}
	    		}],
	    		xAxes: [{
	    			display: true,
	    			gridLines: {
	    				display:false
	    			}
	    		}]
			}
		}

		let barChart = new Chart(
			this.$el.getContext('2d'),
				{
					type: "bar",
					data: data,
					options: options
				});
	}
};
