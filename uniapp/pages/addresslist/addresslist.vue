<template>
	<view>
		<view class="top-bar">
			<view class="top-bar-left">
				通讯录
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
</style>
