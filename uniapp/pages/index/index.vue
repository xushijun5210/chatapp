<template>
	<view class="content">
		<!-- 头部 start-->
		<!-- #ifdef MP-WEIXIN --><!-- 微信小程序出现 -->
		          <view class="status_bar">	</view>
		<!-- #endif -->
		<view class="top-bar">
			<view class="top-bar-left">
				首页
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
		<!-- 头部 end-->
		<view class="main">
			<view class="friends">
				<view class="friend-list" v-for="(item,index) in friends" :key="item.id" @tap="tochatone">
					<view class="friend-list-l">
						<image :src="item.imgurl" class="friend-list-l-img" mode=""></image>
						<text class="tip" v-if="item.tip>99">99+</text>
						<text class="tip" v-else-if="item.tip>0">{{item.tip}}</text>
					</view>
					<view class="friend-list-r">
						<view class="friend-list-r-top">
							<view class="name">
								{{item.name}}
							</view>
							<view class="time">
								{{changeTime(item.time)}}
							</view>
						</view>
						<view class="news">
							{{item.news}}
						</view>
					</view>
				</view>
			</view>
		</view>
	</view>
</template>

<script>
	import datas from '../../commons/js/datas.js';
	import myfunction from '../../commons/js/myfunction.js';
	export default {
		data() {
			return {
				friends:[],
			}
		},
		onLoad() {
			this.getFriends();
			this.changeTime();
		},
		methods: {
			getFriends:function(){
				this.friends = datas.friends();
				for(let i=0;i<this.friends.length;i++){
					this.friends[i].imgurl='../../static/img/'+this.friends[i].imgurl;
				}
				// console.log(this.friends);
			},
			changeTime:function(date){
				return myfunction.dateTime(date);
			},
			//跳转到注册页面
			tochatone:function(){
				uni.navigateTo({
				    url: '../chatone/chatone',
				});
			},

		}
	}
</script>

<style lang="scss">
	@import url("../../commons/css/publictop.css");
	@import url("index.css");
</style>
