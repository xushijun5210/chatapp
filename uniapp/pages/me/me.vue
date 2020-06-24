<template>
	<view class="content">
		<!-- #ifdef MP-WEIXIN --><!-- 微信小程序出现 -->
		          <view class="status_bar">	</view>
		<!-- #endif -->
		<view class="top-bar">
			<view class="top-bar-left">
			我的
			</view>
		</view>
		<view class="main">
			<view class="box" @tap="topersonalinformation">
				<view class="box-left">
					<image class="headsculpture" :src="imgurl" mode=""></image>
				</view>
				<view class="box-right">
					<view class="nickname">
						{{name}}
					</view>
					<view class="phone">
						{{email}}
					</view>
				</view>
			</view>
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				imgurl:'',
				name:'',
				email:'',
			};
		},
		onLoad() {
			var token = this.getGlobalToken;
			var serverUrl = this.serverUrl;
			if (token != null && token != "" && token != undefined) {
				    uni.request({
				    	url:serverUrl+'/api/user/me',
				    	method:"POST",
				    	header:{
				    		'authorization':token
				    	},
				    	success:(res) => {
				    		console.log(res.data);
				    		if(res.data.code == 200){
								this.name = res.data.data[0]['name'];
								this.email = res.data.data[0]['email'];
								this.imgurl = serverUrl + res.data.data[0]['imgurl'];
				    		    // console.log(this.imgurl);
				    			// for(let i=0;i<this.friendlist.length;i++){
				    			// 	this.friendlist[i].imgurl =serverUrl+this.friendlist[i].imgurl;
				    			// }
				    		}
				    	}
				    });
			} else {
					uni.navigateTo({
					    url: '../signin/signin',
					});
			}
		},
		methods:{
			//跳转到个人信息页面
			topersonalinformation:function(){
				uni.navigateTo({
				    url: '../personalinformation/personalinformation',
				});
			},
		}
	}
</script>

<style lang="less">
    @import url("../../commons/css/publictop.css");
	@import url("me.css");
</style>
