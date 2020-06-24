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
					{{friendname}}
				</view>
			</view>
		</view>
		<view class="main">
			<!-- <messageshow ></messageshow> -->
			<!-- <image :src="friendimg" mode=""></image> -->
			<view class="box">
				<image :src="friendimg" class="touxiang"></image>
				<view class="box-content">你好啊</view>
			</view>
			<view class="box1">
				<image :src="meimg" class="touxiang"></image>
				<view class="box-content">你好啊你好啊你好啊你好啊你好啊你好啊你好啊你好啊你好啊你好啊你好啊你好啊你好啊你好啊你好啊你好啊你好啊你好啊你好啊你好啊你好啊</view>
			</view>
		</view>
		<view class="foot">
			<view class="footleft">
				<image class="footleftimg" src="../../static/uniappimg/voice-right-3.png" mode=""></image>
			</view>
			<view class="footcenter" >
				<textarea class="sendout" :style.width="textareaWidth"   auto-height disable-default-padding></textarea>
			</view>
			<view class="footright">
				 <view class="submit">
				 		发送
				 </view>
			</view>
		</view>
	</view>
</template>

<script>
	// import chattextarea from "../../components/chattextarea.vue";
	// import messageshow from "../../components/messageshow.vue";
	export default {
		data() {
			return {
				friendname:'',
				friendimg:'',
				meimg:'',
				usershow:[],
				textareaWidth:0,
				// windowHeight:0,
				socketTask: null,
				// 确保websocket是打开状态
				is_open_socket: false,
			}
		},
		onLoad(option) {
			uni.getSystemInfo({
				success:function(res){
					this.textareaWidth  = res.windowWidth - 80 ;
					// this.textareaWidth = "height:" + this.textareaWidth;
					console.log(this.textareaWidth);
				}
			})
			var serverUrl = this.serverUrl;
			var token = this.getGlobalToken;
            // 进入这个页面的时候创建websocket连接【整个页面随时使用】
             this.connectSocketInit();
			//获取上一个页面传入的参数
			var userId = option.userId;
			console.log(userId);
			if (token != null && token != "" && token != undefined) {
				    uni.request({
				    	url:serverUrl+'/api/friend/showfriend',
				    	method:"POST",
				    	header:{
				    		'authorization':token
				    	},
						data:{
							id:userId
						},
				    	success:(res) => {
				    		if(res.data.code == 200){
								this.friendname = res.data.data[0].name;
								this.friendimg  = serverUrl+res.data.data[0].imgurl;
				    		}
				    	}
				    });
					uni.request({
						url:serverUrl+'/api/user/me',
						method:"POST",
						header:{
							'authorization':token
						},
						success:(res) => {
							if(res.data.code == 200){
								// this.friendname = res.data.data[0].name;
								this.meimg  = serverUrl+res.data.data[0].imgurl;
							}
						}
					});
			} else {
					uni.navigateTo({
					    url: '../signin/signin',
					});
			}	
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
		},
		// components:{//注册helloComp2
		// 	chattextarea,
		// 	messageshow
		// }
	}
</script>

<style lang="scss">
	@import url("../../commons/css/publicchat.css");
	@import url("../../commons/css/publicbottom.css");
	@import url("chatone.css");
</style>
