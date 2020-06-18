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
					更改头像
				</view>
			</view>
		</view>
		<view class="main">
			<button type="primary"  @click="upload">选择照片</button>
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
			upload : function(){
				uni.chooseImage({
				    success: (chooseImageRes) => {
				        const tempFilePaths = chooseImageRes.tempFilePaths;
				        uni.uploadFile({
				            url: 'http://tp5.1.com/api/user/upload', //仅为示例，非真实的接口地址
							method:'POST',
				            filePath: tempFilePaths[0],
				            name: 'image',
				            formData: {
				                'user': 'test'
				            },
				            success: (uploadFileRes) => {
				                console.log(uploadFileRes.data);
				            }
				        });
				    }
				});
			} ,
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
      @import url("headsculpture.css");
</style>
