<script>
import axios from 'axios';

export default {
  data() {
    return {
      myListTask: [],

      newtask: {
        "text": "",
        "check": "no"
      }
    }
  },
  methods: {
    deleteTask(idx) {
      console.log(idx);
    },
    addTask() {

      const url = 'http://localhost/php-todo-list-json/php/postTask.php';
      const data = this.newtask;
      const headers = {
        headers: { 'Content-Type': 'multipart/form-data' }
      };

      if (this.newtask.text !== "") {
        axios.post(url, data, headers)
          .then(res => {

            console.log(res.data);
            this.myListTask = res.data;
            this.newtask.text = "";
          });
      }

    }
  },
  mounted() {

    axios.get('http://localhost/php-todo-list-json/php/index.php')
      .then(res => {
        console.log(res);
        this.myListTask = res.data;
      });
  }
}
</script>

<template>
  <h1>to Do list</h1>
  <div class="container">
    <ul>
      <li v-for="(task, idx) in myListTask" :key="idx">{{ task.text }}
        <button @click="deleteTask(idx)"> X </button>
      </li>

    </ul>

  </div>

  <div>
    <form @submit.prevent="addTask">

      <!-- input text -->
      <label for="newtask">new task</label>
      <input type="text" name="newtask" id="newtask" v-model="newtask.text">

      <!-- input submit -->
      <input type="submit">
    </form>
  </div>
</template>

<style lang="scss">
@use './styles/general.scss' as *;

h1 {
  color: #71a3a4;
}

.container {
  padding: 40px;
  width: 50%;
  margin: 50px auto;
  background-color: #fff;
  text-align: start;
}

li {
  border-bottom: 1px solid gray;
  padding: 5px;
  display: flex;
  justify-content: space-between;

  button {
    width: 50px;
    height: 50px;
  }
}
</style>
