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
			<view class="box friend"  @tap="tochatone" v-for="friend in friendlist" :data-userId="friend.id">
				<view class="left">
					<image class="headportrait" :src="friend.imgurl" mode=""></image>
				</view>
				<view class="right">
					<view class="right-content">
						{{friend.name}}
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
				friendlist:[],
			};
		},
		onLoad() {
			// var Url = "http://139.159.202.203/index.php/api/user/showlist";
			// 获取common.js中的服务器地址
			// var serverUrl = common.serverUrl;
			// 通过挂载到main.js中获取服务器的地址，作为全局变量
			var serverUrl = this.serverUrl;
			var token = this.getGlobalToken;
			if (token != null && token != "" && token != undefined) {
				    uni.request({
				    	url:serverUrl+'/api/friend/showlist',
				    	method:"POST",
				    	header:{
				    		'authorization':token
				    	},
				    	success:(res) => {
				    		if(res.data.code == 200){
				    			var friendlist = res.data.data;
				    		    this.friendlist = friendlist;
				    			for(let i=0;i<this.friendlist.length;i++){
				    				this.friendlist[i].imgurl =serverUrl+this.friendlist[i].imgurl;
				    			}
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
