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

      const url = 'http://localhost/tmp/php/deleteTask.php';
      const data = { "index": index };
      const headers = {
        headers: { 'Content-Type': 'multipart/form-data' }
      };
      axios.post(url, data, headers)
        .then(res => {

          const data = res.data;
          this.students = data;
        });

    },
    addTask() {
      // crea delle costanti che poi andrano a essere le "componenti" della richiesta axios.post
      // url del file da cui andare a prendere le info
      const url = 'http://localhost/php-todo-list-json/php/postTask.php';
      // la variabile che mi serve nel .php da aggiungere nel json
      const data = this.newtask;
      // una cosa "standard" per far funzionare le richieste POST 
      const headers = {
        headers: { 'Content-Type': 'multipart/form-data' }
      };

      if (this.newtask.text !== "") {
        axios.post(url, data, headers)
          .then(res => {

            console.log(res.data);
            // prendo il contenuto della richiesta axios e lo sostituisco al mio array
            this.myListTask = res.data;
            // reinposto a stringa vuota il v-model dell'input
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
