<template>
	<view class="content">
		<!-- #ifdef MP-WEIXIN --><!-- 微信小程序出现 -->
		          <view class="status_bar">	</view>
		<!-- #endif -->
		<view class="top-bar">
		    <view class="box_top_left" @tap="backOne">
		    	<image class="box_back" src="../../static/uniappimg/fanhui.png" ></image>
		    </view>
			<view class="box_top_right">
				<view class="text">
					更改邮箱
				</view>
			</view>
		</view>
		<view class="main">
			<form @submit="formSubmit">
				<input class="formSubmittext" type="text" name="email" value="" maxlength="20"/>
				<button form-type="submit">保存</button>
			</form>
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				
			};
		},
		methods:{
			formSubmit: function(e) {
				// var serverUrl = this.serverUrl;
		        var email = e.detail.value.email;
				var id = 16;
				var serverUrl = "http://tp5.1.com/api/user/updateemail";
				uni.request({
					url:serverUrl,
					method:"POST",
					data:{
						email:email,
						id:id
					},
					success:(res) => {
						console.log(res.data);
						if(res.data.code == 200){
							console.log("成功");
						}
					}
				});
			},
			// 使用uni.navigateBack可以返回到原页面 （返回登录页面)
			backOne:function(){
				uni.navigateBack({
					delta:1
				});
			}
		}
	}
</script>

<style lang="less">
      @import url("../../commons/css/publictop.css");
      @import url("../../commons/css/publicchat.css");
      @import url("changeemail.css");
</style>
