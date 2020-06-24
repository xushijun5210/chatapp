import Vue from 'vue'
import App from './App'

Vue.config.productionTip = false
//Vue.prototype.serverUrl = "http://139.159.202.203";
Vue.prototype.serverUrl = "http://tp5.1.com";
// Vue.prototype.getGlobalToken = function(key) {
// 	 uni.getStorage({
// 		key:'token',
// 		success:function(res){
// 			// return res.data;
// 			Vue.prototype.getGlobalToken1 = res.data;
// 			// console.log(res.data);
// 			// if (res.data != null && res.data != "" && res.data != undefined) {
// 			// 	return res.data;
// 			// } else {
// 			// 	return null;
// 			// }
// 		}
// 	});
// }
uni.getStorage({
	key:'token',
	success:function(res){
	    if (res.data != null && res.data != "" && res.data != undefined) {
				Vue.prototype.getGlobalToken = res.data;
	    } else {
				return null;
	    }
	},
});
App.mpType = 'app'

const app = new Vue({
    ...App
})
app.$mount()
