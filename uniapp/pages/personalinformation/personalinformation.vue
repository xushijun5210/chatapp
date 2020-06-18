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
					个人信息
				</view>
			</view>
		</view>
		<view class="main">
			<view class="box" @tap="tochangeheadsculpture">
				<view class="box-left">
					<view class="texthead">
						头像
					</view>
				</view>
				<view class="box-right">
					<image class="headsculpture" src="../../static/img/8b594d656f9839b6c9fd3012423378e3.jpg" mode=""></image>
				</view>
			</view>
			<view class="box-name" @tap="tochangenickname">
				<view class="box-name-left">
					<view class="text">
						昵称
					</view>
				</view>
				<view class="box-name-right">
					<view class="text-Nickname">
						愿得一人心白首不相离
					</view>
				</view>
			</view>
			<view class="box-name" @tap="tochangephone">
				<view class="box-name-left">
					<view class="text">
						手机号
					</view>
				</view>
				<view class="box-name-right">
					<view class="text">
						13884844235
					</view>
				</view>
			</view>
			<view class="box-name" @tap="tochangeemail">
				<view class="box-name-left">
					<view class="text">
						邮箱
					</view>
				</view>
				<view class="box-name-right">
					<view class="text">
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
		methods: {
			//跳转到修改头像页面
			tochangeheadsculpture:function(){
				uni.navigateTo({
				    url: '../headsculpture/headsculpture',
				});
			},
			//跳转到修改昵称页面
			tochangenickname:function(){
				uni.navigateTo({
				    url: '../changenickname/changenickname',
				});
			},
			//跳转到修改手机号页面
			tochangephone:function(){
				uni.navigateTo({
				    url: '../changephone/changephone',
				});
			},
			//跳转到修改手机号页面
			tochangeemail:function(){
				uni.navigateTo({
				    url: '../changeemail/changeemail',
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

<style lang="scss">
    @import url("../../commons/css/publictop.css");
	@import url("../../commons/css/publicchat.css");
	@import url("personalinformation.css");
</style>
