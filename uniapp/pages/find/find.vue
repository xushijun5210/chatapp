<template>
	<view class="content">
		<!-- #ifdef MP-WEIXIN --><!-- 微信小程序出现 -->
		          <view class="status_bar">	</view>
		<!-- #endif -->
		<view class="top-bar">
			<view class="top-bar-left">
				发现
			</view>
			<view class="top-bar-right">
				<view class="search" >
					<image class="top-bar-img top-bar-img-left" src="../../static/uniappimg/search.png" mode=""></image>
				</view>
				<view class="add" @tap="toSearch">
					<image class="top-bar-img top-bar-img-right" src="../../static/uniappimg/tianjia.jpg" mode=""></image>
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
		}
	}
</script>

<style lang="less">
    @import url("../../commons/css/publictop.css");
	@import url("find.css");
</style>
