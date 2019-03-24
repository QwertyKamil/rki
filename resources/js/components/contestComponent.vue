<template>
    <div class="main-container">
        <register v-on:registered="registered" v-bind:userid="userId" v-bind:contest="contest"></register>
        <div class="questions" :class="isShow">
            <nav>
                <ul>
                    <li>
                        <a href="#" @click="prevQuestion()">Poprzednie</a>
                    </li>
                    <li v-for="i in maxQuestions">
                        <a href="#" @click="setQuestion(i)" :class="isCurrent(i)">{{i}}</a>
                    </li>
                    <li>
                        <a href="#" @click="nextQuestion()">Następne</a>
                    </li>
                    <li>
                        {{getTime}}
                    </li>
                </ul>
            </nav>
            <question v-bind:question="currentQuestion"
                      v-bind:userid="userId"
                      v-bind:token="token">
            </question>
        </div>
    </div>
</template>

<script>
    import register from './registerComponent';
    import question from './questionComponent';
    import axios from 'axios';

    export default {
        name: "contestComponent",
        data() {
            return {
                userId: 0,
                questions: [],
                currentQuestionNr: 0,
                maxQuestions: 0,
                time: 0,
            }
        },
        watch:{
            time:function(){
                if(this.time < 0){
                    this.endTest();
                }
            }
        },
        created() {
            setInterval(() => {
                this.changeTime();
            }, 1000);
            if (window.localStorage.getItem('userId')) {
                this.userId = parseInt(window.localStorage.getItem('userId'));
            }
            if (window.localStorage.getItem('time')) {
                this.time = parseInt(window.localStorage.getItem('time'));
            }
            else{
                this.time = 60*60;
            }
            this.getQuestions();
        },
        components: {
            register, question,
        },
        computed: {
            currentQuestion: function () {
                return this.currentQuestionNr ? this.questions[this.currentQuestionNr - 1] : {};
            },
            isShow: function () {
                return this.userId ? 'show' : '';
            },
            getTime: function(){
                window.localStorage.setItem('time', this.time);
                let hour = parseInt(this.time/3600);
                let minutes = parseInt(this.time/60);
                let seconds = parseInt(this.time%60);
                return `${hour}:${minutes}:${seconds}`
            },
        },
        props: {
            contest: Number,
            token: String,
        },
        methods: {
            registered: function (userId) {
                this.userId = userId;
                window.localStorage.setItem('userId', userId);
            },
            getQuestions: function () {
                axios.post(`${window.location.origin}/api/contest/questions/${this.token}`)
                    .then((request) => {
                        console.log(request);
                        this.questions = request.data.questions;
                        this.currentQuestionNr = 1;
                        this.maxQuestions = this.questions.length;
                    });
            },
            nextQuestion: function () {
                if (this.currentQuestionNr < this.maxQuestions) {
                    this.currentQuestionNr++;
                }
            },
            prevQuestion: function () {
                if (this.currentQuestionNr > 1) {
                    this.currentQuestionNr--;
                }
            },
            setQuestion: function (nr) {
                this.currentQuestionNr = nr;
            },
            isCurrent: function (nr) {
                return nr == this.currentQuestionNr ? 'current' : '';
            },
            changeTime: function () {
                this.time--;
            },
            endTest: function(){
                window.localStorage.removeItem('time');
                window.localStorage.removeItem('userId');
                window.location.reload();
            },
        }
    }
</script>

<style scoped lang="scss">
    .main-container {
        height: 100vh;
        width: 100vw;
        overflow: hidden;
        .questions {
            width: 100%;
            height: 100%;
            transition: transform 1s;
            &.show {
                transform: translateY(-100%);
            }
            nav {
                height: 50px;
                background-color: #2a4d95;
                color: #ffffff;
                ul {
                    height: 100%;
                    display: flex;
                    align-items: center;
                    justify-content: space-around;
                    list-style: none;
                    li {
                        a {
                            color: #ffffff;
                            text-decoration: none;
                            padding: 2px 5px;
                        }
                        .current {
                            border: 1px solid #ffffff;
                        }
                    }
                }
            }
        }
    }
</style>
