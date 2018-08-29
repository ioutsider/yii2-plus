<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <title>Vue.js</title>
        <meta charset="utf-8">
        <meta name="description" content="Vue.js - The Progressive JavaScript Framework">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <!-- 开发环境版本，包含了有帮助的命令行警告 -->
        
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    </head>
    <body>
        <div id="app">
            <span v-once>这个将不会改变: {{ message }}</span>
            <h1 v-show="ok">Hello!</h1>
            <ol  class="static" v-bind:class="{ active: isActive, 'text-danger': hasError }">
                <li v-for="todo in todos">
                    {{ todo.text }}
                </li>
            </ol>
            <div  v-if="isshow" v-bind:title="message">{{ message }}</div>
            <input v-model="message">
            <button @click="showtext">{{isshow?'hide':'show'}}</button>
        </div>

        <script>
var app = new Vue({
    el: '#app',
    data: {
        ok:false,
        message: 'Hello Vue!',
        isshow: true,
        isActive: false,
        hasError: false,
        todos: [
            {text: '学习 JavaScript'},
            {text: '学习 Vue'},
            {text: '整个牛项目'}
        ]
    },
    methods: {
        showtext: function () {
            this.isshow = !this.isshow;
        }
    },
    computed: {

    }
});
        </script>
    </body>
</html>