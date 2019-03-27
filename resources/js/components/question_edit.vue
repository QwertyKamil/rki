<template>
    <div>
        <div class="field">
            <select name="type" v-model="type" required>
                <option value="">Wybierz typ pytania</option>
                <option value="1">Pytanie zamknięte</option>
                <option value="2">Pytanie otwarte</option>
            </select>
        </div>
        <div v-if="type == 1">
            <div class="field answer" v-for="(answer , i) in answersT">
                <input type="radio" name="correct" :value="i" required>
                <input type="text" name="answers[]" :value="answer.answer">
            </div>
            <div class="field answer" v-for="i in answers">
                <input type="radio" name="correct" :value="i" required>
                <input type="text" name="answers[]">
            </div>
            <a href="#" @click="addAnswer()">Dodaj odpowiedź</a>
        </div>
        <div v-else-if="type == 2">
            <div class="field answer" v-for="answer in answersT">
                <input type="text" name="answers[]" :value="answer.answer">
            </div>
            <div class="field" v-for="i in patterns_count">
                <input type="text" name="patterns[]">
            </div>
            <a href="#" @click="addPattern()">Dodaj patern</a>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        name: "question_add",
        data() {
            return {
                type: '',
                answers: 1,
                patterns_count: 1,
                answersT:[],
            }
        },
        props: {
            questionid:Number,
            _type:Number,
        },
        watch: {
            type: function () {
                this.answers = 1;
                this.patterns_count = 1;
                this.answersT = [];
            }
        },
        created(){
            this.type = this._type;
            this.getAnswers();
        },
        methods: {
            addPattern: function () {
                this.patterns_count++;
            },
            addAnswer: function () {
                this.answers++;
            },
            getAnswers:function(){
                axios.get(`${window.location.origin}/api/question/${this.questionid}/answers`)
                    .then( (response)=>{
                        this.answersT = response.data.answers;
                    });
            }
        }

    }
</script>

<style scoped>
    .answer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
    }
</style>
