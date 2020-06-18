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
					<image class="headsculpture" src="../../static/img/57c7ad7ba739a_1024.jpg" mode=""></image>
				</view>
				<view class="box-right">
					<view class="nickname">
						你哈哈哈
					</view>
					<view class="phone">
						2273525664@qq.com
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
				
			};
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
