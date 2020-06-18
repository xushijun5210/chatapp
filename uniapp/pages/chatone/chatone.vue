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
					浪迹天涯
				</view>
			</view>
		</view>
		<view class="main">
			<view class="box">
				<image src="../../static/img/4bd60e8544a0b91d6773fdb1fb0d283b.jpg" class="touxiang"></image>
				<view class="box-content">你好啊</view>
			</view>
			<view class="box1">
				<image src="../../static/img/57c7ad7ba739a_1024.jpg" class="touxiang"></image>
				<view class="box-content">你好啊你好啊你好啊你好啊你好啊你好啊你好啊你好啊你好啊你好啊你好啊你好啊你好啊你好啊你好啊你好啊你好啊你好啊你好啊你好啊你好啊</view>
			</view>
		</view>
		<view class="box_bottom">
			<!-- <view class="box_bottom_left">
				<image class="box_voice" src="../../static/uniappimg/voice.jpg" ></image>
			</view> -->
			<view class="box_bottom_center">
				<!-- <input class="sendout" type="text"  value="" /> -->
				<textarea class="sendout" auto-height disable-default-padding></textarea>
			</view>
			<view class="box_bottom_right">
				 <view class="submit">
				 		发送
				 </view>
			</view>
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				socketTask: null,
				// 确保websocket是打开状态
				is_open_socket: false,
				usershow:[]
			}
		},
		onLoad(option) {
            // 进入这个页面的时候创建websocket连接【整个页面随时使用】
            // this.connectSocketInit();
			var serverUrl = "http://tp5.1.com";
			//获取上一个页面传入的参数
			var userId = option.userId;
			console.log(userId);
			// uni.request({
			// 	url:serverUrl+'/api/user/showlist',
			// 	method:"POST",
			// 	success:(res) => {
			// 		// console.log(res.data);
			// 		if(res.data.code == 200){
			// 			// console.log(res.data);
			// 			var userlist = res.data.data;
			// 		    this.userlist = userlist;
			// 		    // console.log(this.userlist);
			// 			for(let i=0;i<this.userlist.length;i++){
			// 				this.userlist[i].imgurl =serverUrl+this.userlist[i].imgurl;
			// 			}
			// 			 // for(let i=0;i<this.friends.length;i++){
			// 			 // 	this.friends[i].imgurl='../../static/img/'+this.friends[i].imgurl;
			// 			 // }
			// 		}
			// 	}
			// });
		},
		methods: {
	        // 进入这个页面的时候创建websocket连接【整个页面随时使用】
			connectSocketInit() {
				// 创建一个this.socketTask对象【发送、接收、关闭socket都由这个对象操作】
				this.socketTask = uni.connectSocket({
					// 【非常重要】必须确保你的服务器是成功的,如果是手机测试千万别使用ws://127.0.0.1:9099【特别容易犯的错误】
					url: "ws://127.0.0.1:8282",
					success(data) {
						console.log("websocket连接成功");
					},
				});
 
				// 消息的发送和接收必须在正常连接打开中,才能发送或接收【否则会失败】
				this.socketTask.onOpen((res) => {
					//console.log("WebSocket连接正常打开中...！");
					this.is_open_socket = true;
					// 注：只有连接正常打开中 ，才能正常成功发送消息
					this.socketTask.send({
						data: "uni-app发送一条消息",
						async success() {
							console.log("消息发送成功");
						},
					});
					// 注：只有连接正常打开中 ，才能正常收到消息
					this.socketTask.onMessage((res) => {
						console.log("收到服务器内容：" + res.data);
					});
				})
				// 这里仅是事件监听【如果socket关闭了会执行】
				this.socketTask.onClose(() => {
					console.log("已经被关闭了")
				})
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
	@import url("../../commons/css/publicchat.css");
	@import url("../../commons/css/publicbottom.css");
	@import url("chatone.css");
</style>
