<script>
import axios from 'axios';

export default {
  data() {
    return {
      myListTask: []
    }
  },
  mounted() {
    axios.get('http://localhost/php-todo-list-json/php/')
      .then(res => {
        console.log(JSON.stringify(res));
        this.myListTask = res.data;
      }
      )
  }
}
</script>

<template>
  <h1>to Do list</h1>
  <div class="container">
    <ul>
      <li v-for="task in myListTask">{{ task }}</li>

    </ul>

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
}
</style>
