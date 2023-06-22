<script>
import axios from 'axios';

export default {
  mounted() {
    axios.get('http://localhost/php-todo-list-json/php/')
      .then(res => {
        console.log(JSON.stringify(res));
      }
      )
  }
}
</script>

<template>
  <h1>To Do List</h1>
  <div>
    <ul>
      <li></li>
    </ul>
  </div>
</template>

<style lang="scss">
@use './styles/general.scss' as *;

h1 {
  color: #71a3a4;
}
</style>
