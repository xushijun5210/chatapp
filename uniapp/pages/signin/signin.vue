<template>
	<view class="content">
		<view class="top-bar">
			<view class="top-bar-right" @tap="toRegister">
				<view class="text">
					注册
				</view>
			</view>
		</view>
		<view class="logo">
			<image src="../../static/img/57c7ad7ba739a_1024.jpg" mode=""></image>
		</view>
		<view class="main">
			<view class="title">
				登录
			</view>
			<view class="slogan">
				你好，还原来到ccc
			</view>
			<view class="inputs">
				<input type="text" @blur="getUserName" placeholder="邮箱" placeholder-style="color:#aaa;font-weight:200;" class="user" value="" />
				<input type="password" @blur="getUserPassword" placeholder="密码" placeholder-style="color:#aaa;font-weight:200;" class="pwd" value="" />
			</view>
			<view class="tips">
				<view class="" v-if="isright">
					{{msg}}
				</view>
			</view>
		</view>
		<view class="submit" @tap="login">
				登录
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				email:'',
				password:'',
				isright:false,
				msg:'',
			}
		},
		methods: {
			// 获取用户名/邮箱
			getUserName:function(e){
				// console.log(e);
				this.email = e.detail.value;
				// console.log(this.user);
			},
			// 获取密码
			getUserPassword:function(e){
				// console.log(e);
				this.password = e.detail.value;
				// console.log(this.password);
			},
			// 登录提交
			login:function(){
				var serverUrl = this.serverUrl;
				uni.request({
					url:serverUrl+'/api/login/login',
					data:{
						email:this.email,
						password:this.password
					},
					method:'POST',
					success: (data) => {
						// console.log(data);
						if(data.data.status==1001){
							// console.log(data.data.token);
							var data = data.data.token;
							uni.setStorage({
								key:'token',
								data:data,
								success() {
								  uni.switchTab({//跳转到tabbar页面
								  		url: '../index/index'
								  	});
								}
							});
						}else{
							this.isright = true;
							this.msg =data.data.msg;
						}
					}
				})
				// if(this.user && this.password){
				// 	console.log("提交成功");
				// }
			},
			//换成token
			
			//跳转到注册页面
			toRegister:function(){
				uni.navigateTo({
				    url: '../register/register',
				});
			}
		}
	}
</script>

<style lang="scss">
	@import url("signin.css");
</style>
