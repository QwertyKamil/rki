<template>
    <div class="question-container">
        <div v-html="question.text"></div>
        <div class="mt">
            Odpowiedź:
        </div>
        <ul v-if="question.type == 1" class="answers">
            <li v-for="answer in answers">
                <label>
                    <input type="radio" name="answer" :value="answer.id" v-model="answerid">
                    <span>{{answer.answer}}</span>
                </label>
            </li>
        </ul>
        <div v-else-if="question.type == 2" class="answers">
            <textarea name="answer" cols="100" rows="10" v-model="answer_text"></textarea>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import _ from 'lodash';

    export default {
        name: "questionComponent",
        props: {
            question: Object,
            userid: 0,
            token: "",
        },
        data() {
            return {
                answers: [],
                answerid: 0,
                answer_text: '',
            };
        },
        watch: {
            question: function () {
                this.answerid = 0;
                this.answers = this.question.answers;
                this.getUserAnswer();
            },
            answerid: function () {
                if (this.answerid) {
                    this.createAnswer();
                }
            },
            answer_text: _.debounce(function () {
                this.createAnswer()
            }, 500)
        },
        methods: {
            getUserAnswer: function () {
                axios.post(`${window.location.origin}/api/contest/questions/${this.token}/getAnswer`, {
                    user_id: this.userid,
                    question_id: this.question.id,
                }).then((request) => {
                    console.log(request.data);
                    if (this.question.type == 1) {
                        this.answerid = request.data.answer ? request.data.answer.answer_id : 0;
                    }
                    else {
                        this.answer_text = request.data.answer ? request.data.answer.answer : 0;
                    }
                });
            },
            createAnswer: function () {
                if (this.answerid) {
                    axios.post(`${window.location.origin}/api/contest/questions/${this.token}/createAnswer`, {
                        question_id: this.question.id,
                        answer_id: this.answerid,
                        user_id: this.userid,
                    }).then((request) => {
                        console.log(request.data);
                    });
                } else {
                    console.log('createAnswer');
                    axios.post(`${window.location.origin}/api/contest/questions/${this.token}/createAnswer`, {
                        question_id: this.question.id,
                        text: this.answer_text,
                        user_id: this.userid,
                    }).then((request) => {
                        console.log(request.data);
                    });
                }
            },
        },
        computed: {}
    }
</script>

<style scoped lang="scss">
    .question-container {
        display: flex;
        flex-direction: column;
        width: 100%;
        height: auto;
        margin: 5px 20px;
        ul{
            list-style: none;
        }
        .answers{
            margin-top: 20px;
            font-size: 16px;
            textarea{
                resize:none;
                font-size: 16px;
            }
        }
    }
    .mt{
        margin-top: 20px;
    }
</style>
