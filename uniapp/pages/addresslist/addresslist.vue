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
		<view class="main">
			<view class="box newfriends">
				<view class="left">
					<image class="headportrait" src="../../static/img/03d3f3e4f8c6f9ea2a0c503346735882.jpg" mode=""></image>
				</view>
				<view class="right">
					<view class="right-content">
						新朋友
					</view>
				</view>
			</view>
			<view class="box groups">
				<view class="left">
					<image class="headportrait" src="../../static/img/57c7ad7ba739a_1024.jpg" mode=""></image>
				</view>
				<view class="right">
					<view class="right-content">
						群聊
					</view>
				</view>
			</view>
			<view class="box friend"  @tap="tochatone" v-for="user in userlist" :data-userId="user.id">
				<view class="left">
					<image class="headportrait" :src="user.imgurl" mode=""></image>
				</view>
				<view class="right">
					<view class="right-content">
						{{user.name}}
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
				userlist:[]
			};
		},
		onLoad() {
			// var Url = "http://139.159.202.203/index.php/api/user/showlist";
			var serverUrl = "http://tp5.1.com";
			uni.request({
				url:serverUrl+'/api/user/showlist',
				method:"POST",
				success:(res) => {
					// console.log(res.data);
					if(res.data.code == 200){
						// console.log(res.data);
						var userlist = res.data.data;
					    this.userlist = userlist;
					    // console.log(this.userlist);
						for(let i=0;i<this.userlist.length;i++){
							this.userlist[i].imgurl =serverUrl+this.userlist[i].imgurl;
						}
						 // for(let i=0;i<this.friends.length;i++){
						 // 	this.friends[i].imgurl='../../static/img/'+this.friends[i].imgurl;
						 // }
					}
				}
			});
		},
		methods:{
			//跳转到聊天页面
			tochatone:function(e){
				var userId = e.currentTarget.dataset.userid;
				// console.log(userId);
				uni.navigateTo({
				    url: '../chatone/chatone?userId='+userId,
				});
			}
		}
	}
</script>

<style lang="less">
   @import url("../../commons/css/publictop.css");
   @import url("addresslist.css");
</style>
