import moment from 'moment'
import Vue from 'vue'

Vue.filter('timeformat', function (value) {
	return moment(value).format('MMMM Do YYYY, h:mm:ss a'); // March 7th 2019, 11:51:08 pm
})

Vue.filter('shortlength', function (text,length,suffix) {
	return text.substring(0,length)+suffix; // March 7th 2019, 11:51:08 pm
})