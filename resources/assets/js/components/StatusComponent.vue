<template>
  <b-img
    rounded="circle"
    blank
    width="10"
    height="10"
    alt="Satuts"
    :title="online ? 'Conectado' : 'Desconectado'"
    :blank-color="online ? 'green' : 'gray'"
  />
</template>

<script>
export default {
  props: {
    online: Boolean
  }
};
</script>

<style>
</style>
