<template>
    <div class="login-container" :class="isHidden">
        <form v-on:submit="SendRegisterForm($event)">
            <input type="text" v-model="login" placeholder="Login" required>
            <button type="submit">Zacznij</button>
        </form>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "registerComponent",
        data() {
            return {
                login: '',
            }
        },
        props: {
            userid: Number,
            contest: Number,
        },
        computed:{
          isHidden: function () {
              return this.userid?'hide':'';
          }
        },
        methods: {
            SendRegisterForm: function (e) {
                e.preventDefault();
                axios.post(`${window.location.origin}/api/register`, {
                    'name': this.login,
                    'contest': this.contest,
                }).then((request) => {
                    this.$emit('registered',request.data.id);
                    //console.log(request.data.id);
                });
            },
        }
    }
</script>

<style scoped lang="scss">
    .login-container{
        height: 100vh;
        width: 100vw;
        font-size: 16px;
        display: flex;
        flex-direction: column;
        transition: transform 1s;
        form{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            width: 100%;
            flex-direction: column;
            input{
                font-size: 25px;
                outline: none;
                padding: 5px 10px;
            }
            button{
                -webkit-border-radius: 0;
                -moz-border-radius: 0;
                border-radius: 0;
                border: 1px solid #0000ff;
                font-size: 20px;
                padding: 5px 10px;
                margin-top: 10px;
                outline: none;
                transition: transform 1s;
                cursor: pointer;
                &:hover{
                    transform: scale(1.1);
                }
            }
        }
        &.hide{
            transform: translateY(-100%) scale(0);
        }
    }
</style>
